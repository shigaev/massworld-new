<?php

$args = [
	'taxonomy'               => [ 'category' ],
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

?>

<div class="categories-wrapper">
    <div class="row">
		<?php foreach ( $terms as $category ): ?>
			<?php
			$category_visible = get_field( 'category_visible', get_term( $category->term_id ) );
			$category_link    = get_term_link( $category, $taxonomy = $category->taxonomy );

			$sub_category = get_terms( [
				'taxonomy'   => $category->taxonomy,
				'parent'     => $category->term_id,
				'hide_empty' => false,
			] );

			?>
			<?php if ( $category->slug !== 'uncategorized' && $category_visible == 'Show' && $category->parent == 0 ): ?>
                <div class="col-md-4">
                    <div class="categories">
                        <h2 class="categories-title">
                            <a href="<?php echo $category_link ?>">
								<?php echo $category->name ?>
                            </a>
                        </h2>
                        <div class="categories-content">
                            <div class="categories__img"
                                 style="background: url(<?php echo get_field( 'category_image', get_term( $category->term_id ) ) ?>) center center no-repeat;background-size: cover">
                            </div>
                            <div class="categories__text">
								<?php echo mb_strimwidth( $category->description, 0, 40, "..." ); ?>
                            </div>
                        </div>
                        <div class="categories-title-list">
                            <ul>
								<?php if ( ! empty( $sub_category ) ): ?>
									<?php foreach ( $sub_category as $item ): ?>
										<?php $sub_category_visible = get_field( 'category_visible', get_term( $item->term_id ) ); ?>
										<?php if ( $sub_category_visible == 'Show' ): ?>
                                            <li><a href=""><?php echo $item->name ?></a></li>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
			<?php endif; ?>
		<?php endforeach; ?>
    </div>
</div>