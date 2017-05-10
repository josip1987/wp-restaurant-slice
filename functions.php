<?php 
	function wp_restaurant_styles() {
		//wp_enqueue_style('wp_restaurant_stylesheet', get_stylesheet_uri());
		wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/node_modules/font-awesome/css/font-awesome.min.css');

		wp_register_style('style', get_template_directory_uri() . '/style.css', array(), 1.0 );
		wp_enqueue_style('style');

   	    wp_enqueue_script('jquery');
   	    wp_enqueue_script('App', get_stylesheet_directory_uri() . '/app/temp/scripts/App.js', array('jquery'), '1.0', true);
	}

	add_action('wp_enqueue_scripts', 'wp_restaurant_styles');

	register_nav_menus( array(
		'main_menu' => __('Main Menu', 'menu')
	) );

	add_theme_support('post-thumbnails' );

	add_image_size('entry', 400, 150, true);

?>
