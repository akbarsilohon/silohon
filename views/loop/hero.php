<?php

// -----------------------------------
// Hero Render View ------------------
// -----------------------------------

$get_meta = get_post_custom( $post->ID );
if( isset( $get_meta['silo_hero'][0] )){
    $hero = false;
    if( !empty( $get_meta['silo_hero'][0] )){
        $hero = $get_meta['silo_hero'][0];
        if( is_serialized( $hero )){
            $hero = unserialize( $hero );
        }
    }
}


// --------------------------------------
// Looping Data -------------------------
// --------------------------------------
if( !empty( $hero ) && is_array( $hero )){
    
    // This argumentation Query Hero
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $hero['num'],
        'no_found_rows'          => true,
        'ignore_sticky_posts'	 => true
    );

    // The Conditional
    if( !empty( $hero['cat'] )){
        $args['cat'] = $hero['cat'];
    }

    if( !empty( $hero['order'] ) && $hero['order'] == 'rand' ){
        $args['orderby'] = 'rand';
    }

    $Hero_Quer = new WP_Query( $args );
    $i=0;

    if( $Hero_Quer->have_posts() ){ ?>
        <section class="hero">
            <?php 
            $inCount = $Hero_Quer->post_count;
            while( $i < min( 1, $inCount ) &&  $Hero_Quer->have_posts() ){
                $Hero_Quer->the_post(); $i++; ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="hero_link">
                    <?php
                        if( has_post_thumbnail()){
                            the_post_thumbnail( 'full', array(
                                'class' => 'hero_image',
                                'loading' => 'eager'
                            ));
                        }
                    ?>
                    <div class="hero_body">
                        <span class="meta"><?php silo_cats(); ?></span>
                        <span class="meta">/</span>
                        <span class="meta"><?php silo_the_time(); ?></span>
                        <?php the_title('<h2 class="hero_title">', '</h2>'); ?>
                        <?php the_excerpt(); ?>
                    </div>

                </a>
            <?php } ?>

            <div class="silo_hiro_child container">
                <?php $i=0; while( $Hero_Quer->have_posts() ){
                    $Hero_Quer->the_post(); $i++; ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="hero_child_link">
                        <?php 
                            if( has_post_thumbnail()){
                                the_post_thumbnail( 'medium', array(
                                    'loading' => 'lazy'
                                ) );
                            }
                        ?>

                        <div class="silo_hiro_child_body">
                            <span class="metas"><?php silo_cats(); ?></span>
                            <span class="metas">/</span>
                            <span class="metas"><?php the_time('F d, Y'); ?></span>
                            <?php the_title('<h2 class="child_hero_title">', '</h2>'); ?>
                            <?php the_excerpt(); ?>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </section>
    <?php }

    wp_reset_query();
    wp_reset_postdata();
}