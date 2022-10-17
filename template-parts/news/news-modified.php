<?php

$sub_category = get_categories( [
	'taxonomy'     => 'category',
	'type'         => 'post',
	'child_of'     => 0,
	'parent'       => '4',
	'orderby'      => 'term_id',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'pad_counts'   => false,
] );

$parent_category = get_categories( [
	'taxonomy'     => 'category',
	'type'         => 'post',
	'child_of'     => 0,
	'parent'       => '',
	'orderby'      => 'term_id',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'pad_counts'   => false,
] );


?>
<div class="categories-wrapper category-news">
	<?php foreach ( $parent_category as $title ): ?>
		<?php if ( $title->term_id == 4 ): ?>
            <h2 class="category-news-title"><?php echo $title->name ?></h2>
		<?php endif; ?>
	<?php endforeach; ?>
    <div class="row">
		<?php foreach ( $sub_category as $category ): ?>
			<?php $category_link = get_category_link( $category->term_id ); ?>
            <div class="col-md-6 col-style">
                <div class="categories">
					<?php if ( $category->parent == 4 ): ?>
                        <div class="categories-news-title">
                            <a class="categories-news-title__link" href="<?php echo $category_link ?>">
								<?php echo $category->name ?>
                            </a>
                        </div>
						<?php

						$args = [
							'cat'            => $category->term_id,
							'posts_per_page' => 4,
						];

						$query = new WP_Query( $args );

						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post(); ?>
								<?php if ( get_field( 'primary' ) == $category->term_id ): ?>
                                    <div class="categories-title-list news-list">
                                        <div class="news-post">
                                            <div class="news-post-inner">
                                                <div class="news-post-inner__img"
                                                     style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID ); ?>) no-repeat center center;background-size: cover; border-radius: 5px;">
                                                </div>
                                                <div class="news-post-inner__title">
                                                    <a class="news-post-inner__link"
                                                       href="<?php the_permalink(); ?>">
														<?php echo the_title(); ?>
                                                    </a>
                                                    <div class="post-time">
														<?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago' ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php endif; ?>
							<?php }
							wp_reset_postdata();
						} else {
							echo 'Not posts';
						}
						?>
					<?php endif; ?>
                </div>
                <div class="more">
                    <a class="more__link" href="<?php echo $category_link ?>">
                        <img class="more__img"
                             src="<?php echo get_template_directory_uri() . '/assets/img/slice.svg' ?>"
                             alt="">
                        More about <?php echo $category->name; ?>
                    </a>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>