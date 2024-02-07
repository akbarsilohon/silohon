<?php
/**
 * Admin panel paid ADS
 * Silohon WordPress Theme
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

if( paid_checker_license() ){
    /**
     * This fiture can show if plugin has activetion
     * Silohon WordPress Theme
     * @package silohon
     * @link https://github.com/akbarsilohon/silohon.git
     */ ?>

    <div class="paid_container">
        <div class="paid_inner">
            <div class="paid_main">
                <div class="paid_header_main">
                    <h1 class="paidH">
                        <?php echo paid_name; ?>
                        <span class="paid_span">
                            <?php echo paid_version; ?>
                        </span>
                    </h1>
                </div>

                <?php 
                    if( isset( $_GET['tb'] ) ){
                        $tb = $_GET['tb'];
                        switch( $tb ){
                            case 'lp':
                                get_template_part( 'paid-ads/panel/page/landing-page' );
                                break;
                            case 'link':
                                get_template_part( 'paid-ads/panel/page/short-link' );
                                break;
                            case 'ads':
                                get_template_part( 'paid-ads/panel/page/ads' );
                                break;
                            case 'hf':
                                get_template_part( 'paid-ads/panel/page/header-footer' );
                                break;
                            case 'settings':
                                get_template_part( 'paid-ads/panel/page/seting' );
                                break;
                        }
                    } else{
                        get_template_part( 'paid-ads/panel/page/root' );
                    }
                ?>
            </div>

            <!-- Navigation -->
            <div class="paid_nav">
                <header class="paid_nav_h">
                    <?php 
                        if( is_user_logged_in() ){
                            $user_id = $user_id = get_current_user_id();
                            $user_data = get_userdata($user_id);
                            $avatar_url = get_avatar_url($user_id);
                            $user_role = reset($user_data->roles); ?>

                            <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_html($user_data->user_login); ?>" class="sl_AuImg">
                            <?php
                        }
                    ?>
                </header>

                <div class="paid_menus">
                    <a href="admin.php?page=sl_paid" class="paid_link <?php if( empty( $_GET['tb'] )) echo 'paid_link-active'; ?>">
                        <span class="dashicons dashicons-dashboard"></span>
                        dashbord
                    </a>
                    <a href="admin.php?page=sl_paid&tb=lp" class="paid_link <?php if( isset($_GET['tb']) && $_GET['tb'] == 'lp' ) echo 'paid_link-active'; ?>">
                        <span class="dashicons dashicons-admin-page"></span>
                        landing page
                    </a>
                    <a href="admin.php?page=sl_paid&tb=link" class="paid_link <?php if( isset($_GET['tb']) && $_GET['tb'] == 'link' ) echo 'paid_link-active'; ?>">
                        <span class="dashicons dashicons-admin-links"></span>
                        short link
                    </a>
                    <a href="admin.php?page=sl_paid&tb=ads" class="paid_link <?php if( isset($_GET['tb']) && $_GET['tb'] == 'ads' ) echo 'paid_link-active'; ?>">
                        <span class="dashicons dashicons-money-alt"></span>
                        ads
                    </a>
                    <a href="admin.php?page=sl_paid&tb=hf" class="paid_link <?php if( isset($_GET['tb']) && $_GET['tb'] == 'hf' ) echo 'paid_link-active'; ?>">
                        <span class="dashicons dashicons-editor-code"></span>
                        header & footer
                    </a>
                    <a href="admin.php?page=sl_paid&tb=settings" class="paid_link <?php if( isset($_GET['tb']) && $_GET['tb'] == 'settings' ) echo 'paid_link-active'; ?>">
                        <span class="dashicons dashicons-admin-tools"></span>
                        setings
                    </a>
                </div>

            </div>
        </div>
    </div>

    <?php

} else{
    /**
     * This form show if not activated
     * Silohon WordPress Theme
     * @package silohon
     * @link https://github.com/akbarsilohon/silohon.git
     */ ?>

    <div class="paid_valid">
        <form action="" class="paid_license_form" method="post">
            <h1>Activetion Plugin</h1>
            <p>Please input your email & license here!</p>
            <div class="paid_mail">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z" fill="#080341"></path> </g></svg>
                <input type="email" name="paid_email" id="paidEmail" placeholder="Your Email here..." require />
            </div>
            <div class="paid_license">
                <svg fill="#000000" height="20px" width="20px" version="1.1" id="XMLID_224_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="license"> <g> <path d="M6,9C4.3,9,3,7.7,3,6s1.3-3,3-3s3,1.3,3,3S7.7,9,6,9z M6,5C5.4,5,5,5.4,5,6s0.4,1,1,1s1-0.4,1-1S6.6,5,6,5z"></path> </g> <g> <path d="M24,24h-6.4L15,21.4V20h-3v-3H9v-3.3C8.4,13.9,7.7,14,7,14c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,0.5,0,1-0.1,1.4 L24,18.6V24z M18.4,22H22v-2.6L11.6,9l0.2-0.6C11.9,8,12,7.5,12,7c0-2.8-2.2-5-5-5S2,4.2,2,7s2.2,5,5,5c0.7,0,1.4-0.1,2.1-0.4 l0.6-0.3l1.3,1.3V15h3v3h3v2.6L18.4,22z"></path> </g> </g> </g></svg>
                <input type="text" name="paid_license" id="paidLicense" placeholder="License here..." require />
            </div>

            <!-- submit button -->
            <div class="paid_sub">
                <a href="http://member.silohon.com/" target="_blank" rel="noopener noreferrer">
                    <button type="button" class="paid_member">
                        Get License
                    </button>
                </a>

                <button type="submit" class="paid_subLicense" name="paid_subLicense">Validate</button>
            </div>
        </form>
    </div>

    <?php
}