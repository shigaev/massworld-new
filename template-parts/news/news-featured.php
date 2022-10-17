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

$terms        = get_terms( $args );
$visibleTerms = 4;

?>

<div class="featured">
    <div class="row">
		<?php
		$i        = 0;
		$newTerms = array_combine( range( 1, count( $terms ) ), $terms );
		foreach ( $newTerms as $key => $term ) : ?>
			<?php if ( $i ++ == $visibleTerms ) {
				break;
			} ?>
            <div class="col-md-3">
                <a class="featured-news"
                   href="<?php echo get_term_link( $term->term_id, $taxonomy = $term->taxonomy ); ?>">
                    <h2 class="featured-news__title"><?= $term->name ?></h2>
                    <div class="featured-news__content">
                        <div class="featured-news__img"
                             style="background: url(<?php echo get_field( 'image', get_term( $term->term_id ) ); ?>) center center no-repeat;background-size: cover;border-radius: 5px;"></div>
                        <p class="featured-news__text">
							<?= $term->description ?>
                        </p>
                    </div>
                </a>
            </div>
		<?php endforeach; ?>
    </div>
</div>