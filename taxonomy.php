<?php get_header() ?>
<?php //get_template_part( 'template-parts/news/news', 'featured' ) ?>
    <div class="row">
        <div class="col-md-9">
	        <?php
	        if ( function_exists( 'yoast_breadcrumb' ) ) {
		        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	        }
	        ?>
            <section class="featured-posts">

                <h2><?php single_cat_title() ?></h2>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="post">
                        <div class="post-date"><?php the_time( "d M Y" ); ?></div>
                        <div class="post-content">
                            <div class="post-img"
                                 style="background: url(<?php
							     if ( has_post_thumbnail() ) {
								     echo get_the_post_thumbnail_url( $post->ID, 'medium_large' );
							     } else {
								     echo get_template_directory_uri() . '/assets/img/no_image_2.png';
							     }
							     ?>) center center no-repeat;background-size: cover;">
                            </div>
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                            </h2>
                        </div>
                    </article>
				<?php endwhile; else : ?>
                    <p>No posts.</p>
				<?php endif; ?>
            </section>
        </div>
        <div class="col-md-3">
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'index' ) ?>
        </div>
    </div>
<?php get_footer() ?>