<?php
/**
 * Plugin Activation for Silohon Paid Ads
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


define( 'paid_name', 'SILOHON PAID' );
define( 'paid_version', '7.0.2' );


// License ===================================
// ===========================================
if( isset( $_POST[ 'paid_subLicense' ] ) ){
    $lEmail = sanitize_email( $_POST['paid_email'] );
    $lLic = sanitize_text_field( $_POST['paid_license'] );

    if( $lEmail === 'akbarsilohon@gmail.com' && $lLic === 'B8xSWc8MN1nKxFNGxwOP8TnZg5' ){
        global $wpdb;
        $queryLicense = $wpdb->prefix . 'paid_license';
        $query_newTab = $wpdb->prefix . 'paid_content';

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

            $wpdb->insert( $query_newTab, $insert_data_newTab );
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

    if( $wpdb->query(
        $wpdb->prepare(
            "UPDATE $kontenData SET title = '$title_post_1', `desc` = '$description_post_1', images = '$thumbnail_post_1', content = '$content_post_1' WHERE id = '1'"
        )
    )){
        $contentNotice_1 = 'Update successfully';
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
        $notice_2 = 'Update successfully';
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
        $notice_3 = 'Update successfully';
    }
}