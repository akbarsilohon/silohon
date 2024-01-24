<?php
/**
 * Plugin Activation for Silohon Paid Ads
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */



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