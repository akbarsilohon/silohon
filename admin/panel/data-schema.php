<div class="silo_container">
    <h1 class="silo_top_heading">Data Schema</h1>
    <?php settings_errors(); ?>

    <form action="options.php" method="post" class="silo_form">
        <?php
            settings_fields('silo-data-schema-group');
            do_settings_sections( 'schema_setting_data' );
            submit_button('Save');
        ?>
    </form>
</div>