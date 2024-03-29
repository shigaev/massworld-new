<?php get_header(); ?>
<?php
$args = [
	'post_type' => 'countries',
	'order'     => 'ASC',
	'orderby'   => 'title'
];

query_posts( $args );
?>
    <div class="py-3">
        <div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-md-3 my-2">
                    <a class="main-country" href="<?php the_permalink(); ?>">
                        <span class="main-country__item"
                              style="background: url(
                              <?php
                              if ( has_post_thumbnail() ) {
	                              echo get_the_post_thumbnail_url( $post->ID );
                              } else {
	                              echo get_template_directory_uri() . '/assets/img/not-image.png';
                              }
                              ?>) center center no-repeat;background-size: cover;"></span>
                        <h2 class="main-country__title"><?php the_title(); ?></h2>
                    </a>
                </div>
			<?php endwhile; else: ?>
                <p>No posts.</p>
			<?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>