<?php
/**
 * Include setting for this plugin
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

global $wpdb;
$settingTable = $wpdb->prefix . 'paid_content';
$thisData = $wpdb->get_results("SELECT * FROM $settingTable");

if( !empty( $thisData )){
    foreach( $wpdb->get_results("SELECT * FROM $settingTable WHERE id='1'") as $key => $row){
        $scrollDelay = $row->scrollst;
        $finishLink = $row->finish_link;
    } ?>

    <form action="admin.php?page=sl_paid&tb=settings" method="post" class="paidForm">
        <h2 class="adsFormT">Settings</h2>
        

        <?php 
            if( isset( $infoUpdate ) ){
                echo $infoUpdate;
            }
        ?>

        <!-- Scroll delay -->
        <label for="" class="settingLebale">
            <span class="paidspan">Scroll Delay</span>
            <input type="number" name="paid_scroll" id="paid_scroll" value="<?php echo  $scrollDelay; ?>" />
        </label>

        <!-- Finish link -->
        <label for="" class="settingLebale">
            <span class="paidspan">Finish Link</span>
            <input type="url" name="paid_finish_link" id="paid_finish_link" value="<?php echo  $finishLink; ?>" />
        </label>

        <div class="paidAdsSub">
            <button type="submit" name="paid_simpan_settings">Save</button>
        </div>
    </form>


    <?php
}