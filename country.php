<?php

/**
 * Template Name: Country
 */
?>

<?php get_header(); ?>

<?php

$args = [
	'taxonomy'               => [ 'country' ], // название таксономии с WP 4.5
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
	'get'                    => '', // ставим all чтобы получить все термины
	'name__like'             => '',
	'pad_counts'             => false,
	'offset'                 => '',
	'search'                 => '',
	'cache_domain'           => 'core',
	'name'                   => '',    // str/arr поле name для получения термина по нему. C 4.2.
	'childless'              => false, // true не получит (пропустит) термины у которых есть дочерние термины. C 4.2.
	'update_term_meta_cache' => true, // подгружать метаданные в кэш
	'meta_query'             => '',
];

$terms = get_terms( $args );

?>
    <div class="countries py-3">
		<?php foreach ( $terms as $term ): ?>
			<?php $category_link = get_category_link( $term->term_id ); ?>
            <a href="<?php echo $category_link ?>">
                <div class="country"
                     style="background: url(<?php
				     echo $image = get_field( 'image', get_term( $term->term_id ) );
				     ?>) center center no-repeat; background-size: cover;">
                </div>
            </a>
		<?php endforeach; ?>
    </div>


<?php get_footer(); ?>