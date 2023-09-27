<?php get_header(); ?>

<div class="container">
    <div class="spek_grid">
        <div class="spek_loop">
            <h3 class="spek_section_title">
                <?php 
                    $category = get_queried_object();
                    echo 'Brand '. $category->name .'';
                ?>
            </h3>

            <?php if( have_posts() ) : ?>
                
                <div class="spek_looping">
                    <?php while( have_posts() ) : the_post(); ?>
                        <article class="spek_article">
                            <a href="<?php the_permalink(); ?>" class="spek_thum_uri">
                                <?php if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'full', array(
                                        'class'         =>  'spek_thum_img',
                                        'loading'       =>  'lazy'
                                    ) );
                                } ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="spek_uris">
                                <?php the_title('<h3 class="spek_uri_title">', '</h3>') ?>
                            </a>
                            <span class="spek_price">
                                <?php $harga = get_post_meta( get_the_ID(), 'harga', true );
                                echo $harga; ?>
                            </span>
                        </article>
                    <?php endwhile; ?>
                </div>

            <?php endif; ?>
            <div class="silo_paginate">
                <?php echo paginate_links( array(
                    'mid_size' => 2
                )); ?>
            </div>
        </div>
            
        <?php get_template_part( 'views/aside/spek', 'home' ); ?>
        
    </div>
</div>

<?php get_footer(); ?>