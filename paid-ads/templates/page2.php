<?php
/**
 * Landing page templates 2
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


if (!defined('DONOTCACHEPAGE')) {
    define('DONOTCACHEPAGE', true);
}

$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST']."/";
$next_temp = $siteurl . $_SESSION['sluglink'] . '/?tmp=3';
$curr_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

global $wpdb;
$SetMyLandingPage = $wpdb->prefix . 'paid_content';

foreach( $wpdb->get_results("SELECT * FROM $SetMyLandingPage WHERE id='1'") as $key => $row ){
    $title = $row->title2;
    $decription = $row->desc2;
    $thumbnail = $row->images2;
    $content = $row->content2;
    $ads1 = $row->ads01;
    $ads2 = $row->ads02;
    $ads3 = $row->ads03;
    $headerHTML = $row->html_head;
    $footerHTML = $row->html_foot;
    $nilaiScroll = $row->scrollst;
}

?>

<!DOCTYPE html>
<html lang="en">
<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link href="//www.youtube.com" rel="preconnect dns-prefetch">
    <link href="//pagead2.googlesyndication.com" rel="preconnect dns-prefetch">
    <link href="//googleads.g.doubleclick.net" rel="preconnect dns-prefetch">
    <link href="//ad.doubleclick.net" rel="preconnect dns-prefetch">
    <link href="//i.ytimg.com" rel="preconnect dns-prefetch">
    <link href="//www.gstatic.com" rel="preconnect dns-prefetch">
    <link href="//www.google.com" rel="preconnect dns-prefetch">
    <link href="//cse.google.com" rel="preconnect dns-prefetch">
    <link href="//tpc.googlesyndication.com" rel="preconnect dns-prefetch">
    <link href="//www.google-analytics.com" rel="preconnect dns-prefetch">
    <link href="//yt3.ggpht.com" rel="preconnect dns-prefetch">
    <link href="//cdn.jsdelivr.net" rel="preconnect dns-prefetch">
    <link href="//fonts.gstatic.com" rel="preconnect dns-prefetch">
    <link href="//adservice.google.com" rel="preconnect dns-prefetch">
    <link href="//ajax.cloudflare.com" rel="preconnect dns-prefetch">
    <link href="//www.googletagmanager.com" rel="preconnect dns-prefetch">
    <link href="//partner.googleadservices.com" rel="preconnect dns-prefetch">
    <link href="//www.googletagservices.com" rel="preconnect dns-prefetch">
    <link href="//static.doubleclick.net" rel="preconnect dns-prefetch">

    <link rel="stylesheet" href="<?php echo get_bloginfo('url') . '/wp-content/themes/silohon/paid-ads/css/frontend.css'; ?>">

    <?php echo $headerHTML; ?>
</head>
<body>
    <div class="container">
        <!-- breadcrumbs -->
        <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
            <!-- item 1 -->
            <span class="brList" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_bloginfo( 'url' ); ?>" href="<?php echo get_bloginfo( 'url' ); ?>" class="brA">
                    <span itemprop="name" class="brName">Home</span>
                    <span itemprop="position" content="1"></span>
                </a>
            </span>

            <span class="separator">/</span>

            <!-- item 2 -->
            <span class="brList" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo $curr_url; ?>" href="<?php echo $curr_url; ?>" class="brA">
                    <span itemprop="name" class="brName">Finance</span>
                    <span itemprop="position" content="2"></span>
                </a>
            </span>

            <span class="separator">/</span>

            <!-- item 3 -->
            <span class="brTitle" itemscope itemtype="https://schema.org/ListItem">
                <span class="brIT" itemprop="name"><?php echo $title; ?></span>
                <span itemprop="position" content="3"></span>
            </span>
        </div>

        <!-- Main Content -->
        <main class="slMianContent">
            <article class="slArticle" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                <header class="slHead">
                    <!-- Title -->
                    <h1 class="slHeadline" itemprop="headline"><?php echo $title; ?></h1>
                    <p class="slMDesc"><?php echo $decription; ?></p>

                    <!-- Ads 1 -->
                    <div class="sl_innerADS">
                        <?php echo $ads1; ?>
                    </div>

                    <!-- Download BTN 1 -->
                    <div class="slBTNdw1">
                        <a href="#siloDBCLick" onclick="siloGenerateLink()" class="slDwonload1">
                            <span>⇓</span>
                            Double Click to Download
                            <span>⇓</span>
                        </a>
                        <span class="slCompress">Loading..</span>
                    </div>

                    <!-- Thumbnails -->
                    <a href="<?php echo $next_temp; ?>" class="slIMGa">
                        <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" class="slThum">
                    </a>
                </header>

                <!-- Ads 2 -->
                <div class="sl_innerADS">
                    <?php echo $ads2; ?>
                </div>

                <div class="slNewStep">
                    <a href="<?php echo $next_temp; ?>" id="siloDBCLick" class="slBTNAction">
                        Continue Download (21 MB)
                    </a>
                    <div class="slSVGItem">
                        <svg viewBox="-4 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="Vivid.JS" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Vivid-Icons" transform="translate(-597.000000, -725.000000)">
                                        <g id="Icons" transform="translate(37.000000, 169.000000)">
                                            <g id="arrow-top" transform="translate(546.000000, 546.000000)">
                                                <g transform="translate(14.000000, 10.000000)">
                                                    <polygon id="Shape" fill="#008000" points="12 28 12 8 17 13 20 10 10 0 0 10 3 13 8 8 8 28">
                                                    </polygon>
                                                <rect id="Rectangle-path" fill="#007634" fill-rule="nonzero" x="8" y="20" width="4" height="8">
                                                </rect>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                            </g>
                        </svg>
                        Download Now <span>Click OPEN / Install / Visit</span>
                    </div>
                </div>

                <!-- Content -->
                <div class="slContent">
                    <?php echo $content; ?>
                </div>

                <!-- ads 3 -->
                <div class="sl_innerADS">
                    <?php echo $ads3; ?>
                </div>
            </article>
        </main>

    </div>

    <script>
        // <!-- Script fot BTN -->
        function showCountdown() {
            var countdown = 4;
            function updateCountdown() {
                document.querySelector('.slCompress').textContent = 'Loading ' + countdown + ' seconds...';
                countdown--;
                if (countdown < 0) {
                    clearInterval(interval);
                    document.querySelector('.slCompress').style.display = 'none';
                    document.querySelector('.slDwonload1').style.display = 'block';
                }
            }
            var interval = setInterval(updateCountdown, 1000);
        }
        document.addEventListener('DOMContentLoaded', function () {
            showCountdown();
        });

        // Generate Link ---------------------------
        function siloGenerateLink(){
            document.getElementById( 'siloDBCLick' ).style.display = 'block';
            setTimeout( function(){
                document.getElementById( 'siloDBCLick' ).style.display = 'none';
            }, 7000);
        }


        // Delay scrolling ------------
        document.body.style.overflow = "hidden";
        setTimeout( function(){
            document.body.style.overflow = 'auto';
        }, <?php echo $nilaiScroll; ?>000);
    </script>

    <?php echo $footerHTML; ?>
</body>
</html>