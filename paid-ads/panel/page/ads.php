<?php 
/**
 * Include ads code for plugin
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

global $wpdb;
$queryData = $wpdb->prefix . 'paid_content';
$thisData = $wpdb->get_results("SELECT * FROM $queryData");

if( !empty( $thisData )){
    foreach( $wpdb->get_results("SELECT * FROM $queryData WHERE id='1'") as $key => $row){
        $ads_1 = $row->ads01;
        $ads_2 = $row->ads02;
        $ads_3 = $row->ads03;
    } ?>

    <form action="admin.php?page=sl_paid&tb=ads" method="post" class="paidForm">
        <h2 class="adsFormT">Insert Ads</h2>

        <?php 
            if( isset( $infoUpdate ) ){
                echo $infoUpdate;
            }
        ?>

        <textarea name="paid_ads1" id="paid_ads1" class="paidArea" placeholder="Ads Top content.."><?php echo $ads_1; ?></textarea>
        <textarea name="paid_ads2" id="paid_ads2" class="paidArea" placeholder="Ads Midle content.."><?php echo $ads_2; ?></textarea>
        <textarea name="paid_ads3" id="paid_ads3" class="paidArea" placeholder="Ads After content.."><?php echo $ads_3; ?></textarea>

        <div class="paidAdsSub">
            <button type="submit" name="paid_simpan_ads">Save</button>
        </div>
    </form>

    <?php
}