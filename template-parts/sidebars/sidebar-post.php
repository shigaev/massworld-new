<div class="right-sidebar">
    <h2 class="right-sidebar-single-post__title">Related country:</h2>
	<?php $news = get_field( 'country_news' ); ?>
	<?php foreach ( $news as $item ): ?>

        <a href="<?php echo $item->guid ?>">
            <div class="right-sidebar__entity">
				<?php if ( has_post_thumbnail() ): ?>
                    <div class="entity-img"
                         style="background: url(<?php
					     echo get_the_post_thumbnail_url( $item->ID );
					     ?>) center center no-repeat;background-size: cover;"></div>
				<?php else: ?>
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/no_image.png'; ?>" alt="">
				<?php endif; ?>

                <p><?php echo $item->post_title ?></p>
            </div>
        </a>

	<?php endforeach; ?>

    <h2 class="right-sidebar-single-post__title">Related</h2>
	<?php the_tags( '<ul class="tags"><li class="tags__item">', '</li><li class="tags__item">', '</li></ul>' ); ?>
</div>
