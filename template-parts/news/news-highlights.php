<?php

$args = [
	'category_name'  => 'highlights',
	'posts_per_page' => 1,
	'order'          => 'DESC'
];

$highlights          = query_posts( $args );
$current_category_id = get_cat_ID( 'highlights' );

?>
<section class="top-news">
    <h2 class="top-news__title"><?php echo get_category( $current_category_id )->name; ?></h2>
    <section class="top-news-upper">
        <div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-12 col-md-12">
                    <a href="<?php the_permalink(); ?>" class="upper-news">
                        <article class="upper-news__article">
                            <div class="upper-news__img"
                                 style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID ); ?>) center center no-repeat;);
                                         background-size: cover;
                                         border-radius: 5px;">
                            </div>
                            <div class="upper-news__text">
                                <h2 class="upper-news__title"><?php the_title() ?></h2>
                                <div class="excerpt">
									<?php the_excerpt(); ?>
                                </div>
                                <div class="post-time">
									<?php echo human_time_diff( get_post_time( 'U', true, $post->ID, false ), current_time( 'timestamp' ) ) . ' ago' ?>
                                </div>
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
        <div class="row">
			<?php
			$post_not_inn = [];

			foreach ( $highlights as $post ) {
				$post_not_inn[] = $post->ID;
			}

			$query = new WP_Query( [
				'category_name'  => 'highlights',
				'posts_per_page' => 2,
				'post__not_in'   => $post_not_inn
			] );
			?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-6">
                    <a href="<?php the_permalink(); ?>" class="lower-news">
                        <article class="lower-news__article">
                            <div class="lower-news__img"
                                 style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ?>) no-repeat center center; background-size: cover; border-radius: 5px">
                            </div>
                            <div class="lower-news__text">
                                <div class="lower-news__title">
									<?php the_title() ?>
                                </div>
                                <div class="post-time">
									<?php echo human_time_diff( get_post_time( 'U', true, $post->ID, false ), current_time( 'timestamp' ) ) . ' ago' ?>
                                </div>
                            </div>
                        </article>
                    </a>
                </div>
			<?php endwhile; else : ?>
			<?php endif; ?>
        </div>
    </section>
</section>