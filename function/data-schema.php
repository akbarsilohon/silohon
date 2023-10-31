<?php

$OrganizationSchema = get_option('organization_active');
if($OrganizationSchema == 'true'){
    // Build organization JSON on head
    add_action('wp_head', 'v2_add_organization_json_head');
}

// Call v2_add_organization_json_head
function v2_add_organization_json_head(){
    // context
    $organization = get_option('organization_name');
    $organizationLogo = get_option('organization_image');
    $organizationDesc = get_option('organization_desc');

    // address
    $streetAddress = get_option('organization_address');
    $addressLocality = get_option('organization_city');
    $addressRegion = get_option('organization_region');
    $postalCode = get_option('organization_postalCode');
    $addressCountry = get_option('organization_country');

    // contactPoint
    $telephone = get_option('organization_telephone');
    $email = get_option('organization_email');
    $contactType = 'Admin';

    echo '
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Organization",
                "name": "'. $organization .'",
                "url": "'. get_bloginfo('url') .'",
                "logo": "'. $organizationLogo .'",
                "description": "'. $organizationDesc .'",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "'. $streetAddress .'",
                    "addressLocality": "'. $addressLocality .'",
                    "addressRegion": "'. $addressRegion .'",
                    "postalCode": "'. $postalCode .'",
                    "addressCountry": "'. $addressCountry .'"
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "'. $telephone .'",
                    "email": "'. $email .'",
                    "contactType": "'. $contactType .'"
                }
            }
        </script>
    ';

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