<?php

// ---------------------------------------
// Editor Handler ------------------------
// ---------------------------------------
function is_gutenberg_editing(){
    if( version_compare( $GLOBALS['wp_version'], '5.0-beta', '>' ) ){
		$current_screen = get_current_screen();
		if( $current_screen->is_block_editor() ){
			return true;
		}
	}

	return false;
}

add_action( 'add_meta_boxes', 'silo_builder_handler', 1 );
function silo_builder_handler(){
    if( is_gutenberg_editing() ){
        add_meta_box(
            'it_cant_build',
            esc_html__( 'Silo Builder', 'silo' ) . '<small>' . esc_html__( 'This Page Builder Show Only Classic Editor', 'silo' ) . '</small>',
            'silo_calls_builder',
            'page',
            'normal',
            'high'
        );
    } else{
        add_action( 'edit_form_after_title', 'silo_calls_builder' );
    }
}