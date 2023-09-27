<?php

// -----------------------------------
// Looping Post Grid 9 ---------------
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

$G9_Quer = new WP_Query( $args );
$Cat_Title = get_the_category_by_ID( $Cat_ID );
$i=0; ?>

<section class="silo_sec">
    <div class="section_title">
        <span class="sec_title"><?php echo $Cat_Title; ?></span>
    </div>

    <?php 
    if( $G9_Quer->have_posts() ){ ?>

    <div class="grid_3">
        <div class="grid_3A">
            <?php 
            $toCount = $G9_Quer->post_count;
            while( $i < min( 2, $toCount ) && $G9_Quer->have_posts() ){
                $G9_Quer->the_post(); $i++; ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="grid_3A_link">
                    <?php 
                        if( has_post_thumbnail()){
                            the_post_thumbnail( 'medium', array(
                                'class' => 'grid_3A_img',
                                'loading' => 'lazy'
                            ));
                        }
                    ?>

                    <div class="grid_3A_body">
                        <span class="meta">By <?php the_author(); ?></span>
                        <span class="meta">/</span>
                        <span class="meta"><?php the_time('F d, Y'); ?></span>
                        <?php the_title('<h2 class="grid_3A_title">', '</h2>'); the_excerpt(); ?>
                    </div>
                </a>
            <?php } ?>
        </div> <!-- /grid_3A -->

        <div class="grid_3B">
            <?php 
            $i=0; while( $i < min( 1, $toCount ) && $G9_Quer->have_posts() ){
                $G9_Quer->the_post(); $i++; ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="grid_3B_link">
                    <?php 
                        if( has_post_thumbnail()){
                            the_post_thumbnail( 'full', array(
                                'class' => 'grid_3B_img',
                                'loading' => 'lazy'
                            ));
                        }
                    ?>

                    <div class="grid_3B_body">
                        <span class="metas">By: <?php the_author(); ?></span>
                        <span class="metas">/</span>
                        <span class="metas"><?php the_time('F d,Y'); ?></span>
                        <?php the_title('<h2 class="grid_3B_title">', '</h2>'); the_excerpt(); ?>
                    </div>
                </a>
            <?php } ?>
        </div> <!-- /grid_3B -->

        <div class="grid_3C">
            <?php $i=0; while( $G9_Quer->have_posts() ){
                $G9_Quer->the_post(); $i++; ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="grid_3C_link">
                    <?php 
                        if( has_post_thumbnail()){
                            the_post_thumbnail( 'thumbnail', array(
                                'class' => 'grid_3C_img',
                                'loading' => 'lazy'
                            ));
                        }
                    ?>

                    <div class="grid_3C_body">
                        <span class="meta">By: <?php the_author(); ?></span>
                        <span class="meta">/</span>
                        <span class="meta"><?php the_time('F d, Y'); ?></span>
                        <?php the_title('<h2 class="grid_3C_title">', '</h2>'); the_excerpt(); ?>
                    </div>
                </a>
            <?php } ?>
        </div> <!-- /grid_3C -->
    </div>

    <?php } ?>


</section>

<?php

wp_reset_query();
wp_reset_postdata();