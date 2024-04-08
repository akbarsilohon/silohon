<?php
// -------------------------------------
// mce_buttons Plugins -----------------
// -------------------------------------
define( 'MCE_JS', SILO_URI . '/mce_buttons/js/action.js' );
add_action( 'admin_init', 'silo_add_mce_buttons' );
function silo_add_mce_buttons(){
    global $typenow;

    if( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' )){
        return;
    }

    if( get_user_option( 'rich_editing' ) == 'true' ){
        add_filter( 'mce_external_plugins', 'silo_mce_external' );
        add_filter( 'mce_buttons', 'silo_mce_buttons' );
    }

    function silo_mce_external( $plugin_array ){
        $plugin_array['silo_mce'] = MCE_JS;
        return $plugin_array;
    }

    function silo_mce_buttons( $buttons ){
        array_push( $buttons, 'silo_mce' );
        return $buttons;
    }
}

// --------------------------------------
// ShortCodes MCE Plugins ---------------
// --------------------------------------
// Add Button
add_shortcode( 'silo-btn', 'callback_silo_btn' );
function callback_silo_btn( $btn, $content = null ){
    $args = shortcode_atts(
        array(
            'class' => '',
            'link' => 'link',
            'target' => ''
        ),
        $btn,
        'silo-btn'
    );

    $Clases = $btn['class'];
    $Targets = $btn['target'];
    $links = $btn['link'];

    // Button Output
    $BtnOutput = '<button style="margin-bottom: 20px;" class="silo-btn ' . $Clases . '">';
    $BtnOutput .= '<a href="' . $links . '" target="' . $Targets . '">';
    $BtnOutput .= $content;
    $BtnOutput .= '</a>';
    $BtnOutput .= '</button>';

    return $BtnOutput;
}


// Add Related Posts -------------------
// -------------------------------------
add_shortcode( 'silo-related', 'silo_add_related_post' );
function silo_add_related_post( $Related_Post ){
    $args = shortcode_atts(
        array(
            'title' => '',
            'url' => '',
            'gambar' => '',
            'target' => ''
        ),
        $Related_Post,
        'silo-related'
    );

    $Titles = $Related_Post['title'];
    $Url = $Related_Post['url'];
    $Images = $Related_Post['gambar'];
    $Targets = $Related_Post['target'];

    // $Related_Post_Output
    $Related_Post_Output = '<a href="'. $Url .'" target="'. $Targets .'" class="IRPP_button">';
    $Related_Post_Output .= '<div class="centered-text-area">';
    $Related_Post_Output .= '<div class="ctaButton" style="float: left;">Read:</div>';
    $Related_Post_Output .= '<div class="centered-text" style="float: left;">';
    $Related_Post_Output .= '<div class="IRPP_button-content">';
    $Related_Post_Output .= '<div class="postTitle">'. $Titles .'</div>';
    $Related_Post_Output .= '</div>';
    $Related_Post_Output .= '</div>';
    $Related_Post_Output .= '</div>';
    $Related_Post_Output .= '<div class="postImageUrl" style="background-image: url(' . $Images . ')"></div>';
    $Related_Post_Output .= '</a><br/>';

    return $Related_Post_Output;
}

// Product ShortCode ----------------
// ----------------------------------
add_shortcode( 'silo-product', 'silo_add_product' );
function silo_add_product( $Product ){
    $args = shortcode_atts(
        array(
            'toko' => '',
            'title' => '',
            'ongkir' => '',
            'harga' => '',
            'lokasi' => '',
            'link' => ''
        ),
        $Product,
        'silo-product'
    );

    $Location = ( !empty( $Product['lokasi'] ) ? $Product['lokasi'] : 'Dalam Negeri' );

    $Product_Output = '<div class="card-price">';
    $Product_Output .= '<div class="left">';
    $Product_Output .= '<div class="price-icon">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/market/' . $Product['toko'] . '">';
    $Product_Output .= '</div>';
    $Product_Output .= '<div class="price-produk">' . $Product['title'] . '</div>';
    $Product_Output .= '<div class="price-box">';
    $Product_Output .= '<div class="price-ongkir">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/icon/kurir.png">';
    $Product_Output .= '<div class="title">' . $Product['ongkir'] . '</div>';
    $Product_Output .= '</div></div></div>';
    $Product_Output .= '<div class="right">';
    $Product_Output .= '<div class="right1">';
    $Product_Output .= '<div class="price-harga">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/icon/harga.png">';
    $Product_Output .= '<div class="title">' . $Product['harga'] . '</div></div>';
    $Product_Output .= '<div class="price-lokasi">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/icon/lokasi.png" alt="">';
    $Product_Output .= '<div class="title">' . $Location . '</div>';
    $Product_Output .= '</div></div>';
    $Product_Output .= '<a href="' . $Product['link'] . '" target="_blank" rel="noopener noreferrer nofollow">';
    $Product_Output .= '<button>Beli</button></a></div></div>';

    return $Product_Output;
}


// Ads Code ---------------------
// ------------------------------
add_shortcode( 'ads1', 'silo_add_ads1' );
function silo_add_ads1(){
    $Code1 = get_option('shortcode_ads1');

    $Ads1_Output = '<div class="ads_single_post">';
    $Ads1_Output .= $Code1;
    $Ads1_Output .= '</div>';

    return $Ads1_Output;
}

add_shortcode( 'ads2', 'silo_add_ads2' );
function silo_add_ads2(){
    $Code2 = get_option('shortcode_ads2');

    $Ads2_Output = '<div class="ads_single_post">';
    $Ads2_Output .= $Code2;
    $Ads2_Output .= '</div>';

    return $Ads2_Output;
}

// Table Of Content --------------------
// -------------------------------------
add_shortcode( 'silo_toc', 'callback_silo_toc' );
function callback_silo_toc(){
    $Content = get_the_content();
    $ThisJS = "<script>const thisTOC = document.getElementById('silo_icon_toc');const thiTOCTar = document.getElementById('this_toc_counters');thisTOC.addEventListener('click', function(){thiTOCTar.classList.toggle('tocNone');});</script>";

    $SiloToc = '<div class="silo_toc">';
    $SiloToc .= '<div class="toc-title">';
    $SiloToc .= '<p class="this_toc">Table of Contents:</p>';
    $SiloToc .= '<div id="silo_icon_toc" class="silo_icon_toc">';
    $SiloToc .= '<span></span><span></span><span></span>';
    $SiloToc .= '</div>';
    $SiloToc .= '</div>';
    $SiloToc .= '<ul id="this_toc_counters">';

    $matches = array();
    preg_match_all('/<h([2-3])>(.*?)<\/h[2-3]>/i', $Content, $matches );

    $level = 2;
    for( $i = 0; $i < count( $matches[1] ); $i++ ){
        $isReplace = array(
            ' ', '.', ',', '-',
            '?', '!', '#', '*', '#', '"',
            '@', '$', '%', '^', '(', ')', '+',
            '=', '{', '}', '[', ']', ':', '\''
        );
        $id = strtolower( str_replace( $isReplace, '_', $matches[2][$i] ) );
        if( $matches[1][$i] == 2 ){
            if( $level > 2 ){
                $SiloToc .= '</ul></li>';
            }
            $SiloToc .= '<li><a href="#' . $id . '">' . $matches[2][$i] . '</a>';
            $level = 2;
        } elseif( $matches[1][$i] == 3 ){
            if( $level == 2 ){
                $SiloToc .= '<ul>';
            }
            $SiloToc .= '<li><a href="#' . $id . '">' . $matches[2][$i] . '</a></li>';
            $level = 3;
        }
    }

    if( $level == 3 ){
        $SiloToc .= '</ul>';
    }

    $SiloToc .= '</ul>';
    $SiloToc .= '</div>';
    $SiloToc .= $ThisJS;

    return $SiloToc;
}

// Replace this Heading The COntent ---------
// ------------------------------------------
add_filter( 'the_content', 'add_heading_id' );
function add_heading_id( $Content ){
    $Content = preg_replace_callback('/<h([2-3])>(.*?)<\/h[2-3]>/i', function( $matches ){
        $ThisReplace = array(
            ' ', '.', ',', '-',
            '?', '!', '#', '*', '#', '"',
            '@', '$', '%', '^', '(', ')', '+',
            '=', '{', '}', '[', ']', ':', '\''
        );

        $id = strtolower( str_replace( $ThisReplace, '_', $matches[2] ) );
        return '<h'. $matches[1] .' id="'. $id .'">'. $matches[2] .'</h'. $matches[1] .'>';
    }, $Content );

    return $Content;
}


// FAQ Help ShortCode Wordpress ================
// =============================================
add_shortcode( 'sl-faq', 'callback_sl_faqs' );
function callback_sl_faqs( $atts, $content = null ){
    $judul = $atts['judul'];
    $tagp = !empty($atts['textfaq']) ? '<p>' . $atts['textfaq'] . '</p>' : '';

    preg_match_all('/\[question\](.*?)\[\/question\](?:\s*<p>|\s*<\/p>)/s', $content, $question_matches);
    preg_match_all('/\[answer\](.*?)\[\/answer\](?:\s*<p>|\s*<\/p>)/s', $content, $answer_matches);

    $faqHtml = '<h2>' . $judul . '</h2>';
    $faqHtml .= $tagp;

    $faqHtml .= '<style>.sl_newFaqs{margin-bottom:1rem}.sl_newFaqs .faqHeader{font-family:Oswald;display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:20px 0;border-top:1px solid var(--hover);border-bottom:1px solid var(--hover);margin-bottom:25px;font-size:20px;transition:.5s}.faqHeader span{word-wrap:break-word;line-height:25px}.faqHeader #faqToggle{background-color:var(--hover);color:#fff;padding:5px 10px;font-weight:700;cursor:pointer}.sl_newFaqs .jawabFaq{display:none;transition:.5s}</style>';

    $faqHtml .= '<div class="sl_newFaqs">';

    for( $i = 0; $i < count($question_matches[1]); $i++ ){
        $question = trim($question_matches[1][$i]);
        $answer = trim($answer_matches[1][$i]);

        $faqHtml .= '<div class="faqHeader">';
        $faqHtml .= '<span class"faqPertanyaan">' . esc_html( $question ) . '</span><span id="faqToggle">+</span>';
        $faqHtml .= '</div>';
        $faqHtml .= '<p class="jawabFaq">'. $answer .'</p>';
    }

    $faqHtml .= '</div>';

    // Json Faqs
    $json_ld = array(
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => array()
    );

    for( $i = 0; $i < count($question_matches[1]); $i++ ){
        $question = trim(strip_tags($question_matches[1][$i]));
        $answer = trim(strip_tags($answer_matches[1][$i]));

        $json_ld["mainEntity"][] = array(
            "@type" => "Question",
            "name" => esc_html( $question ),
            "acceptedAnswer" => array(
                "@type" => "Answer",
                "text" => esc_html( $answer )
            )
        );
    }

    $json_ld_string = json_encode($json_ld, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    $faqHtml .= '<script type="application/ld+json">' . $json_ld_string . '</script>';

    // Script toggle Faqs
    $faqHtml .= '<script>
        document.addEventListener( "click", function( event ){
            var toggleButton = event.target;
        
            if( toggleButton.id === "faqToggle" ){
                var answer = toggleButton.parentNode.nextElementSibling;
                if( answer.style.display === "block" ){
                    answer.style.display = "none";
                    toggleButton.textContent = "+";
                } else{
                    answer.style.display = "block";
                    toggleButton.textContent = "-";
                }
            }
        });
    </script>';

    return $faqHtml;
}

// Youtube embed shortcode =====================
// =============================================
add_shortcode( 'sl-yt', 'callback_sl_yt' );
function callback_sl_yt( $atts ){
    $judulVideo = !empty( $atts['judul'] ) ? $atts['judul'] : get_the_title();
    $videID = $atts['videoid'];

    // Jika video ID tidak kosong
    if( !empty($videID)){

        $shortCodeYt = '<div style="width: 100%;height: 100%;box-shadow: 6px 6px 10px rgba(0, 0, 0, .3);margin-bottom: 25px;">';
        $shortCodeYt .= '<div style="position: relative;padding-bottom: 56.15%;height: 0;overflow: hidden;">';
        $shortCodeYt .= '<iframe
                    style="position: absolute;top: 0;left: 0;width: 100%;height: 100%; border: 0;"
                    loading="lazy"
                    srcdoc="<style>
                        *{padding:0;margin:0;overflow:hidden}body,html{height:100%}img{position:absolute;width:100%;height:auto;top:0;bottom:0;margin:auto}svg{filter:drop-shadow(1px 1px 6px hsl(206.5, 70.7%, 8%));transition:250ms ease-in-out}body:hover svg{filter:drop-shadow(1px 1px 6px hsl(206.5, 0%, 10%);)}svg {
                            position: absolute;
                            width: 50px;
                            height: auto;
                            left: 50%;
                            top: 50%;
                            transform: translate(-50%, -50%);
                        }
                    </style>
                    <a href=\'https://www.youtube.com/embed/'. $videID .'?autoplay=1\'>
                        <img src=\'https://i.ytimg.com/vi/'. $videID .'/sddefault.jpg\' alt=\''. $judulVideo .'\'>
                        <svg width=\'64px\' height=\'64px\' viewBox=\'0 -3 20 20\' version=\'1.1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' fill=\'#e74b2c\'>
                            <g id=\'SVGRepo_bgCarrier\' stroke-width=\'0\'></g>
                            <g id=\'SVGRepo_tracerCarrier\' stroke-linecap=\'round\' stroke-linejoin=\'round\'></g>
                            <g id=\'SVGRepo_iconCarrier\'>
                                <title>youtube [#e74b2c]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id=\'Page-1\' stroke=\'none\' stroke-width=\'1\' fill=\'none\' fill-rule=\'evenodd\'> <g id=\'Dribbble-Light-Preview\' transform=\'translate(-300.000000, -7442.000000)\' fill=\'#fff\'>
                                    <g id=\'icons\' transform=\'translate(56.000000, 160.000000)\'>
                                        <path d=\'M251.988432,7291.58588 L251.988432,7285.97425 C253.980638,7286.91168 255.523602,7287.8172 257.348463,7288.79353 C255.843351,7289.62824 253.980638,7290.56468 251.988432,7291.58588 M263.090998,7283.18289 C262.747343,7282.73013 262.161634,7282.37809 261.538073,7282.26141 C259.705243,7281.91336 248.270974,7281.91237 246.439141,7282.26141 C245.939097,7282.35515 245.493839,7282.58153 245.111335,7282.93357 C243.49964,7284.42947 244.004664,7292.45151 244.393145,7293.75096 C244.556505,7294.31342 244.767679,7294.71931 245.033639,7294.98558 C245.376298,7295.33761 245.845463,7295.57995 246.384355,7295.68865 C247.893451,7296.0008 255.668037,7296.17532 261.506198,7295.73552 C262.044094,7295.64178 262.520231,7295.39147 262.895762,7295.02447 C264.385932,7293.53455 264.28433,7285.06174 263.090998,7283.18289\' id=\'youtube-[#e74b2c]\'></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </a>
                    ">
                </iframe>';
        $shortCodeYt .= '</div>';
        $shortCodeYt .= '</div>';

        $upload_date = get_the_date('c');
        $shortCodeYt .= '<script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "VideoObject",
                "name": "'. $judulVideo .'",
                "description": "Silahkan tonton video tentang '. $judulVideo .'",
                "uploadDate": "' . $upload_date . '",
                "thumbnailUrl": "https://i.ytimg.com/vi_webp/'. $videID .'/hqdefault.webp",
                "contentUrl": "https://www.youtube.com/embed/' . $videID . '",
                "embedUrl": "https://www.youtube.com/embed/' . $videID . '"
            }
        </script>';

        return $shortCodeYt;
    } else{
        return '';
    }
}