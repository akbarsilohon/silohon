<?php

// ----------------------------------------
// Silohon Page Builder -------------------
// ----------------------------------------
require SILO_DIR . '/build/handler/save.php';
require SILO_DIR . '/build/handler/editor.php';

function silo_calls_builder(){
    global $post;
    $screen = get_current_screen();

    if( get_post_type( $post->ID ) != 'page' && $screen->post_type != 'page' ){
        return;
    }

    $get_meta = get_post_custom( $post->ID );
    
    if( isset( $get_meta['silo_grid'][0] )){
        $grids = false;
        if( !empty( $get_meta['silo_grid'][0] )){
            $grids = $get_meta['silo_grid'][0];
            if( is_serialized( $grids )){
                $grids = unserialize( $grids );
            }
        }
    }
    
    //Categories
	$categories_obj = get_categories('hide_empty=0');
	$categories 	= array();
	foreach ($categories_obj as $pn_cat) {
		$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	}
    
    ?>

<a href="" class="button button-large <?php if( !empty( $get_meta['silo_builder_active'])) echo 'button-primary builder-active' ?>" id="is_call_builder">Page Builder</a>
<input type="hidden" name="silo_builder_active" id="silo_builder_active" value="<?php if( !empty( $get_meta['silo_builder_active']) && $get_meta['silo_builder_active'][0] == 'true' ) echo 'true'; ?>">

<div id="home_builder" <?php if( !empty( $get_meta['silo_builder_active']) && $get_meta['silo_builder_active'][0] == 'true' ) echo 'style="display:block;"'; ?>>
    <?php 
    // -----------------------------------------------
    // Call Grid Layout Builder ----------------------
    // -----------------------------------------------
    require SILO_DIR . '/build/panel/grid.php';

    // -----------------------------------------------
    // Call Last Section -----------------------------
    // -----------------------------------------------
    require SILO_DIR . '/build/panel/section.php';

    // -----------------------------------------------
    // Call Hero Panel -------------------------------
    // -----------------------------------------------
    require SILO_DIR . '/build/panel/hero.php';
    ?>
</div>

<?php }