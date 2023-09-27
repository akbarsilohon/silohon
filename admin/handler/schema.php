<?php
// data Schema Organisasi
add_action('wp_head', 'silo_schema_organization');
function silo_schema_organization(){
    echo '
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Organization",
                "name": "'. get_bloginfo('name') .'",
                "url": "'. get_bloginfo('url') .'",
                "logo": "https://aepone.com/wp-content/uploads/2023/03/aepone-logo.png",
                "description": "'. get_bloginfo('description') .'",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "KMP. KOTA 1 SAPEKEN",
                    "addressLocality": "SUMENEP",
                    "addressRegion": "JAWA TIMUR",
                    "postalCode": "69493",
                    "addressCountry": "INDONESIA"
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+6281236847767",
                    "contactType": "Owner",
                    "email": "nur.akbar1994@gmail.com"
                }
            }
        </script>
    ';
}


// data Schema Site Navigation
add_action('wp_footer', 'silo_schema_navigation');
function silo_schema_navigation(){
    $menu_locations = get_nav_menu_locations();

    if(isset($menu_locations['header'])){
        $menu_id = $menu_locations['header'];
        $menu_items = wp_get_nav_menu_items($menu_id);

        if($menu_items){
            $schema_actions = [];

            foreach($menu_items as $item){
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