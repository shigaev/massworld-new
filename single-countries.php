<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="single-country py-3">
                <h1 class="single-country__title"><?php the_title(); ?></h1>
                <div class="single-country__image"><?php the_post_thumbnail(); ?></div>
                <h2 class="single-country__region">Regions:</h2>
				<?php $locations = get_field( 'region' ); ?>
				<?php if ( $locations ): ?>
                    <ul>
						<?php foreach ( $locations as $location ): ?>
                            <li>
                                <a href="<?php echo get_permalink( $location->ID ); ?>">
									<?php echo get_the_title( $location->ID ); ?>
                                </a>
                            </li>
						<?php endforeach; ?>
                    </ul>
				<?php endif; ?>
            </div>
            <div class="related-news">
                <h2>Related news:</h2>
				<?php
				$countries = get_posts( array(
					'post_type'  => 'post',
					'meta_query' => array(
						array(
							'key'     => 'country_news',
							// name of custom field
							'value'   => '"' . get_the_ID() . '"',
							// matches exactly "123", not just 123. This prevents a match for "1234"
							'compare' => 'LIKE'
						)
					)
				) );
				?>
				<?php if ( ! empty( $countries ) ): ?>
					<?php foreach ( $countries as $country ): ?>
                        <div class="content-wrap">
                            <article class="news">
                                <div class="news-date"><?php echo get_the_date( 'd M Y', $country->ID ); ?></div>
                                <div class="news-content">
                                    <a href="<?php echo $country->post_name; ?>">
                                        <div class="news-img"
                                             style="background: url(<?php

										     if ( has_post_thumbnail() ) {
											     echo get_the_post_thumbnail_url( $country->ID );
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
                                            <a href="<?php echo $country->post_name; ?>">
												<?php echo $country->post_title; ?>
                                            </a>
                                        </h2>
										<?php
										$content         = $country->post_content;
										$trimmed_content = wp_trim_words( $content, 20, '...' );
										?>
                                        <p class='news-excerpt'>
                                            <a href="<?php echo $country->post_name; ?>">
												<?php echo $trimmed_content ?>
                                            </a>
                                        </p>
                                        <div class="post-time">
											<?php echo human_time_diff( get_post_time( 'U', true, $country->ID, false ), current_time( 'timestamp' ) ) . ' ago' ?>
                                        </div>
                                        <div class="news-date mobile"><?php the_time( "d M Y" ); ?></div>
                                    </div>
                                </div>
                            </article>
                        </div>
					<?php endforeach; ?>
				<?php else: ?>
                    Not found.
				<?php endif; ?>
            </div>
        </div>
        <div class="col-md-4">
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'index' ) ?>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>