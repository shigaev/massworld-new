<?php
if ( is_archive() ) :
	get_header( 'archive' );
else :
	get_header();
endif;
?>
<?php //get_template_part( 'template-parts/news/news', 'featured' ) ?>
    <div class="row">
        <div class="col-md-9 py-3">
            <nav aria-label="breadcrumb">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}
				?>
            </nav>
            <section class="content-wrap">
                <h2 class="title"><?php the_archive_title(); ?></h2>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="news">
                        <div class="news-date"><?php the_time( "d M Y" ); ?></div>
                        <div class="news-content">
                            <a href="<?php the_permalink(); ?>">
                                <div class="news-img"
                                     style="background: url(<?php

								     if ( has_post_thumbnail() ) {
									     echo get_the_post_thumbnail_url( $post->ID );
								     } else {
									     echo get_template_directory_uri() . '/assets/img/no_image.png';
								     }


								     ?>) center center no-repeat;);
                                             background-size: cover;
                                             border-radius: 5px;
                                             ">
                                </div>

                            </a>
                            <div>
                                <h2 class="news-title">
                                    <a href="<?php the_permalink(); ?>">
										<?php the_title() ?>
                                    </a>
                                </h2>
								<?php
								$content         = get_the_content();
								$trimmed_content = wp_trim_words( $content, 20, '...' );
								?>
                                <p class='news-excerpt'>
                                    <a href="<?php the_permalink(); ?>">
										<?php echo $trimmed_content ?>
                                    </a>
                                </p>

                                <div class="post-time">
									<?php echo human_time_diff( get_post_time( 'U', true, $post->ID, false ), current_time( 'timestamp' ) ) . ' ago' ?>
                                </div>
                                <div class="news-date mobile"><?php the_time( "d M Y" ); ?></div>
                            </div>
                        </div>
                    </article>
				<?php endwhile; ?>
					<?php
					$args = array(
						'show_all'           => false,
						'end_size'           => 1,
						'mid_size'           => 1,
						'prev_next'          => true,
						'prev_text'          => __( '<' ),
						'next_text'          => __( '>' ),
						'add_args'           => false,
						'add_fragment'       => '',
						'screen_reader_text' => __( 'Posts navigation' ),
						'class'              => 'pagination',
					);
					the_posts_pagination( $args ); ?>
				<?php else: ?>
                    <p>There is no news here yet</p>
				<?php endif; ?>
            </section>
        </div>
        <div class="col-md-3">
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'index' ) ?>
        </div>
    </div>
<?php get_footer() ?>