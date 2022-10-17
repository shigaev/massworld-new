<?php
$highlights = new WP_Query( array(
	'post_type'      => 'highlights',
	'posts_per_page' => 2
) );

$post_type = ucfirst( $highlights->query['post_type'] );

?>
<section class="top-news">
    <h2 class="top-news__title"><?php echo $post_type; ?></h2>
    <section class="top-news-upper">
        <div class="row">
			<?php
			if ( $highlights->have_posts() ) : while ( $highlights->have_posts() ) : $highlights->the_post(); ?>
                <div class="col-lg-6 col-md-12">
                    <a href="<?php the_permalink(); ?>" class="upper-news">
                        <article class="upper-news__article">
                            <div class="upper-news__img">
								<?php the_post_thumbnail(); ?>
                            </div>
                            <div class="upper-news__text">
                                <h2 class="upper-news__title"><?php the_title() ?></h2>
								<?php the_excerpt(); ?>
                            </div>
                        </article>
                    </a>
                </div>

			<?php endwhile; else : ?>
                <p>No posts.</p>
			<?php endif; ?>

        </div>
    </section>
    <section class="top-news-lower">
        <div class="row align-items-center">
			<?php

			$post_not_inn = [];

			foreach ( $highlights->posts as $post ) {
				array_push( $post_not_inn, $post->ID );
			}

			$top_news_bottom = new WP_Query( array(
				'post_type'      => 'highlights',
				'posts_per_page' => 3,
				'post__not_in'   => $post_not_inn
			) );

			?>
			<?php if ( $top_news_bottom->have_posts() ) : while ( $top_news_bottom->have_posts() ) : $top_news_bottom->the_post(); ?>
                <div class="col-lg-4">
                    <a href="<?php the_permalink(); ?>" class="lower-news">
                        <article class="lower-news__article">
                            <div class="lower-news__img"
                                 style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ?>) no-repeat center center; background-size: cover">
                            </div>
                            <div class="lower-news__text">
								<?php the_excerpt(); ?>
                            </div>
                        </article>
                    </a>
                </div>
			<?php endwhile; else : ?>
			<?php endif; ?>
        </div>
    </section>
</section>