<?php get_header() ?>
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; else : ?>
                        <p>Постов нет.</p>
					<?php endif; ?>
                </div>
                <div class="col-md-3">
					<?php get_template_part( 'template-parts/sidebars/sidebar', 'index' ) ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>