<?php
/**
 * Landing page templates 1
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */


global $wpdb;
$SetMyLandingPage = $wpdb->prefix . 'paid_content';

foreach( $wpdb->get_results("SELECT * FROM $SetMyLandingPage WHERE id='1'") as $key => $row ){
    $judul = $row->title;
    $descy = $row->desc;
    $thumbnail = $row->images;
    $content = $row->content;
    $ads1 = $row->ads01;
    $ads2 = $row->ads02;
    $ads3 = $row->ads03;
    $headx = $row->html_head;
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
<html lang="en-US">
<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#9a1518" />
<title><?php echo $judul; ?></title>
<!--resource-->
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
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' />
<link rel='stylesheet' type='text/css' href='<?php echo SILO_URI . '/paid-ads/css/frontend.css' ?>' />
<style>
body {
    color: #000000;
    font-family: "Roboto","Helvetica Neue",sans-serif;
    font-weight: 400;
    font-size: 16px;
}
h1 {
    font-size: 30px;
}
.wp-block-image {
    margin: 0 0 1em;
}
.wp-block-image .aligncenter {
    margin-left: auto;
    margin-right: auto;
    display: table;
}
.breadcrumbs {
    padding: 10px 20px;
    border: 1px solid #ecf0f1;
    margin-bottom: 20px;
    text-transform: uppercase;
    font-size: 11px;
}
.albert-top {
    clear: both;
    width: auto;
    text-align: center;
    margin-bottom: 20px;
    }
.albert-top img {
    display: block;
    margin: 0 auto;
}
.albert-bottom {
    clear: both;
    width: auto;
    text-align: center;
    margin-top: 0;
}
.albert-bottom img {
    display: block;
    margin: 0 auto;
}
#albert-generate {
    display: none;
}
#albert-wait2 {
    display: none;
}
#albert-link {
    display: none;
}
#albert-link img, #albert-wait2 img {
    display: block;
    margin: 0 auto;
}
</style>

<?php echo $headx; ?>
</head>
<body style="background: #fff;">
<div class="site inner-wrap" id="site-container">
<div id="content" class="gmr-content">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12" style="text-align:center;">
                <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList" style="background: #e5f5eb;">
                    <span class="first-cl" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo $siteurl; ?>" href="<?php echo $siteurl; ?>"><span itemprop="name">Home</span></a>
                        <span itemprop="position" content="1"></span>
                    </span>
                    <span class="separator">/</span>
                    <span class="0-cl" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo $curr_url; ?>" href="<?php echo $curr_url; ?>"><span itemprop="name">Small Business</span></a>
                        <span itemprop="position" content="2"></span>
                    </span>
                    <span class="separator">/</span>
                    <span class="last-cl" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="name"><?php echo $judul; ?></span>
                        <span itemprop="position" content="3"></span>
                    </span>
                </div>
            </div>

            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main" role="main">
                    <article itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="gmr-box-content gmr-single">
                            
                            <header class="entry-header">
                                <h1 class="entry-title" itemprop="headline"><?php echo $judul; ?></h1>
                            </header>
                            
                            <div class="entry-content entry-content-single" itemprop="text">
                                <p><?php echo $descy; ?></p>
                                
                                <div style="display:block;width:100%;position:relative;margin-bottom:10px;margin-top:10px;">
                                    <?php echo $ads1; ?>
                                </div>
								
                                <div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;text-align:center;">
                                    <a href="<?php echo $next_temp; ?>" class="btn btn-danger" style="background: #007634;border-color: #007634;">
										<svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19209 3.65989C3.96089 3.42875 3.58583 3.42875 3.35466 3.65989L2.51704 4.49753C2.28584 4.72872 2.28584 5.10357 2.51704 5.33496L7.23679 10.0546C7.25723 10.0752 7.63298 10.2997 8.00649 10.2996C8.37596 10.2994 8.74315 10.0749 8.76357 10.0546L13.4831 5.33496C13.7143 5.10358 13.7143 4.72872 13.4831 4.49753L12.6456 3.65989C12.4144 3.42875 12.0395 3.42875 11.8083 3.65989L9.14304 6.32518V0.571581C9.14304 0.256076 8.88705 0 8.5715 0H7.42868C7.11321 0 6.85736 0.256076 6.85736 0.571581V6.32518L4.19209 3.65989ZM2.28566 14.8708H13.7143C14.9768 14.8708 16 13.8477 16 12.5852V9.72795C16 9.41244 15.7442 9.15662 15.4287 9.15662H14.2858C13.9701 9.15662 13.7143 9.41244 13.7143 9.72795V11.4423C13.7143 12.0736 13.2027 12.5852 12.5715 12.5852H3.4285C2.79729 12.5852 2.28566 12.0736 2.28566 11.4423V9.72795C2.28566 9.41244 2.02986 9.15662 1.71436 9.15662H0.571306C0.256003 9.15662 0 9.41244 0 9.72795V12.5851C0 13.8477 1.02343 14.8708 2.28566 14.8708Z" fill="white"></path>
										</svg> Download (33.8 MB)
									</a>
                                </div>
								
                                <div class="wp-block-image">
                                    <figure class="aligncenter size-large">
                                        <a href="<?php echo $next_temp; ?>">
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php echo $judul; ?>" title="<?php echo $judul; ?>" style="width:100%;" />
                                        </a>
                                    </figure>
                                </div>
                    
                                <div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;">
                                    <?php echo $ads2; ?>
                                </div>
                                <?php echo $content; ?>
                                <div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;">
                                    <?php echo $ads3; ?>
                                </div>
                            </div>
                            
                        </div>
                    </article>
                </main>
            </div>

        </div>
    </div>
</div>
</div>
<?php echo $footerHTML; ?>
<?php 
    $scrollDelay = ( !empty( $scst ) ? $scst : 4 );
?>
<script>
    document.body.style.overflow = "hidden";
    setTimeout(function() {
    document.body.style.overflow = "auto";
    }, <?php echo $scrollDelay; ?>000);
</script>
</body>
</html>