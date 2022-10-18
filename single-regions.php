<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="single-country py-3">
                <h1 class="single-country__title"><?php the_title(); ?></h1>
                <h2 class="single-country__region">Conutries:</h2>
				<?php
				$countries = get_posts( array(
					'post_type'  => 'countries',
					'meta_query' => array(
						array(
							'key'     => 'region',
							'value'   => '"' . get_the_ID() . '"',
							'compare' => 'LIKE'
						)
					)
				) );
				?>
                <div class="row">
					<?php if ( $countries ): ?>
						<?php foreach ( $countries as $country ): ?>

                            <div class="col-md-4">
                                <a class="country-link" href="<?php echo get_permalink( $country->ID ); ?>">
                                    <div class="country">
                                        <div class="country-img"
                                             style="background: url(<?php
										     echo get_the_post_thumbnail_url( $country->ID );
										     ?>) center center no-repeat;background-size: cover;">
                                        </div>
                                        <div class="country-name">
											<?php echo get_the_title( $country->ID ); ?>
                                        </div>
                                    </div>
                                </a>
                            </div>


						<?php endforeach; ?>
					<?php endif; ?>
                </div>

            </div>
        </div>
        <div class="col-md-4">
	        <?php get_template_part( 'template-parts/sidebars/sidebar', 'index' ) ?>
        </div>
    </div>


<?php endwhile; ?>

<?php get_footer(); ?>