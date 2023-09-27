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
        array_walk_recursive( $_POST['grid_layouts'] );
        update_post_meta(
            $post_id,
            'silo_grid',
            $_POST['grid_layouts']
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
        array_walk_recursive( $_POST['last'] );
        update_post_meta(
            $post_id,
            'silo_last',
            $_POST['last']
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
        array_walk_recursive( $_POST['hero'] );
        update_post_meta(
            $post_id,
            'silo_hero',
            $_POST['hero']
        );
    } else{
        delete_post_meta(
            $post_id,
            'silo_hero'
        );
    }
}