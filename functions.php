<?php 

    // Link or Import database.php file - SQL structure
    require get_template_directory() . '/inc/database.php';

    // Handle submission to database
    require get_template_directory() . '/inc/reservations.php';

    // Create option pages for the theme
    require get_template_directory() . '/inc/options.php';

    //

	function wp_restaurant_styles() {
		wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/node_modules/font-awesome/css/font-awesome.min.css');

		wp_register_style('style', get_template_directory_uri() . '/style.css', array(), 1.0 );
		wp_enqueue_style('style');
    
        wp_enqueue_style('google-fonts', "https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900");
        
   	    wp_enqueue_script('jquery');
        
		wp_enqueue_style('fancybox', get_stylesheet_directory_uri() . '/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css');
        wp_enqueue_style('fancybox');
        
   	    wp_enqueue_script('fancyboxjs', get_template_directory_uri() . '/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('fancyboxjs');
        
   	    wp_enqueue_script('App', get_template_directory_uri() . '/app/temp/scripts/App.js', array('jquery'), '1.0', true);
	}

	add_action('wp_enqueue_scripts', 'wp_restaurant_styles');

	// add menus
	function wp_restaurant_menus() {
		register_nav_menus(array(
			'header-menu' => __('Header Menu', 'restaurant'),
            'social-menu' => __('Social Menu', 'restaurant')
		) );
	}

	add_action('init', 'wp_restaurant_menus');

    // featured images 
    
    function wp_restaurant_setup() {
        add_theme_support('post-thumbnails');
        
        add_image_size('boxes', 437, 291, true);
        add_image_size('specialties', 768, 515, true);
        
        update_option('thumbnail_size_w', 253);
        
        update_option('thumbnail_size_h', 164);
    }
        
    add_action('after_setup_theme', 'wp_restaurant_setup');


    // add menu area for specialties


    function wp_restaurant_specialties() {
        $labels = array(
            'name'               => _x( 'Pizzas', 'restaurant' ),
            'singular_name'      => _x( 'Pizza', 'post type singular name', 'lapizzeria' ),
            'menu_name'          => _x( 'Pizzas', 'admin menu', 'restaurant' ),
            'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
            'add_new'            => _x( 'Add New', 'book', 'restaurant' ),
            'add_new_item'       => __( 'Add New Pizza', 'restaurant' ),
            'new_item'           => __( 'New Pizzas', 'restaurant' ),
            'edit_item'          => __( 'Edit Pizzas', 'restaurant' ),
            'view_item'          => __( 'View Pizzas', 'restaurant' ),
            'all_items'          => __( 'All Pizzas', 'restaurant' ),
            'search_items'       => __( 'Search Pizzas', 'restaurant' ),
            'parent_item_colon'  => __( 'Parent Pizzas:', 'restaurant' ),
            'not_found'          => __( 'No Pizzas found.', 'restaurant' ),
            'not_found_in_trash' => __( 'No Pizzas found in Trash.', 'restaurant' )
        );

        $args = array(
            'labels'             => $labels,
        'description'        => __( 'Description.', 'restaurant' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'specialties' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
        );

        register_post_type( 'specialties', $args );
    }

    add_action( 'init', 'wp_restaurant_specialties' ); 

    // widget zone
    
    function wp_restaurant_widgets() {
        register_sidebar( array(
            'name' => 'Blog Sidebar',
            'id' => 'blog_sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ) );
    }

    add_action('widgets_init', 'wp_restaurant_widgets');

?>


















