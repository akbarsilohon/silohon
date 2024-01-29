<?php

// ----------------------------------------
// Loop Recent ----------------------------
// ----------------------------------------
$get_meta = get_post_custom( $post->ID );
if( isset( $get_meta['silo_last'][0])){
    $secs = false;
    if( !empty( $get_meta['silo_last'][0] )){
        $secs = $get_meta['silo_last'][0];
        if( is_serialized( $secs )){
            $secs = unserialize( $secs );
        }
    }
}

if( !empty( $secs ) && is_array( $secs )){
    $args = array(
        'post_type' => 'post',
        'cat' => $secs['cat'],
        'posts_per_page' => $secs['num'],
        'no_found_rows'          => true,
        'ignore_sticky_posts'	 => true
    );

    // The Conditional
    if( !empty( $secs['order'] ) && $secs['order'] == 'rand' ){
        $args['orderby'] = 'rand';
    }

    $Recent_Quer = new WP_Query( $args );
    $CatName = get_the_category_by_ID( $secs['cat'] );
    $i=0; ?>

    <section class="lates_section">
        <div class="the_latest">
            <div class="section_title">
                <span class="sec_title"><?php echo $CatName; ?></span>
            </div>

            <?php if( $Recent_Quer->have_posts() ){ ?>
            <ul class="ul_latest">
                <?php while( $Recent_Quer->have_posts() ){
                    $Recent_Quer->the_post(); $i++; ?>
                    <li class="li_latest">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="latest_link">
                            <?php 
                                if( has_post_thumbnail()){
                                    the_post_thumbnail( 'medium', array(
                                        'class' => 'img_latest',
                                        'loading' => 'lazy'
                                    ));
                                } else{
                                    echo '<img src="' . SILO_URI . '/img/lazy.jpg' . '" data-src="' . SILO_URI . '/img/lazy.jpg' . '" class="img_latest" loading="lazy"/>';
                                }
                            ?>

                            <div class="latest_body">
                                <span class="meta">By: <?php the_author(); ?></span>
                                <span class="meta">/</span>
                                <span class="meta"><?php the_time('F d, Y'); ?></span>
                                <?php the_title('<h2 class="latest_title">', '</h2>'); the_excerpt(); ?>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>

        <?php get_sidebar(); ?>
    </section>

<?php
    wp_reset_query();
    wp_reset_postdata();
}