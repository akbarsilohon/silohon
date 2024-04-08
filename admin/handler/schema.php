<?php

add_settings_section( 'data-schema-group', null, null, 'schema_setting_data' );
register_setting( 'silo-data-schema-group', 'organization_active' );
add_settings_field( 'org-active', 'Aktifkan?: ', 'org_active', 'schema_setting_data', 'data-schema-group' );
function org_active(){
    $orgActive = get_option( 'organization_active' );
    $activeOrNot = ( $orgActive === 'true' ? 'checked' : '' );
    echo '<input type="checkbox" name="organization_active" id="organization_active" value="true" '. $activeOrNot .'/>';
}

// Organization Name =====================================
// =======================================================
register_setting( 'silo-data-schema-group', 'nama_og' );
add_settings_field( 'ogname', 'Nama Organisasi', 'call_ogname', 'schema_setting_data', 'data-schema-group' );
function call_ogname(){
    $name = get_option('nama_og');
    echo '<input class="org" type="text" name="nama_og" id="nama_og" value="'. $name .'"/>';
}


// VAT ===================================================
// =======================================================
register_setting('silo-data-schema-group', 'vat_og');
add_settings_field( 'vatog', 'ID VAT: ', 'call_vatog', 'schema_setting_data', 'data-schema-group' );
function call_vatog(){
    $vat = get_option('vat_og');
    echo '<input class="org" type="text" name="vat_og" id="vat_og" value="'. $vat .'"/>';
}


// ISO ===================================================
// =======================================================
register_setting('silo-data-schema-group', 'iso_og');
add_settings_field( 'isoog', 'KODE ISO 6523: ', 'call_isoog', 'schema_setting_data', 'data-schema-group' );
function call_isoog(){
    $iso = get_option('iso_og');
    echo '<input class="org" type="text" name="iso_og" id="iso_og" value="'. $iso .'"/>';
}

// Website ===============================================
// =======================================================
register_setting( 'silo-data-schema-group', 'web_og' );
add_settings_field( 'webog', 'Website: ', 'call_webog', 'schema_setting_data', 'data-schema-group' );
function call_webog(){
    $web = get_option('web_og');
    echo '<input class="org" type="url" name="web_og" id="web_og" value="'. $web .'"/>';
}

// Url Sosmed ============================================
// =======================================================
register_setting('silo-data-schema-group', 'sameas_og');
add_settings_field( 'sameasog', 'Profil Media Sosial: ', 'call_sameasog', 'schema_setting_data', 'data-schema-group' );
function call_sameasog(){
    $sameAs = get_option('sameas_og');
    echo '<div id="sameas-container">';
    if (!empty($sameAs)) {
        foreach ($sameAs as $url) {
            echo '<div><input type="url" name="sameas_og[]" value="' . $url . '" class="sameas-input"><button class="remove-sameas">Hapus</button></div>';
        }
    }
    echo '</div>';
    echo '<button id="add-sameas">Tambahkan</button>';
}


// Gambar ===============================================
// =======================================================
register_setting('silo-data-schema-group', 'gambar_og');
add_settings_field( 'gambarog', 'Url Gambar: ', 'call_gambarog', 'schema_setting_data', 'data-schema-group' );
function call_gambarog(){
    $gambar = get_option('gambar_og');
    echo '<input class="org" type="url" name="gambar_og" id="gambar_og" value="'. $gambar .'"/>';
}


// Logo ==================================================
// =======================================================
register_setting('silo-data-schema-group', 'logo_og');
add_settings_field( 'logoog', 'Url Logo: ', 'call_logoog', 'schema_setting_data', 'data-schema-group' );
function call_logoog(){
    $logo = get_option('logo_og');
    echo '<input class="org" type="url" name="logo_og" id="logo_og" value="'. $logo .'"/>';
}


// Tentang ===============================================
// =======================================================
register_setting('silo-data-schema-group', 'tt_og');
add_settings_field( 'ttog', 'Tentang Organisasi: ', 'call_ttog', 'schema_setting_data', 'data-schema-group' );
function call_ttog(){
$tentang = get_option('tt_og'); ?>
<textarea name="tt_og" id="tt_og" cols="30" rows="10"><?php echo $tentang; ?></textarea>
<?php
}

// Email =================================================
// =======================================================
register_setting('silo-data-schema-group', 'email_og');
add_settings_field( 'emailog', 'Email: ', 'call_emailog', 'schema_setting_data', 'data-schema-group' );
function call_emailog(){
    $email = get_option('email_og');
    echo '<input class="org" type="email" name="email_og" id="email_og" value="'. $email .'"/>';
}


// Telepone ==============================================
// =======================================================
register_setting('silo-data-schema-group', 'phone_og');
add_settings_field( 'phoneog', 'Telephone: ', 'call_phoneog', 'schema_setting_data', 'data-schema-group' );
function call_phoneog(){
    $phone = get_option('phone_og');
    echo '<input class="org" type="text" name="phone_og" id="phone_og" value="'. $phone .'"/>';
}


// Alamat ================================================
// =======================================================
register_setting('silo-data-schema-group', 'alamat_og');
add_settings_field( 'alamatog', 'Alamat: ', 'call_alamatog', 'schema_setting_data', 'data-schema-group' );
function call_alamatog(){
    $alamat = get_option('alamat_og');
    echo '<input class="org" type="text" name="alamat_og" id="alamat_og" value="'. $alamat .'"/>';
}


// Kota ==================================================
// =======================================================
register_setting('silo-data-schema-group', 'kota_og');
add_settings_field( 'kotaog', 'Kota: ', 'call_kotaog', 'schema_setting_data', 'data-schema-group' );
function call_kotaog(){
    $kota = get_option('kota_og');
    echo '<input class="org" type="text" name="kota_og" id="kota_og" value="'. $kota .'"/>';
}


// Provinsi ==============================================
// =======================================================
register_setting('silo-data-schema-group', 'prov_og');
add_settings_field( 'provog', 'Provinsi: ', 'call_provog', 'schema_setting_data', 'data-schema-group' );
function call_provog(){
    $provinsi = get_option('prov_og');
    echo '<input class="org" type="text" name="prov_og" id="prov_og" value="'. $provinsi .'"/>';
}


// Kode Negara ===========================================
// =======================================================
register_setting('silo-data-schema-group', 'ngr_og');
add_settings_field( 'ngrog', 'ID Negara: ', 'call_ngrog', 'schema_setting_data', 'data-schema-group' );
function call_ngrog(){
    $negara = get_option('ngr_og');
    echo '<input class="org" type="text" name="ngr_og" id="ngr_og" value="'. $negara .'"/>';
}


// Kode Pos ==============================================
// =======================================================
register_setting('silo-data-schema-group', 'pos_og');
add_settings_field( 'posog', 'Kode POS: ', 'call_posog', 'schema_setting_data', 'data-schema-group' );
function call_posog(){
    $kodepos = get_option('pos_og');
    echo '<input class="org" type="text" name="pos_og" id="pos_og" value="'. $kodepos .'"/>';
}












function add_sameas_script() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        $('#add-sameas').click(function() {
            $('#sameas-container').append('<div><input type="url" name="sameas_og[]" class="sameas-input"><button class="remove-sameas">Hapus</button></div>');
        });

        $(document).on('click', '.remove-sameas', function() {
            $(this).parent().remove();
        });
    });
    </script>
    <?php
}
add_action('admin_footer', 'add_sameas_script');