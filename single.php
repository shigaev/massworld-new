<?php get_header() ?>
<?php //get_template_part( 'template-parts/news/news', 'featured' ) ?>
    <div class="single-post">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 py-3">
                <div class="post-paragraph">
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<span id="breadcrumbs">', '</p>' );
					}
					?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <div class="date-author">
                            <span class="date-author__item">Date:</span> <span
                                    class="date-author__self"><?php the_time( "d M Y" ); ?></span>
                            <span class="date-author__item">Author:</span> <span
                                    class="date-author__self"><?php the_author(); ?></span>
                        </div>

						<?php

						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else {
							echo "<img src='" . get_template_directory_uri() . '/assets/img/no_image.png' . "'>";
						}
						?>
						<?php the_content(); ?>
					<?php endwhile; else : ?>
                        <p>Постов нет.</p>
					<?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
				<?php get_template_part( 'template-parts/sidebars/sidebar', 'post' ) ?>
                <hr>
				<?php
				/*				$countries = get_posts( array(
									'post_type'  => 'countries',
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
								*/ ?><!--

				<?php /*foreach ( $countries as $country ): */ ?>
                    <a href="<?php /*echo $country->guid; */ ?>">
						<?php /*echo $country->post_name; */ ?>
                    </a>
				--><?php /*endforeach; */ ?>


            </div>
        </div>
    </div>
    <!-- TAXONOMY -->
<?php
$args = [
	'taxonomy'               => [ 'featured' ],
	'orderby'                => 'id',
	'order'                  => 'ASC',
	'hide_empty'             => true,
	'object_ids'             => null,
	'include'                => array(),
	'exclude'                => array(),
	'exclude_tree'           => array(),
	'number'                 => '',
	'fields'                 => 'all',
	'count'                  => false,
	'slug'                   => '',
	'parent'                 => '',
	'hierarchical'           => true,
	'child_of'               => 0,
	'get'                    => '',
	'name__like'             => '',
	'pad_counts'             => false,
	'offset'                 => '',
	'search'                 => '',
	'cache_domain'           => 'core',
	'name'                   => '',
	'childless'              => false,
	'update_term_meta_cache' => true,
	'meta_query'             => '',
];

$terms = get_terms( $args );

/*$post_category = get_the_category( $post->ID );

$refer = $_SERVER['HTTP_REFERER'];

$url = ( ( ! empty( $_SERVER['HTTPS'] ) ) ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . '/';

$rewrite_refer = str_replace( $url . '/category/', '', $_SERVER['HTTP_REFERER'] );

foreach ( $post_category as $category ) {
	$search = str_contains( $rewrite_refer, $category->slug );

	if ( $search == true ) {
		$link      = get_category_link( $category->term_id );
		$separator = ' / ';
		echo '<a href="' . $link . '">' . $category->slug . $separator . '</a>';
	}
}

if ($rewrite_refer == $url) {
	echo 'Home / ';
}*/

?>
    <!-- /.TAXONOMY -->

<?php get_footer() ?>