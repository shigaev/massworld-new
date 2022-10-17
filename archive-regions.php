<?php get_header(); ?>
    <section id="primary">
        <div id="content" role="main">

			<?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title">Doctors</h1>
                </header>

				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

                    <article>
                        <header class="entry-header">
							<?php

							$photo = get_field( 'photo' );

							?>
                            <h1 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="alignleft" src="<?php //echo $photo['url']; ?>"
                                         alt="<?php //echo $photo['alt']; ?>" width="50"/>
									<?php the_title(); ?>
                                </a>
                            </h1>
                        </header>
                    </article>

				<?php endwhile; ?>

				<?php //twentyeleven_content_nav( 'nav-below' ); ?>

			<?php endif; ?>

        </div><!-- #content -->
    </section><!-- #primary -->
<?php get_footer(); ?>