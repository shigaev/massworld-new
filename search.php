<?php get_header() ?>
    <div class="container py-3">
		<?php if ( have_posts() ): ?>
            <div class="search-result">
                <p>
		            <?php
		            printf( esc_html__( 'Search result for %s: ', 'law' ), "<span style='color: #a6a6a6;'>" . get_search_query() . "</span>" );
		            ?>
                </p>
            </div>
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="card search-box mb-3">
                    <a class="search-box-link" href="<?php the_permalink(); ?>">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="search-box__img"
                                     style="background: url(<?php
								     echo get_the_post_thumbnail_url( $post->ID )
								     ?>) no-repeat center center;background-size: cover;"></div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body search-box__body">
                                    <h5 class="card-title search-box__title"><?php the_title() ?></h5>
                                    <p class="card-text">
                                        <small class="text-muted post-time">
											<?php echo human_time_diff( get_post_time( 'U', true, $post->ID, false ), current_time( 'timestamp' ) ) . ' ago' ?>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
			<?php endwhile; ?>
		<?php else: ?>
            <p><?php _e( 'Not found', 'law' ); ?></p>
		<?php endif; ?>
    </div>
<?php get_footer() ?>