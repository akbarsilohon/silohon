<?php
/**
 * Auto load url from table paid_direct if exist
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


add_action( 'parse_request', 'paid_parse_request_to_server' );
function paid_parse_request_to_server(){

    if (!defined('DONOTCACHEPAGE')) {
        define('DONOTCACHEPAGE', true);
    }

    global $wpdb;
    $DB_pos = $wpdb->prefix . 'posts';
    $DB_sql = $wpdb->prefix . 'paid_direct';

    $slugx = '';

    foreach( $wpdb->get_results("SELECT * FROM $DB_sql") as $key => $row){

        $slugx .= strtolower($row->direct_link).'|';

    }

    $slugz = rtrim($slugx, '|');
    $ifhost = $_SERVER['HTTP_HOST'];

    foreach( $wpdb->get_results( "SELECT * FROM $DB_pos WHERE post_type = 'post' AND post_status = 'publish' ORDER BY RAND() LIMIT 1") as $key => $row ){

        $getlinkz = get_permalink($row->ID);

    }

    if( !empty( $slugz )){

        if( preg_match('/\/'.$slugz.'/', strtolower($_SERVER['REQUEST_URI'])) ){

            $exp_dom = explode('/', $_SERVER['REQUEST_URI']);
            $if_slug = trim(preg_replace('/[^a-zA-Z0-9-_].*/', '', $exp_dom[1]));

            foreach( $wpdb->get_results("SELECT * FROM $DB_sql WHERE LOWER(direct_link) = LOWER('$if_slug')") as $key => $row ){
                if( empty($row->target_link) ){
                    $getlinkz = $getlinkz;
                } else{
                    $getlinkz = $row->target_link;
                }
            }

            if( !session_id() ){
                session_start();
            }

            $linkzpos = $getlinkz;
            $_SESSION['sluglink'] = $if_slug;

            if( preg_match('/^2$/', $_GET['tmp']) ){
                $_SESSION['temp2'] = 'tmp2';
            } elseif( preg_match('/^3$/', $_GET['tmp']) ){
                $_SESSION['temp3'] = 'tmp3';
            } else{
                $_SESSION['temp1'] = 'tmp1';
            }

            $_SESSION['shortlinkz'] = $linkzpos;
            header("Location: $linkzpos");
            exit();

        }
    }
}