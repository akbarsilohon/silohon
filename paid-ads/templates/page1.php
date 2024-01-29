<?php
/**
 * Landing page templates 1
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


global $wpdb;
$SetMyLandingPage = $wpdb->prefix . 'paid_content';

foreach( $wpdb->get_results("SELECT * FROM $SetMyLandingPage WHERE id='1'") as $key => $row ){
    $title = $row->title;
    $decription = $row->desc;
    $thumbnail = $row->images;
    $content = $row->content;
    $ads1 = $row->ads01;
    $ads2 = $row->ads02;
    $ads3 = $row->ads03;
    $headerHTML = $row->html_head;
    $footerHTML = $row->html_foot;
    $nilaiScroll = $row->scrollst;
}

$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST']."/";
$curr_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$next_temp = $siteurl . $_SESSION['sluglink'] . '/?tmp=2';

if (!defined('DONOTCACHEPAGE')) {
    define('DONOTCACHEPAGE', true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
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

        <!-- breadchrume -->
        <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
            <span class="brList" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_bloginfo( 'url' ); ?>" href="<?php echo get_bloginfo( 'url' ); ?>" class="brA">
                    <span itemprop="name" class="brName">Home</span>
                    <span itemprop="position" content="1"></span>
                </a>
            </span>

            <span class="separator">/</span>

            <span class="brList" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo $curr_url; ?>" href="<?php echo $curr_url; ?>" class="brA">
                    <span itemprop="name" class="brName">Finance</span>
                    <span itemprop="position" content="2"></span>
                </a>
            </span>

            <span class="separator">/</span>

            <span class="brTitle" itemscope itemtype="https://schema.org/ListItem">
                <span class="brIT" itemprop="name"><?php echo $title; ?></span>
                <span itemprop="position" content="3"></span>
            </span>
        </div>

        <!-- main content -->
        <main class="slMianContent">
            <article class="slArticle" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                <header class="slHead">
                    <!-- Title -->
                    <h1 class="slHeadline" itemprop="headline"><?php echo $title; ?></h1>
                    <p class="slMDesc"><?php echo $decription; ?></p>

                    <div class="sl_innerADS">
                        <?php echo $ads1; ?>
                    </div>

                    <div class="slBTNdw1">
                        <a href="<?php echo $next_temp; ?>" class="slDwonload1">
                            <span>&#8659;</span>
                            Download (21 MB)
                            <span>&#8659;</span>
                        </a>
                        <span class="slCompress">Compress File..</span>
                    </div>

                    <a href="<?php echo $next_temp; ?>" class="slIMGa">
                        <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" class="slThum">
                    </a>
                </header>

                <div class="sl_innerADS">
                    <?php echo $ads2; ?>
                </div>

                <div class="slContent">
                    <?php echo $content; ?>
                </div>

                <div class="sl_innerADS">
                    <?php echo $ads3; ?>
                </div>
            </article>
        </main>

    </div>


    <script>
        function showCountdown(){
            var countdown = 4;
            
            function updateCountdown(){
                document.querySelector('.slCompress').textContent = 'Compress File ' + countdown + ' seconds...';
                countdown--;

                if( countdown < 0 ){
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

        document.body.style.overflow = "hidden";
        setTimeout( function(){
            document.body.style.overflow = 'auto';
        }, <?php echo $nilaiScroll; ?>000);
        
    </script>

    <?php echo $footerHTML ?>
</body>
</html>