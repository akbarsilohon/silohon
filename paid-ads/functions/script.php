<?php
/**
 * Silohon Paid Ads
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

add_action( 'admin_enqueue_scripts', 'paid_admin_enqueue_script' );
function paid_admin_enqueue_script(){
    wp_enqueue_style( 
        'paid-style', 
        SILO_URI . '/paid-ads/css/admin.css',
        array(),
        fileatime( SILO_DIR . '/paid-ads/css/admin.css' ),
        'all'
    );
}