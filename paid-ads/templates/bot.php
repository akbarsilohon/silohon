<?php
/**
 * Templates for Google Bot, Facebook Bot, dan more BOt.
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

if (!defined('DONOTCACHEPAGE')) {
    define('DONOTCACHEPAGE', true);
}

global $wpdb;
$ContentBot = $wpdb->prefix . 'paid_bot';
$siteTitle = get_bloginfo( 'name' );
foreach( $wpdb->get_results("SELECT * FROM $ContentBot WHERE id='1'") as $key => $row ){
    $title = $row->title;
    $description = $row->desc;
    $thumbnail = $row->images;
    $content = $row->content;
} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | <?php echo $siteTitle; ?></title>
    <meta name="description" content="<?php echo $description; ?>"/>

    <style>
        :root {
            --link: #000;
            --hover: #d56340;
            --bl1: #313131;
            --bl2: #444444;
            --bl3: #535353;
            --bl4: #636363;
            --bl5: #727272;
            --pt1: #fff;
            --pt2: #f3f3f3;
            --pt3: #e0dddd;
            --pt4: #cecbcb;
            --pt5: #b9b9b9
        }
    </style>

    <!-- link css -->
    <link rel="stylesheet" href="<?php echo SILO_URI . '/style.css' ?>">
    <link rel="stylesheet" href="<?php echo SILO_URI . '/css/single.css' ?>">
</head>
<body <?php body_class(); ?>>
<!-- Main Header -->
    <header class="silo_header">
        <div class="headers container">
            <!-- Header Lef -->
            <div id="header_left" class="header_left">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- Header Mid -->
            <div class="header_mid">
                <div itemscope itemtype="http://schema.org/Organization">
                    <a itemprop="url" href="<?php bloginfo('url'); ?>">
                        <?php 
                            $defLogo = SILO_URI . '/img/logo.png';
                            $atr = 'itemprop="logo" class="silo_logo" width="80" height="60"';
                            $logo = get_option('silo_logo');

                            if( !empty( $logo )){
                                echo '<img '.$atr.' src="'.$logo.'" alt="'.get_bloginfo('name').'" />';
                            } else{
                                echo '<img '.$atr.' src="'.$defLogo.'" alt="'.get_bloginfo('name').'" />';
                            }
                        ?>
                    </a>
                </div>

                <?php wp_nav_menu( array(
                    'theme_location' => 'header',
                    'container' => 'ul',
                    'menu_class' => 'big_menu',
                )); ?>
            </div>

            <!-- Header Right -->
            <div class="header_right"></div>
        </div>
    </header>

    <div id="silo_flex" class="silo_flex flex100">
        <div class="flex_top">
            <a href="<?php bloginfo('url'); ?>">
                <h3 class="flex_title"><?php bloginfo('name'); ?></h3>
            </a>
            <div id="flex_close" class="flex_close">
                <span></span>
                <span></span>
            </div>
        </div>

        <form action="<?php echo home_url('/'); ?>" method="get" class="search_mobile_from">
            <input type="text" id="silohon_mobile_search_on_header" name="s" placeholder="Search Here.." />
            <button class="btn_mobile_search" type="submit">Search</button>
        </form>
            <?php wp_nav_menu( array(
                'theme_location' => 'header',
                'container' => 'ul',
                'menu_class' => 'menu_flex'
            )); wp_nav_menu( array(
                'theme_location' => 'footer',
                'container' => 'ul',
                'menu_class' => 'menu_flex f-moba'
            )); ?>
    </div>
    

    <!-- Content -->
    <?php 

        $myTopAds = get_option('ads_single_top');
        if( !empty( $myTopAds ) ){
            echo '<center>';
            echo $myTopAds;
            echo '</center>';
        }

    ?>

    <div class="container silo_single">
        <div class="silo_post">
            <article class="silo_article">

                <div class="article_top">
                    <div class="the_cats">
                        <span class="cats_link">
                            <a href="/">App Download</a>
                        </span>
                    </div>

                    <h1 class="single_title"><?php echo  $title; ?></h1>

                    <?php if( !empty( $thumbnail )){
                        echo '<img src="' . $thumbnail . '" alt="' . $title . '" class="single_img">';
                    } ?>
                    
                </div>

                <?php 
                    if(!empty( get_option('ads_single_top') )){
                        print( get_option('ads_single_top') );
                    }
                ?>

                <div class="the_content">
                    <?php echo $content; ?>
                </div>

                <?php 
                    if( !empty( get_option( 'ads_single_bot' ) )){
                        print( get_option( 'ads_single_bot' ) );
                    }
                ?>
            </article>
        </div>

        <?php get_sidebar(); ?>
    </div>
    <!-- /Content -->

    <footer>
        <div class="footop f-max">
            <?php wp_nav_menu( array(
                'theme_location' => 'footer',
                'container' => 'ul',
                'menu_class' => 'silo_foot_menu container',
            )); ?>
        </div>
        <div class="foobot">
            <div class="container silo_foobot">
                <div class="fooleft">
                    &copy; <?php echo the_time('Y'); ?> Copyright <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name') ?></a> | All rights Reserved.
                </div>
                <div class="fooright">Designe By: <a href="<?php echo bloginfo( 'url' ); ?>"><?php echo bloginfo( 'name' ); ?></a></div>
            </div>
        </div>
    </footer>

    <?php 
    
    if( !empty( get_option( 'insert_footer' ) )){
        echo '<div class="myFooterCode">';
        print( get_option( 'insert_footer' ) );
        echo '</div>';
    }
    
    ?>
</body>
</html>