<?php

$items       = wp_get_nav_menu_items( 'Main header menu' );
$menu_obj    = wp_get_nav_menu_object( 'Main header menu' );
$menu_obj_id = $menu_obj->term_id;

$categories = get_categories( [
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

<?php if ( $categories ): ?>
    <div class="categories-wrapper category-news">
		<?php foreach ( $categories as $title ): ?>
			<?php if ( $title->term_id == 4 ): ?>
                <h2 class="category-news-title"><?php echo $title->name ?></h2>
			<?php endif; ?>
		<?php endforeach; ?>
        <div class="row">
			<?php

			foreach ( $categories as $key => $category ): ?>
				<?php $category_visible = get_field( 'category_visible', get_term( $category->term_id ) ); ?>
				<?php if ( $category->parent == 4 && $category_visible == 'Show' ): ?>
					<?php

					$category_link = get_category_link( $category->term_id );

					$category_posts = get_posts( array(
						'numberposts'      => 4,
						'category'         => $category->term_id,
						'orderby'          => 'date',
						'order'            => 'DESC',
						'include'          => array(),
						'exclude'          => array(),
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post',
						'suppress_filters' => true,
					) );

					foreach ( $category_posts as $item ) {
						setup_postdata( $item );
					}

					?>
                    <div class="col-lg-6 col-style">
                        <div class="categories">
							<?php

							$result = wp_get_recent_posts( [
								'numberposts'      => 1,
								'offset'           => 0,
								'category'         => $category->term_id,
								'orderby'          => 'post_date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post',
								'post_status'      => 'draft, publish, future, pending, private',
								'suppress_filters' => true,
							], OBJECT );
							foreach ( $result as $recent_entries ) {
								setup_postdata( $recent_entries );
							}

							wp_reset_postdata();
							?>
                            <div class="categories-news-title">
                                <a class="categories-news-title__link" href="<?php echo $category_link ?>">
									<?php echo $category->name ?>
                                </a>
                            </div>
                            <div class="categories-content">
                                <div class="categories__img"
                                     style="background: url(<?php echo get_the_post_thumbnail_url( $recent_entries->ID ); ?>) center center no-repeat;
                                             background-size: cover;
                                             border-radius: 5px;"
                                >
                                </div>
                                <div class="categories__text categories-title">
                                    <a class="categories-title__link" href="<?php echo $recent_entries->post_name ?>">
										<?php echo $recent_entries->post_title; ?>
                                    </a>
                                    <div class="post-time">
										<?php echo human_time_diff( get_post_time( 'U', true, $recent_entries->ID, false ), current_time( 'timestamp' ) ) . ' ago' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="categories-title-list news-list">
								<?php foreach ( $category_posts as $post ): ?>
									<?php if ( $recent_entries->ID !== $post->ID ): ?>
                                        <div class="news-post">
                                            <div class="news-post-inner">
                                                <div class="news-post-inner__img"
                                                     style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID ); ?>) no-repeat center center;background-size: cover; border-radius: 5px;">
                                                </div>
                                                <div class="news-post-inner__title">
                                                    <a class="news-post-inner__link"
                                                       href="<?php echo $post->post_name ?>">
														<?php echo $post->post_title; ?>
                                                    </a>
                                                    <div class="post-time">
		                                                <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago' ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
									<?php endif; ?>
								<?php endforeach; ?>
                            </div>
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
				<?php endif; ?>
			<?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>