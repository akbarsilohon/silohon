<?php
/**
 * Routing handler for plugin ads
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

add_action( 'get_header', 'paid_get_header_location' );
function paid_get_header_location(){

    if (!defined('DONOTCACHEPAGE')) {
        define('DONOTCACHEPAGE', true);
    }

    $siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST']."/";

    if ( ! session_id()) {
        session_start();
    }

    if( isset($_SESSION['shortlinkz'], $_SESSION['sluglink']) && is_single() ){


        if( isset($_SESSION['temp2']) ){

            get_template_part( 'paid-ads/templates/page2' );

        } elseif( isset($_SESSION['temp3']) ){

            get_template_part( 'paid-ads/templates/page3' );

        } else{

            get_template_part( '/paid-ads/templates/page1' );

        }

        unset($_SESSION['shortlinkz']);
        unset($_SESSION['sluglink']);
        unset($_SESSION['temp1']);
        unset($_SESSION['temp2']);
        unset($_SESSION['temp3']);

        session_destroy();
        exit();
    }
}