<?php

$OrganizationSchema = get_option('organization_active');
if($OrganizationSchema == 'true'){
    // Build organization JSON on head
    add_action('wp_head', 'v2_add_organization_json_head');
}

// Call v2_add_organization_json_head
function v2_add_organization_json_head(){ ?>

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo get_option('nama_og'); ?>",
        "url": "<?php echo get_option('web_og'); ?>",
        "sameAs": [ <?php
                $sameAs = get_option('sameas_og');
                if (!empty($sameAs)) {
                    $sameAsCount = count($sameAs);
                    foreach ($sameAs as $index => $url) {
                        echo '"' . esc_url($url) . '"';
                        if ($index !== $sameAsCount - 1) {
                            echo ',';
                        }
                    }
                }
            ?> ],
        "image": "<?php echo get_option('gambar_og'); ?>",
        "logo": "<?php echo get_option('logo_og') ?>",
        "description": "<?php echo get_option('tt_og') ?>",
        "email": "<?php echo get_option('email_og') ?>",
        "telephone": "<?php echo get_option('phone_og') ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?php echo get_option('alamat_og') ?>",
            "addressLocality": "<?php echo get_option('kota_og') ?>",
            "addressCountry": "<?php echo get_option('ngr_og') ?>",
            "addressRegion": "<?php echo get_option('prov_og') ?>",
            "postalCode": "<?php echo get_option('pos_og') ?>"
        },
        "vatID": "<?php echo get_option('vat_og'); ?>",
        "iso6523Code": "<?php echo get_option('iso_og'); ?>"
    }
</script>

<?php
}


add_action('wp_footer', 'v2_custon_site_navigation');
function v2_custon_site_navigation(){
    $menu_locations = get_nav_menu_locations();
    if (isset($menu_locations['header'])){
        $menu_id = $menu_locations['header'];
        $menu_items = wp_get_nav_menu_items($menu_id);
        if ($menu_items){
            $schema_actions = [];
            foreach ($menu_items as $item){
                $schema_actions[] = array(
                    '@type' => 'Action',
                    'name' => $item->title,
                    'url' => $item->url,
                );
            }

            $schema = array(
                '@context' => 'http://schema.org',
                '@type' => 'SiteNavigationElement',
                'potentialAction' => $schema_actions,
            );

            echo '
                <script type="application/ld+json">
                    ' . json_encode($schema, JSON_PRETTY_PRINT) . '
                </script>
            ';
        }
    }
}