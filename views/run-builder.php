<?php
// ---------------------------------------
// Routing Grid Style --------------------
// ---------------------------------------
global $grid, $get_meta, $post, $page_builder_id;
$page_builder_id = $post->ID;

if(isset( $get_meta['silo_grid'][0] )){
    $grids = false;
    if( !empty( $get_meta['silo_grid'][0] )){
        $grids = $get_meta['silo_grid'][0];
        if( is_serialized( $grids )){
            $grids = unserialize( $grids );
        }
    }
}

// ----------------------------------------
// Get Grid Style Data --------------------
// ----------------------------------------
if( !empty( $grids ) && is_array( $grids )){
    foreach( $grids as $grid ){
        switch( $grid['style'] ){

            // For Grid 6 Layouts
            case 'g6' :
                get_template_part( 'views/loop/grid', '6' );
            break;

            // For Grid 9 Layouts
            case 'g9' :
                get_template_part( 'views/loop/grid', '9' );
            break;
        }
    }
}