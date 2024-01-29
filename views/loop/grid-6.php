<?php

// -----------------------------------
// Looping Post Grid 6 ---------------
// -----------------------------------
global $grid, $page_builder_id;
$Cat_ID = $grid['cat'];

$args = array(
    'cat'                   => $Cat_ID,
    'posts_per_page'        => $grid['num'],
    'no_found_rows'         => true,
    'ignore_sticky_posts'   => true
);

if( !empty( $grid['order'] ) && $grid['order'] == 'rand' ){
    $args['orderby'] = 'rand';
}

$G6_Quer = new WP_Query( $args );
$Cat_Title = get_the_category_by_ID( $Cat_ID );
$i=0; ?>

<section class="silo_sec">
    <div class="section_title">
        <span class="sec_title"><?php echo $Cat_Title; ?></span>
    </div>

    <?php if( $G6_Quer->have_posts() ){ ?>
    
    <div class="grid_2">
        <?php 
        $inCount = $G6_Quer->post_count;
        while( $i < min( 2, $inCount ) && $G6_Quer->have_posts() ){
            $G6_Quer->the_post(); $i++; ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="grid_2_link">
            
                <?php 
                    if( has_post_thumbnail()){
                        the_post_thumbnail( 'full', array(
                            'class' => 'grid_2_img',
                            'loading' => 'lazy'
                        ));
                    } else{
                        echo '<img src="' . SILO_URI . '/img/lazy.jpg' . '" data-src="' . SILO_URI . '/img/lazy.jpg' . '" class="grid_2_img" loading="lazy"/>';
                    }
                ?>
                <div class="grid_2_body">
                    <span class="metas">By: <?php the_author(); ?></span>
                    <span class="metas">/</span>
                    <span class="metas"><?php the_time('F d,Y'); ?></span>
                    <?php the_title('<h2 class="grid_2_title">', '</h2>'); the_excerpt(); ?>
                </div>
            </a>
        <?php } ?>
    </div>

    <div class="grid_4">
        <?php 
        $i=0; while( $G6_Quer->have_posts() ){
            $G6_Quer->the_post(); $i++; ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="grid_4_link">
                <?php 
                    if( has_post_thumbnail()){
                        the_post_thumbnail( 'medium', array(
                            'class' => 'grid_4_img',
                            'loading' => 'lazy'
                        ));
                    } else{
                        echo '<img src="' . SILO_URI . '/img/lazy.jpg' . '" data-src="' . SILO_URI . '/img/lazy.jpg' . '" class="grid_4_img" loading="lazy"/>';
                    }
                
                ?>
                <div class="grid_4_body">
                    <span class="meta">By: <?php the_author(); ?></span>
                    <span class="meta">/</span>
                    <span class="meta"><?php the_time('F d,Y'); ?></span>
                    <?php the_title('<h2 class="grid_4_title">', '</h2>'); the_excerpt(); ?>
                </div>
            </a>
        <?php } ?>
    </div>

    <?php } ?>

</section>


<?php
wp_reset_query();
wp_reset_postdata();