<div class="right-sidebar">
    <h2 class="right-sidebar-single-post__title">Related:</h2>
    <div class="right-sidebar__countries">
		<?php $news = get_field( 'country_news' ); ?>
		<?php if ( isset( $news ) && ! empty( $news ) ) : ?>
			<?php foreach ( $news as $item ): ?>
                <a href="<?php echo $item->guid ?>">
                    <div class="right-sidebar__entity">
                        <div class="entity-img"
                             style="background: url(
						     <?php
						     if ( get_the_post_thumbnail_url( $item->ID ) !== false ) {
							     echo get_the_post_thumbnail_url( $item->ID );
						     } else {
							     echo get_template_directory_uri() . '/assets/img/not-image.png';
						     }
						     ?>) center center no-repeat;background-size: cover;"></div>
                        <p><?php echo $item->post_title ?></p>
                    </div>
                </a>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>
	<?php the_tags( '<ul class="tags"><li class="tags__item">', '</li><li class="tags__item">', '</li></ul>' ); ?>
</div>