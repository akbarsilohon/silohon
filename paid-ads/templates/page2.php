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
<html lang="en-US">
<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#9a1518" />
<title><?php echo $title; ?></title>
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
#ngadsen-generate{ display: none; }
#ngadsen-wait2{ display: none; }
#ngadsen-link{ display: none; }
</style>
<?php echo $headerHTML; ?>
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
                        <span itemprop="name"><?php echo $title; ?></span>
                        <span itemprop="position" content="3"></span>
                    </span>
                </div>
            </div>

            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main" role="main">
                    <article itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="gmr-box-content gmr-single">
                            
                            <header class="entry-header">
                                <h1 class="entry-title" itemprop="headline"><?php echo $title; ?></h1>
                            </header>
                            
                            <div class="entry-content entry-content-single" itemprop="text">
                                <p><?php echo $decription; ?></p>
								<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;text-align:center;">
                        		    <div id="ngadsen-wait1">
                        		        <button class="btn btn-danger" disabled="disabled" style="background: #007634;border-color: #007634;color: #fff;">
                                            <i class="fa fa-send"></i> Loading... <span id="ngadsen-time"></span>
                        	           </button>
                                    </div>
                        		    <div id="ngadsen-generate">
                        				<a class="btn btn-danger" href="#silohonGenerate" onclick="ngadsengenerate()" style="background: #007634;border-color: #007634;">
                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19209 3.65989C3.96089 3.42875 3.58583 3.42875 3.35466 3.65989L2.51704 4.49753C2.28584 4.72872 2.28584 5.10357 2.51704 5.33496L7.23679 10.0546C7.25723 10.0752 7.63298 10.2997 8.00649 10.2996C8.37596 10.2994 8.74315 10.0749 8.76357 10.0546L13.4831 5.33496C13.7143 5.10358 13.7143 4.72872 13.4831 4.49753L12.6456 3.65989C12.4144 3.42875 12.0395 3.42875 11.8083 3.65989L9.14304 6.32518V0.571581C9.14304 0.256076 8.88705 0 8.5715 0H7.42868C7.11321 0 6.85736 0.256076 6.85736 0.571581V6.32518L4.19209 3.65989ZM2.28566 14.8708H13.7143C14.9768 14.8708 16 13.8477 16 12.5852V9.72795C16 9.41244 15.7442 9.15662 15.4287 9.15662H14.2858C13.9701 9.15662 13.7143 9.41244 13.7143 9.72795V11.4423C13.7143 12.0736 13.2027 12.5852 12.5715 12.5852H3.4285C2.79729 12.5852 2.28566 12.0736 2.28566 11.4423V9.72795C2.28566 9.41244 2.02986 9.15662 1.71436 9.15662H0.571306C0.256003 9.15662 0 9.41244 0 9.72795V12.5851C0 13.8477 1.02343 14.8708 2.28566 14.8708Z" fill="white"></path>
                                            </svg> Double click to Download
                                        </a>
                                    </div>
                                </div>
								<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;">
                                    <?php echo $ads1; ?>
                                </div>
                                <div class="wp-block-image">
                                    <figure class="aligncenter size-large">
                                        <a href="<?php echo $next_temp; ?>">
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width:100%;" />
                                        </a>
                                    </figure>
                                </div>
                                <div class="ngadsen-bottom text-center" id="silohonGenerate">
                                    <div id="ngadsen-wait2">
                        				<a class="btn btn-danger" href="<?php echo $next_temp; ?>" style="background: #007634;border-color: #007634;margin-top: 120px;">
                                            <strong>Continue</strong> Download <strong>(33.8 MB)</strong>
                                        </a>
                                    </div>
                                    <div id="ngadsen-link">
                                    </div>
                                </div>
                                <div style="display:block;width:100%;position:relative;margin-bottom:10px;margin-top:10px;">
                                    <?php echo $ads2; ?>
                                </div>
								<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;text-align:center;">
				                    <img data-original-height="48" data-original-width="50" src="<?php echo SILO_URI . '/paid-ads/img/atas.png' ?>" width="70" height="65" border="0">
                                    <h2 style="text-align: center;font-size: 16px;margin-top: 15px;margin-bottom: 55px;">
					                <strong><span style="color: red;">Download Now</span><span style="color: green;"> Click OPEN / INSTALL / VISIT</span> <span style="color: red;">above</span></strong>
		                            </h2>
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
<script type="text/javascript">
            let count = 5;
            let counter = setInterval(timer, 1000);
            function timer() {
                count = count - 1;
                if (count <= 0) {
                    document.getElementById('ngadsen-wait1').style.display = 'none';
                    document.getElementById('ngadsen-generate').style.display = 'block';
                    clearInterval(counter);
                    return;
                }
                document.getElementById("ngadsen-time").innerHTML = count;
            }

            function ngadsengenerate() {
                document.getElementById('silohonGenerate').focus();
                document.getElementById('ngadsen-link').style.display = 'none';
                document.getElementById('ngadsen-wait2').style.display = 'block';

                setInterval(function () {
                    document.getElementById('ngadsen-wait2').style.display = 'none';
                }, 30000);
                setInterval(function () {
                    document.getElementById('ngadsen-link').style.display = 'block';
                }, 2000);
            }
</script>
<?php echo $footerHTML; ?>

<?php 
    $scrollDelay2 = ( !empty( $nilaiScroll ) ? $nilaiScroll : 4 );
?>

<script>
    document.body.style.overflow = "hidden";
    setTimeout(function() {
    document.body.style.overflow = "auto";
    }, <?php echo $scrollDelay2; ?>000);
</script>
</body>
</html>