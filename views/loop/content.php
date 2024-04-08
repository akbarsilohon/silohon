<div class="container silo_looping">
    <div class="looping">
        <div class="loop_title" style="margin-bottom:1rem;">
            <span class="__title">Blog Post</span>
        </div>

        <ul class="__loop">
            <?php 
            while( have_posts() ){
                the_post(); ?>
                <li class="___loop">
                    <?php
                        $classPost = ( has_post_thumbnail() ? 'loop_link' : 'loop_no_thum');
                        $classPostBody = ( has_post_thumbnail() ? 'loop_body' : 'loop_body_no_thum');
                    ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="<?php echo $classPost; ?>">
                        <?php 
                            if( has_post_thumbnail()){
                                the_post_thumbnail( 'full', array(
                                    'loading' => 'lazy'
                                ));
                            }
                        ?>
                        <div class="<?php echo $classPostBody; ?>">
                            <span class="metas"><?php silo_cats(); ?></span>
                            <span class="metas">/</span>
                            <span class="metas"><?php the_time('F d, Y'); ?></span>
                            <?php the_title('<h2 class="post_title">', '</h2>'); ?>
                            <?php the_excerpt(); ?>
                        </div>
                    </a>
                </li>
            <?php }
            ?>
        </ul>

        <div class="silo_paginate">
            <?php echo paginate_links( array(
                'mid_size' => 2
            )); ?>
        </div>
    </div>

    <?php get_sidebar(); ?>
</div>