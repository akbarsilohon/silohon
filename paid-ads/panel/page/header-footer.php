<?php
/**
 * Include header & footer code for plugin
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

global $wpdb;
$HeaderFooter = $wpdb->prefix . 'paid_content';
$thisData = $wpdb->get_results("SELECT * FROM $HeaderFooter");

if( !empty( $thisData)){
    foreach( $wpdb->get_results("SELECT * FROM $HeaderFooter WHERE id='1'") as $key => $row){
        $header_code = $row->html_head;
        $footer_code = $row->html_foot;
    } ?>

    <form action="admin.php?page=sl_paid&tb=hf" method="post" class="paidForm">
        <?php 
            if( isset( $infoUpdate ) ){
                echo $infoUpdate;
            }
        ?>

        <h2 class="adsFormT">Insert Header & Footer</h2>

        <textarea name="paid_header" id="paid_header" class="paidArea" placeholder="Insert header.."><?php echo $header_code; ?></textarea>
        <textarea name="paid_footer" id="paid_footer" class="paidArea" placeholder="Insert footer.."><?php echo $footer_code; ?></textarea>

        <div class="paidAdsSub">
            <button type="submit" name="paid_simpan_hedaer_footer">Save</button>
        </div>
    </form>

    <?php
}