<?php
/**
 * Create table
 * Silohon WordPress Theme
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


// license table =============================
// ===========================================
function paid_license_table(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $paid_tabel = $wpdb->prefix . 'paid_license';
    if( $wpdb->get_var( "SHOW TABLES LIKE '$paid_tabel';" ) != $paid_tabel ){
        $sql = "CREATE TABLE $paid_tabel (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `lisensi` varchar(50) NOT NULL,
            `email` varchar(255) NOT NULL,
            `last_update` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta( $sql );
    }
}

// Manipulating content ==================
// =======================================
function paid_add_tabel_content(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $paid_content = $wpdb->prefix . 'paid_content';
    if( $wpdb->get_var( "SHOW TABLES LIKE '$paid_content';" ) != $paid_content ){
        $sql = "CREATE TABLE $paid_content (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `slug_link` varchar(50) NOT NULL,
            `scrollst` varchar(3) NOT NULL,
            `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
            `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `title2` text COLLATE utf8mb4_unicode_ci NOT NULL,
            `desc2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `images2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `content2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `title3` text COLLATE utf8mb4_unicode_ci NOT NULL,
            `desc3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `images3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `content3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `ads01` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `ads02` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `ads03` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `html_head` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `html_foot` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `finish_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}


// Direct link content ===============
// ===================================
function paid_direct_link(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $paid_direct = $wpdb->prefix . 'paid_direct';
    if( $wpdb->get_var( "SHOW TABLES LIKE '$paid_direct';" ) != $paid_direct ){
        $sql = "CREATE TABLE $paid_direct(
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `direct_link` varchar(50) NOT NULL,
            `target_link` varchar(150) NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta( $sql );
    }
}


// Table for Content Bot ==============================
// ====================================================
function paid_bot_content(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $content_bot = $wpdb->prefix . 'paid_bot';

    if( $wpdb->get_var( "SHOW TABLES LIKE '$content_bot';" ) != $content_bot ){
        $sql = "CREATE TABLE $content_bot(
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
            `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}