<?php get_header(); ?>

    <div class="py-3">
        <div class="row">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

                    <div class="col-md-3 my-2">
                        <a class="main-country region" href="<?php the_permalink(); ?>">
                            <h2 class="main-country__title"><?php the_title(); ?></h2>
                        </a>
                    </div>

				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>


<?php get_footer(); ?>