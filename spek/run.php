<?php
/**
 * Add Custom Post
 * Post Type Spek
 * @package silohon
 * @link https://github.com/silohon/silohon
 */
add_action( 'init', 'silo_new_spek_post_type' );
function silo_new_spek_post_type(){
    $labels = array(
        'name'                  =>  'Spesifikasi',
        'singular_name'         =>  'Spesifikasi',
        'add_new'               =>  'New Spek',
        'add_new_item'          =>  'New Spek',
        'view_item'             =>  'View Spek',
        'search_items'          =>  'Search Spek',
        'not_found'             => 'Spek Not Found',
        'not_found_in_trash'    => 'Spek Not Found in Trash'
    );

    $args = array(
        'labels'                =>  $labels,
        'public'                =>  true,
        'has_archive'           =>  true,
        'publicly_queryable'    =>  true,
        'query_var'             =>  true,
        'show_in_rest'          => true,
        'rewrite'               =>  array( 'slug' => 'spek' ),
        'capability_type'       =>  'post',
        'supports'              =>  array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_position'         =>  6,
        'menu_icon'             =>  'dashicons-smartphone'
    );

    register_post_type( 'spek', $args );

    $category_labels = array(
        'name'              => _x('Spek Categories', 'taxonomy general name'),
        'singular_name'     => _x('Spek Category', 'taxonomy singular name'),
        'search_items'      => __('Search Spek Categories'),
        'all_items'         => __('All Spek Categories'),
        'parent_item'       => __('Parent Spek Category'),
        'parent_item_colon' => __('Parent Spek Category:'),
        'edit_item'         => __('Edit Spek Category'),
        'update_item'       => __('Update Spek Category'),
        'add_new_item'      => __('Add New Spek Category'),
        'new_item_name'     => __('New Spek Category Name'),
        'menu_name'         => __('Spek Categories'),
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'spek-category'),
    );

    register_taxonomy('spek_category', array('spek'), $category_args);
}


function template_chooser($template)   
{    
    global $wp_query;   
    $post_type = get_query_var('post_type');   
    if( $wp_query->is_search && $post_type == 'spek' )   
    {
        return locate_template('search-spek.php');
    }   
    return $template; 
}
add_filter('template_include', 'template_chooser');