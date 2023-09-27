<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
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
    <?php
        if( ! is_admin() ){
            $kodeHeader = get_option( 'insert_header' );
            if( !empty( $kodeHeader ) ){
                print( $kodeHeader );
            }
        }
    wp_head();
    ?>

        <?php
            $home_url = esc_url(home_url('/'));
            $parsed_url = wp_parse_url($home_url);
            $protocol_removed_url = '//' . $parsed_url['host'] . $parsed_url['path'];
		?>
	<link rel='dns-prefetch' href='<?php echo $protocol_removed_url; ?>' />
</head>
<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')) : wp_body_open(); endif; ?>
<noscript>
    <style>
        header.silo_header,
        .silo_flex,
        .container,
        footer{
            display: none;
        }
    </style>
    <h1>Ada Kesalahan</h1>
    <p>Aktifkan JavaScript Browser untuk menampilkan konten</p>
</noscript>
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

<!-- Menu Flexbox -->
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