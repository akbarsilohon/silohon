<?php
/**
 * Include plugin for for paid trafiic
 * Silohon Wordpress Theme
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


// Create Menu page ==========================
// ===========================================
add_action( 'admin_menu', 'paid_admin_menu' );
function paid_admin_menu(){
    add_menu_page(
        'Silohon Paid Traffic',
        'Silohon Paid',
        'manage_options',
        'sl_paid',
        'sl_paid',
        'dashicons-money-alt',
        4
    );

    function sl_paid(){
        get_template_part( 'paid-ads/panel/admin' );
    }
}

// Create table ==============================
// ===========================================
add_action( 'after_switch_theme', 'paid_switch_theme' );
function paid_switch_theme(){
    paid_license_table();
    paid_add_tabel_content();
    paid_direct_link();
    paid_bot_content();
}

// Remove Table ==============================
// ===========================================
add_action( 'switch_theme', 'paid_switch_theme_remove' );
function paid_switch_theme_remove(){
    global $wpdb;
    $licenseTable = $wpdb->prefix . 'paid_license';
    $contentTable = $wpdb->prefix . 'paid_content';
    $directPaid = $wpdb->prefix . 'paid_direct';

    // Remove license ---------------
    $wpdb->query( "DROP TABLE IF EXISTS $licenseTable" );
    $wpdb->query( "DROP TABLE IF EXISTS $contentTable" );
    $wpdb->query( "DROP TABLE IF EXISTS $directPaid" );
}


// Activetion paid fitur ======================
// ============================================
function paid_checker_license(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'paid_license';

    if( $wpdb->get_var("SHOW COLUMNS FROM $table_name LIKE 'lisensi';") == 'lisensi' ){
        $result = $wpdb->get_var("SELECT lisensi FROM $table_name LIMIT 1");

        if (!empty($result) && $result == 'B8xSWc8MN1nKxFNGxwOP8TnZg5'){
            return true;
        } else{
            return false;
        }
    } else{
        return false;
    }
}