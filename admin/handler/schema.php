<?php

add_settings_section( 'data-schema-group', null, null, 'schema_setting_data' );
register_setting( 'silo-data-schema-group', 'organization_active' );
add_settings_field( 'org-active', 'Data Organization Schema: ', 'org_active', 'schema_setting_data', 'data-schema-group' );
function org_active(){
    $orgActive = get_option( 'organization_active' );
    $activeOrNot = ( $orgActive === 'true' ? 'checked' : '' );
    echo '<input type="checkbox" name="organization_active" id="organization_active" value="true" '. $activeOrNot .'/>';
}

// Organization Name =====================================
// =======================================================
register_setting( 'silo-data-schema-group', 'organization_name' );
add_settings_field( 'org-name', 'Organization Name: ', 'org_name', 'schema_setting_data', 'data-schema-group' );
function org_name(){
    $orgName = get_option( 'organization_name' );
    echo '<input type="text" name="organization_name" id="organization_name" value="'. $orgName .'"/>';
}

// Organization Image =======================================
// ==========================================================
register_setting( 'silo-data-schema-group', 'organization_image' );
add_settings_field( 'org-img', 'Organization Image: ', 'org_img', 'schema_setting_data', 'data-schema-group' );
function org_img(){
    $orgImg = get_option( 'organization_image' );
    echo '<input type="url" name="organization_image" id="organization_image" value="'. $orgImg .'"/>';
}


// Organization Descripttion ==================================
// ============================================================
register_setting( 'silo-data-schema-group', 'organization_desc' );
add_settings_field( 'org-desc', 'About Organization: ', 'org_desc', 'schema_setting_data', 'data-schema-group' );
function org_desc(){
    $orgDesc = get_option( 'organization_desc' );
    echo '<textarea name="organization_desc" id="organization_desc" cols="80" rows="10">'. $orgDesc .'</textarea>';
}


// Organization Address =========================================
// ==============================================================
register_setting( 'silo-data-schema-group', 'organization_address' );
add_settings_field( 'org-address', 'Street Address: ', 'org_address', 'schema_setting_data', 'data-schema-group' );
function org_address(){
    $orgAddress = get_option( 'organization_address' );
    echo '<textarea name="organization_address" id="organization_address" cols="80" rows="10">'. $orgAddress .'</textarea>';
}

// Organization City ========================
// ==========================================
register_setting( 'silo-data-schema-group', 'organization_city' );
add_settings_field( 'org-city', 'City: ', 'org_city', 'schema_setting_data', 'data-schema-group' );
function org_city(){
    $orgCity = get_option( 'organization_city' );
    echo '<input type="text" name="organization_city" id="organization_city" value="'. $orgCity .'"/>';
}

// Organization Region ====================
// ========================================
register_setting( 'silo-data-schema-group', 'organization_region' );
add_settings_field( 'org-region', 'Region: ', 'org_region', 'schema_setting_data', 'data-schema-group' );
function org_region(){
    $orgRegion = get_option( 'organization_region' );
    echo '<input type="text" name="organization_region" id="organization_region" value="'. $orgRegion .'"/>';
}


// Organization Postal Code ====================
// =============================================
register_setting( 'silo-data-schema-group', 'organization_postalCode' );
add_settings_field( 'org-postal', 'Postal Code: ', 'org_postal', 'schema_setting_data', 'data-schema-group' );
function org_postal(){
    $orgPostal = get_option( 'organization_postalCode' );
    echo '<input type="number" name="organization_postalCode" id="organization_postalCode" value="'. $orgPostal .'"/>';
}


// Organization addressCountry ================
// ============================================
register_setting( 'silo-data-schema-group', 'organization_country' );
add_settings_field( 'org-country', 'Country: ', 'org_country', 'schema_setting_data', 'data-schema-group' );
function org_country(){
    $orgCountry = get_option( 'organization_country' );
    echo '<input type="text" name="organization_country" id="organization_country" value="'. $orgCountry .'"/>';
}

// Organization telephone ==================
// =========================================
register_setting( 'silo-data-schema-group', 'organization_telephone' );
add_settings_field( 'org-telephone', 'Telephone: ', 'org_telephone', 'schema_setting_data', 'data-schema-group' );
function org_telephone(){
    $orgTelephone = get_option( 'organization_telephone' );
    echo '<input type="text" name="organization_telephone" id="organization_telephone" value="'. $orgTelephone .'"/>';
}

register_setting( 'silo-data-schema-group', 'organization_email' );
add_settings_field( 'org-email', 'Email: ', 'org_email', 'schema_setting_data', 'data-schema-group' );
function org_email(){
    $orgEmail = get_option( 'organization_email' );
    echo '<input type="email" name="organization_email" id="organization_email" value="'. $orgEmail .'"/>';
}