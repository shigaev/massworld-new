<?php get_header(); ?>
    <div id="primary">
        <div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

                <article>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <h2>Region</h2>
                        <p><?php the_field( 'region' ); ?></p>

                        <h2>Conutries:</h2>
						<?php

						/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
						*/

						$doctors = get_posts( array(
							'post_type'  => 'countries',
							'meta_query' => array(
								array(
									'key'     => 'region',
									// name of custom field
									'value'   => '"' . get_the_ID() . '"',
									// matches exactly "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						) );

						?>
						<?php if ( $doctors ): ?>
                            <ul>
								<?php foreach ( $doctors as $doctor ): ?>
									<?php

									$photo = get_field( 'photo', $doctor->ID );

									?>
                                    <li>
                                        <a href="<?php echo get_permalink( $doctor->ID ); ?>">
                                            <img src="<?php //echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>"
                                                 width="30"/>
											<?php echo get_the_title( $doctor->ID ); ?>
                                        </a>
                                    </li>
								<?php endforeach; ?>
                            </ul>
						<?php endif; ?>

                    </div>

                </article>

			<?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>