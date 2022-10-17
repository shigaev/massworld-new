<?php

/*$result = wp_get_recent_posts( [
	'numberposts'      => 10,
	'offset'           => 0,
	'category'         => 0,
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
foreach ( $result as $post ) {
	setup_postdata( $post );
	the_title();
}*/

$args = array(
	'numberposts' => 10,
	'post_status' => 'publish',
	'post_type'   => 'post',
);

$posts = wp_get_recent_posts( $args );

//var_dump($posts);
?>
    <div class="right-sidebar">
        <h2 class="right-sidebar__title">Recent updates</h2>
		<?php foreach ( $posts as $post ): ?>
            <p class="right-sidebar__text">
                <a class="right-sidebar__link"
                   href="<?php echo get_permalink($post['ID']); /*echo $post['post_name']*/ ?>"><?php echo $post['post_title']; ?></a>
            </p>
		<?php endforeach; ?>
    </div>
<?php wp_reset_postdata(); ?>