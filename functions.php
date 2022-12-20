<?php

require __DIR__ . '/console/debuger.php';
require __DIR__ . '/classes/Massworld_Menu.php';

if ( ! function_exists( 'massworld_setup' ) ) :
	function massworld_setup() {
		register_nav_menus( [
			'header_menu' => 'Menu in header',
			'footer_menu' => 'Menu in footer'
		] );
		add_theme_support( 'post-thumbnails' );

		$logo = array(
			'height'               => 50,
			'width'                => 120,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => false,
		);

		add_theme_support( 'custom-logo', $logo );
	}
endif;

function getScriptHash( $path ) {
	$dir    = get_template_directory() . $path;
	$search = glob( $dir . '*', GLOB_NOSORT | GLOB_ERR );

	foreach ( $search as $file ) {
		$arr = preg_replace( '/\\\\+/', '/', $file );
	}

	$url = ( ( ! empty( $_SERVER['HTTPS'] ) ) ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
	$url = explode( '?', $url );
	$url = $url[0];

	$lengthStr = strpos( $arr, $_SERVER['HTTP_HOST'] ) + strlen( $_SERVER['HTTP_HOST'] );

	$res = substr( $arr, $lengthStr );
	$scr = $url . $res;

	return $scr;
}

function add_massworld_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', '', '', true );
}

function remove_version_info() {
	return '';
}

function massworld_copyright() {
	echo '<p class="copyright">' . ' &#169 ' . date( ' Y ' ) . get_bloginfo() . '. ' . 'All rights reserved.';
}

function remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}

// --- FILTERS ---
add_filter( 'get_the_archive_title', function ( $title ) {
	return preg_replace( '~^[^:]+: ~', '', $title );
} );
add_filter( 'the_generator', 'remove_version_info' );
add_filter( 'style_loader_src', 'remove_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'remove_ver_css_js', 9999 );
add_filter( 'excerpt_length', function () {
	return 30;
} );
add_filter( 'excerpt_more', function ( $more ) {
	return '...';
} );
// --- ACTIONS ---
add_action( 'after_setup_theme', 'massworld_setup' );
add_action( 'wp_enqueue_scripts', 'add_massworld_scripts' );
add_action( 'init', function () {
	/*register_taxonomy( 'featured', [ 'post', 'top_news', 'highlights' ], [
		'label'              => '',
		'labels'             => [
			'name'              => 'Featured',
			'singular_name'     => 'Featured',
			'search_items'      => 'Search Featured',
			'all_items'         => 'All Featured',
			'view_item '        => 'View Featured',
			'parent_item'       => 'Parent Featured',
			'parent_item_colon' => 'Parent Featured:',
			'edit_item'         => 'Edit Featured',
			'update_item'       => 'Update Featured',
			'add_new_item'      => 'Add New Featured',
			'new_item_name'     => 'New Featured Name',
			'menu_name'         => 'Featured',
			'back_to_items'     => '← Back to Featured',
		],
		'description'        => '',
		// description taxonomy
		'public'             => true,
		'publicly_queryable' => true,
		'show_in_nav_menus'  => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_tagcloud'      => true,
		'show_in_quick_edit' => true,
		'hierarchical'       => true,
		'rewrite'            => true,
		//'query_var'             => $taxonomy,
		'capabilities'       => array(),
		'meta_box_cb'        => null,
		// html metabox. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'  => true,
		'show_in_rest'       => true,
		'rest_base'          => null,
		// $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );*/
	/*register_post_type( 'top_news', [
		'label'              => null,
		'labels'             => [
			'name'               => 'Top news',
			'singular_name'      => 'Top news',
			'add_new'            => 'Add top-news',
			'add_new_item'       => 'Adding top-news',
			'edit_item'          => 'Editing top-news',
			'new_item'           => 'New top-news',
			'view_item'          => 'See the top-news',
			'search_items'       => 'Search for top news',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in the trash',
			'parent_item_colon'  => 'Top news',
			'menu_name'          => 'Top news',
			'all_items'          => 'All top news',
		],
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		// 'exclude_from_search' => null,
		'show_ui'            => true,
		'show_in_nav_menus'  => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => false,
//		'rest_base'         => null,
		// $post_type. C WP 4.7
		'menu_position'      => 2,
		'menu_icon'          => 'dashicons-align-right',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post',
		//'map_meta_cap'      => null,
		'hierarchical'       => false,
		'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'         => [ 'category', 'featured' ],
		'has_archive'        => true,
		'rewrite'            => true,
		'query_var'          => true,
	] );*/
	/*register_post_type( 'highlights', [
		'label'              => null,
		'labels'             => [
			'name'               => 'Highlights',
			'singular_name'      => 'Highlights',
			'add_new'            => 'Add highlights',
			'add_new_item'       => 'Adding highlights',
			'edit_item'          => 'Editing highlights',
			'new_item'           => 'New highlights',
			'view_item'          => 'See the highlights',
			'search_items'       => 'Search for highlights',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in the trash',
			'parent_item_colon'  => 'Highlights',
			'menu_name'          => 'Highlights',
			'all_items'          => 'All highlights',
		],
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		// 'exclude_from_search' => null,
		'show_ui'            => true,
		'show_in_nav_menus'  => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => false,
//		'rest_base'         => null,
		// $post_type. C WP 4.7
		'menu_position'      => 2,
		'menu_icon'          => 'dashicons-superhero-alt',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post',
		//'map_meta_cap'      => null,
		'hierarchical'       => false,
		'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'         => [ 'category', 'featured' ],
		'has_archive'        => true,
		'rewrite'            => true,
		'query_var'          => true,
	] );*/
	/*register_taxonomy( 'country', [ 'post' ], [
		'label'        => '',
		// определяется параметром $labels->name
		'labels'       => [
			'name'              => 'Countries',
			'singular_name'     => 'Country',
			'search_items'      => 'Search Country',
			'all_items'         => 'All Countries',
			'view_item '        => 'View Country',
			'parent_item'       => 'Parent Country',
			'parent_item_colon' => 'Parent Country:',
			'edit_item'         => 'Edit Country',
			'update_item'       => 'Update Country',
			'add_new_item'      => 'Add New Country',
			'new_item_name'     => 'New Country Name',
			'menu_name'         => 'Country',
			'back_to_items'     => '← Back to Country',
		],
		'description'  => '',
		// описание таксономии
		'public'       => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical' => true,

		'rewrite'           => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		// html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column' => false,
		// авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'      => true,
		// добавить в REST API
		'rest_base'         => null,
		// $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );*/
	/*register_taxonomy( 'region', [ 'post' ], [
		'label'        => '',
		// определяется параметром $labels->name
		'labels'       => [
			'name'              => 'Regions',
			'singular_name'     => 'Region',
			'search_items'      => 'Search Region',
			'all_items'         => 'All Regions',
			'view_item '        => 'View Region',
			'parent_item'       => 'Parent Region',
			'parent_item_colon' => 'Parent Region:',
			'edit_item'         => 'Edit Region',
			'update_item'       => 'Update Region',
			'add_new_item'      => 'Add New Region',
			'new_item_name'     => 'New Region Name',
			'menu_name'         => 'Region',
			'back_to_items'     => '← Back to Region',
		],
		'description'  => '',
		// описание таксономии
		'public'       => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical' => false,

		'rewrite'           => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		// html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column' => false,
		// авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'      => null,
		// добавить в REST API
		'rest_base'         => null,
		// $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );*/

	/**
	 * Test post_type
	 */
	register_post_type( 'countries', [
		'label'               => null,
		'labels'              => [
			'name'               => 'All countries',
			'singular_name'      => 'Country',
			'add_new'            => 'Add country',
			'add_new_item'       => 'Adding country',
			'edit_item'          => 'Editing countries',
			'new_item'           => 'New country',
			'view_item'          => 'View country',
			'search_items'       => 'Search country',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in the trash',
			'parent_item_colon'  => 'Countries',
			'menu_name'          => 'Countries',
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => null,
		'rest_base'           => null,
		// $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-admin-site-alt3',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post',
		//'map_meta_cap'      => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'regions', [
		'label'               => null,
		'labels'              => [
			'name'               => 'All regions',
			'singular_name'      => 'Region',
			'add_new'            => 'Add region',
			'add_new_item'       => 'Adding region',
			'edit_item'          => 'Editing region',
			'new_item'           => 'New region',
			'view_item'          => 'View region',
			'search_items'       => 'Search region',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in the trash',
			'parent_item_colon'  => 'Region',
			'menu_name'          => 'Regions',
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => null,
		'rest_base'           => null,
		// $post_type. C WP 4.7
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-location',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post',
		//'map_meta_cap'      => null,
		'hierarchical'        => false,
		'supports'            => [ 'title' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );
} );

add_action( 'admin_enqueue_scripts', 'wp_kama_admin_enqueue_scripts_action' );

/**
 * Function for `admin_enqueue_scripts` action-hook.
 *
 * @param string $hook_suffix The current admin page.
 *
 * @return void
 */
function wp_kama_admin_enqueue_scripts_action( $hook_suffix ) {

	wp_enqueue_script( 'admin', get_template_directory_uri() . '/assets/js/admin.js' );
}