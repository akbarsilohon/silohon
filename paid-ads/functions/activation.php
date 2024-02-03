<?php
/**
 * Plugin Activation for Silohon Paid Ads
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


define( 'paid_name', 'SILOHON PAID' );
define( 'paid_version', '7.2.1' );


// License ===================================
// ===========================================
if( isset( $_POST[ 'paid_subLicense' ] ) ){
    $lEmail = sanitize_email( $_POST['paid_email'] );
    $lLic = sanitize_text_field( $_POST['paid_license'] );

    if( $lEmail === 'akbarsilohon@gmail.com' && $lLic === 'B8xSWc8MN1nKxFNGxwOP8TnZg5' ){
        global $wpdb;
        $queryLicense = $wpdb->prefix . 'paid_license';
        $query_newTab = $wpdb->prefix . 'paid_content';
        $query_bot_atble = $wpdb->prefix . 'paid_bot';

        $existing_license = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $queryLicense WHERE lisensi = %s", $lLic ) );

        if( empty( $existing_license )){
            $insert_data_license = array(
                'id'        =>  '1',
                'email'     =>  $lEmail,
                'lisensi'   =>  $lLic
            );

            $wpdb->insert( $queryLicense, $insert_data_license );
        }

        $existing_license_id = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $queryLicense WHERE lisensi = %s", $lLic ) );

        if( ! empty( $existing_license_id ) ){
            $insert_data_newTab = array(
                'id'        =>  '1',
                'slug_link' =>  'get'
            );

            $inser_dataBot = array(
                'id'        =>  '1',
            );

            $wpdb->insert( $query_newTab, $insert_data_newTab );
            $wpdb->insert( $query_bot_atble, $inser_dataBot );
        }
    }
}


// Update Content 1 ====================================
// =====================================================
if(isset( $_POST[ 'paid_submit_art_1' ] )){
    $title_post_1 = sanitize_text_field($_POST['paid_title_1']);
    $description_post_1 = sanitize_text_field($_POST['paid_desc_1']);
    $thumbnail_post_1 = esc_url_raw($_POST['paid_img_1']);
    $content_post_1 = wp_kses_post($_POST['paid_content_1']);

    global $wpdb;
    $kontenData = $wpdb->prefix . 'paid_content';

    if( $wpdb->query( $wpdb->prepare( "UPDATE $kontenData SET title = '$title_post_1', `desc` = '$description_post_1', images = '$thumbnail_post_1', content = '$content_post_1' WHERE id = '1'"))){
        $contentNotice_1 = '
            <div class="infoNotice berhasil">
            <p class="thisNotice">Update successfully</p>
            </div>
        ';
    } else{
        $contentNotice_1 = '
            <div class="infoNotice gagal">
            <p class="thisNotice">Update Failed</p>
            </div>
        ';
    }
}


// Update content 2 ==========================
// ===========================================
if( isset( $_POST[ 'paid_submit_art_2' ])){
    $title_post_2 = sanitize_text_field($_POST['paid_title_2']);
    $description_post_2 = sanitize_text_field($_POST['paid_desc_2']);
    $thumbnail_post_2 = esc_url_raw($_POST['paid_img_2']);
    $content_post_2 = wp_kses_post($_POST['paid_content_2']);

    global $wpdb;
    $kontenData = $wpdb->prefix . 'paid_content';

    if( $wpdb->query(
        $wpdb->prepare(
            "UPDATE $kontenData SET title2 = '$title_post_2', `desc2` = '$description_post_2', images2 = '$thumbnail_post_2', content2 = '$content_post_2' WHERE id = '1'"
        )
    )){
        $notice_2 = '
            <div class="infoNotice berhasil">
            <p class="thisNotice">Update successfully</p>
            </div>
        ';
    }
}


// Update content 3 ==========================
// ===========================================
if( isset( $_POST[ 'paid_submit_art_3' ])){
    $title_post_3 = sanitize_text_field($_POST['paid_title_3']);
    $description_post_3 = sanitize_text_field($_POST['paid_desc_3']);
    $thumbnail_post_3 = esc_url_raw($_POST['paid_img_3']);
    $content_post_3 = wp_kses_post($_POST['paid_content_3']);

    global $wpdb;
    $kontenData = $wpdb->prefix . 'paid_content';

    if( $wpdb->query(
        $wpdb->prepare(
            "UPDATE $kontenData SET title3 = '$title_post_3', `desc3` = '$description_post_3', images3 = '$thumbnail_post_3', content3 = '$content_post_3' WHERE id = '1'"
        )
    )){
        $notice_3 = '
            <div class="infoNotice berhasil">
            <p class="thisNotice">Update successfully</p>
            </div>
        ';
    }
}

// Direct link handler ======================
// ==========================================
if( isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])){
    $idToDelete = absint($_GET['id']);

    global $wpdb;
    $NewDirect = $wpdb->prefix . 'paid_direct';

    $deletedRows = $wpdb->delete(
        $NewDirect,
        array('id' => $idToDelete),
        array('%d')
    );

    if ($deletedRows) {
        $infoUpdate = '
            <div class="infoNotice berhasil">
                <p class="thisNotice">Link deleted successfully!</p>
            </div>
        ';
    } else {
        $infoUpdate = '
            <div class="infoNotice gagal">
                <p class="thisNotice">Error deleting link. Please try again.</p>
            </div>
        ';
    }
} else if( isset( $_POST['submitDR'] ) && !empty( $_POST['slDL_new'] )){
    $slNewLink = sanitize_text_field($_POST['slDL_new']);
    $slNewLink = strtolower(str_replace(' ', '-', $slNewLink));
    $slNewTar = esc_url_raw($_POST['slDL_tar']);

    global $wpdb;
    $NewDirect = $wpdb->prefix . 'paid_direct';

    $existingLink = $wpdb->get_var(
        $wpdb->prepare("SELECT direct_link FROM $NewDirect WHERE direct_link = %s", $slNewLink)
    );

    if( !$existingLink ){
        $wpdb->insert(
            $NewDirect,
            array(
                'direct_link' => $slNewLink,
                'target_link' => $slNewTar
            ),
            array('%s', '%s')
        );

        if( $wpdb->insert_id ){
            $infoUpdate = '
                <div class="infoNotice berhasil">
                    <p class="thisNotice">New direct link added successfully!</p>
                </div>
            ';
        } else{
            $infoUpdate = '
                <div class="infoNotice gagal">
                    <p class="thisNotice">Error adding new direct link. Please try again.</p>
                </div>
            ';
        }
    } else{
        $infoUpdate = '
                <div class="infoNotice gagal">
                    <p class="thisNotice">URL already exists. Please choose a different one.</p>
                </div>
            ';
    }
}


// Ads save handler ==========================
// ===========================================
if( isset( $_POST['paid_simpan_ads'] )){
    $ads1 = $_POST['paid_ads1'];
    $ads2 = $_POST['paid_ads2'];
    $ads3 = $_POST['paid_ads3'];

    global $wpdb;
    $kontenData = $wpdb->prefix . 'paid_content';

    if( $wpdb->query( $wpdb->prepare( "UPDATE $kontenData SET ads01 = '$ads1', ads02 = '$ads2', ads03 = '$ads3'" ))){
        $infoUpdate = '
            <div class="infoNotice berhasil">
                <p class="thisNotice">Update successfully!</p>
            </div>
        ';
    }
}


// Header & Footer handler =================
// =========================================
if( isset( $_POST['paid_simpan_hedaer_footer'])){
    $header_code = $_POST['paid_header'];
    $footer_code = $_POST['paid_footer'];

    global $wpdb;
    $kontenData = $wpdb->prefix . 'paid_content';

    if( $wpdb->query( $wpdb->prepare( "UPDATE $kontenData SET html_head = '$header_code', html_foot = '$footer_code'" ))){
        $infoUpdate = '<div class="infoNotice berhasil">
                        <p class="thisNotice">Update successfully!</p>
                    </div>';
    }
}

// For settings ===========================
// ========================================
if( isset( $_POST['paid_simpan_settings'])){
    $scrollDelay = $_POST['paid_scroll'];
    $finishLink = $_POST['paid_finish_link'];

    global $wpdb;
    $NewData = $wpdb->prefix . 'paid_content';

    if( $wpdb->query( $wpdb->prepare( "UPDATE $NewData SET scrollst = '$scrollDelay', finish_link = '$finishLink'" ))){
        $infoUpdate = '<div class="infoNotice berhasil">
        <p class="thisNotice">Update successfully!</p>
    </div>';
    }
}


// For Content Bot review =======================
// ==============================================
if( isset( $_POST[ 'bot_submit_article' ])){
    $title_ = sanitize_text_field($_POST['bot_title']);
    $description_ = sanitize_text_field($_POST['bot_desc']);
    $thumbnail_ = esc_url_raw($_POST['bot_img']);
    $content_ = wp_kses_post($_POST['bot_content_1']);

    global $wpdb;
    $kontenData = $wpdb->prefix . 'paid_bot';

    if( $wpdb->query( $wpdb->prepare( "UPDATE $kontenData SET title = '$title_', `desc` = '$description_', images = '$thumbnail_', content = '$content_'" )) ){
        $contentNotice_1 = '
            <div class="infoNotice berhasil">
                <p class="thisNotice">Update successfully!</p>
            </div>
        ';
    }
}