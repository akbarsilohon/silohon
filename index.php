<?php get_header();

if( have_posts() ){
    get_template_part( 'views/loop/content' );
} else{
    get_template_part( 'views/empty' );
}

get_footer(); ?>