<?php

// ---------------------------------------
// Save Builder --------------------------
// ---------------------------------------
add_action( 'save_post', 'silo_save_builder' );
function silo_save_builder( $post_id ){
    global $post;

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return $post_id;
    }

    // Builder Active Or Disable ---------------
    // -----------------------------------------
    if( isset( $_POST['silo_builder_active' ]) && !empty( $_POST['silo_builder_active'] ) && $_POST['silo_builder_active'] == 'true' ){
        update_post_meta(
            $post_id,
            'silo_builder_active',
            'true'
        );
    } else{
        delete_post_meta(
            $post_id,
            'silo_builder_active'
        );
    }

    // Grid Layouts --------------------------------
    // ---------------------------------------------
    if( isset( $_POST['grid_layouts']) && !empty( $_POST['grid_layouts'])){

        $grid_layouts = $_POST['grid_layouts'];
        array_walk_recursive( $grid_layouts, function (&$value) {
            $value = sanitize_text_field($value);
        });

        update_post_meta(
            $post_id,
            'silo_grid',
            $grid_layouts
        );
    } else{
        delete_post_meta(
            $post_id,
            'silo_grid'
        );
    }

    // Last Section -------------------------------
    // --------------------------------------------
    if( isset( $_POST['last'] ) && !empty( $_POST['last'] ) && $_POST['last']['active'] == 'true' ){
        $last_section = $_POST['last'];
        array_walk_recursive( $last_section, function (&$value) {
            $value = sanitize_text_field($value);
        });
        update_post_meta(
            $post_id,
            'silo_last',
            $last_section
        );
    } else{
        delete_post_meta(
            $post_id,
            'silo_last'
        );
    }


    // Hero Post ----------------------------------
    // --------------------------------------------
    if( isset( $_POST['hero'] ) && !empty( $_POST['hero'] ) && $_POST['hero']['active'] == 'true' ){
        $hero_post = $_POST['hero'];
        array_walk_recursive( $hero_post, function (&$value) {
            $value = sanitize_text_field($value); // Gantilah fungsi ini sesuai kebutuhan
        });

        update_post_meta(
            $post_id,
            'silo_hero',
            $hero_post
        );
    } else{
        delete_post_meta(
            $post_id,
            'silo_hero'
        );
    }
}