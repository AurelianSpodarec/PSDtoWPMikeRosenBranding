<?php 

	function theme_styles()
	{
	    wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/public/css/app.css' );
	}
	add_action( 'wp_enqueue_scripts', 'theme_styles' ); 

	function theme_js()
	{
	    global $wp_scripts;
	    wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
		wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );
	    $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
		$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
	    wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/public/js/app.bundle.js', array('jquery'), '', true );
	}
	add_action( 'wp_enqueue_scripts', 'theme_js' );

	// Add Theme Support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
	add_theme_support( 'html5' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'starter-content' );

	add_filter('show_admin_bar', '__return_false');


	define('ALLOW_UNFILTERED_UPLOADS', true);

	
	// add_action('get_header', 'my_filter_head');

	// function my_filter_head() {
	// 	remove_action('wp_head', '_admin_bar_bump_cb');
	// }	

	// Register Menu Locations
	register_nav_menus( [
		'main-menu' => esc_html__( 'Main Menu', 'wpheirarchy' ),
		'footer-menu' => esc_html__('Footer Menu', 'wpheirarchy')
	]);


	// Setup Widget Areas
	function widget_main_sidebar() {
		$args = 
		register_sidebar([
			'name'			=> esc_html__( 'Main Sidebar', 'wpheirarchy' ),
			'id'			=> 'main-sidebar',
			'description' 	=> esc_html__( 'Add widgets for main sidebar', 'wpheirarchy' ),
			'before_widget' => '<section class="widget">',
			'after_widget' 	=> '</section>',
			'before_title' 	=> '<h2>',
			'after_title' 	=> '</h2>'
		]);
	}
	add_action( 'widgets_init', 'widget_main_sidebar' );

	function widget_contact_sidebar() {
		$args = 
		register_sidebar([
			'name'			=> esc_html__( 'Contact Sidebar', 'wpheirarchy' ),
			'id'			=> 'contact-sidebar',
			'description' 	=> esc_html__( 'Add widgets for contact sidebar', 'wpheirarchy' ),
			'before_widget' => '<section class="widget">',
			'after_widget' 	=> '</section>',
			'before_title' 	=> '<h2>',
			'after_title' 	=> '</h2>'
		]);
	}
	add_action( 'widgets_init', 'widget_contact_sidebar' );




	class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
  
		// add classes to ul sub-menus
		function start_lvl( &$output, $depth ) {
		    // depth dependent classes
		    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		    $classes = array(
		        'sub-menu',
		        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
		        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
		        'menu-depth-' . $display_depth
		        );
		    $class_names = implode( ' ', $classes );
		  
		    // build html
		    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}
		  
		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth, $args ) {
		    global $wp_query;
		    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		  
		    // depth dependent classes
		    $depth_classes = array(
		        ( $depth == 0 ? 'site-nav__item' : 'sub-menu-item' ),
		        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
		        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
		        'menu-item-depth-' . $depth
		    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		  
		    // passed classes
		    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		  
		    // build html
		    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		  
		    // link attributes
		    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		    $attributes .= ' class="site-nav__link ' . ( $depth > 0 ? 'sub-site-nav__link' : 'main-site-nav__link' ) . '"';
		  
		    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
		        $args->before,
		        $attributes,
		        $args->link_before,
		        apply_filters( 'the_title', $item->title, $item->ID ),
		        $args->link_after,
		        $args->after
		    );
		  
		    // build html
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}


		class Nav_Footer_Walker extends Walker_Nav_Menu {
  
		// add classes to ul sub-menus
		function start_lvl( &$output, $depth ) {
		    // depth dependent classes
		    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		    $classes = array(
		        'sub-menu',
		        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
		        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
		        'menu-depth-' . $display_depth
		        );
		    $class_names = implode( ' ', $classes );
		  
		    // build html
		    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}
		  
		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth, $args ) {
		    global $wp_query;
		    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		  
		    // depth dependent classes
		    $depth_classes = array(
		        ( $depth == 0 ? 'footer-main__nav-item highlighted' : 'sub-menu-item' ),
		        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
		        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
		        'menu-item-depth-' . $depth
		    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		  
		    // passed classes
		    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		  
		    // build html
		    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		  
		    // link attributes
		    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		    $attributes .= ' class="nav-menu__link ' . ( $depth > 0 ? 'sub-nav-menu__link' : 'main-nav-menu__link' ) . '"';
		  
		    $item_output = sprintf( '%1$s<a%2$s><span>%3$s%4$s%5$s</span></a>%6$s',
		        $args->before,
		        $attributes,
		        $args->link_before,
		        apply_filters( 'the_title', $item->title, $item->ID ),
		        $args->link_after,
		        $args->after
		    );
		  
		    // build html
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}



		function services_post_type() {
		    $args = array(
		        'public'    => true,
		        'label'     => __( 'Services'),
		        'singular_name'       => __( 'Service', 'Post Type Singular Name', 'wpheirarchy' ),
		        'menu_icon' => 'dashicons-welcome-write-blog',
		    );	
		    register_post_type( 'services', $args );
		}
		add_action( 'init', 'services_post_type' );

		// function services() {
		//     $args = array(
		//         'public'    => true,
		//         'label'     => __( 'Services'),
		//         'singular_name'       => __( 'Services', 'Post Type Singular Name', 'wpheirarchy' ),
		//         'menu_icon' => 'dashicons-welcome-write-blog',
		//     );	
		//     register_post_type( 'services', $args );
		// }
		// add_action( 'init', 'services' );

		function work() {
		    $args = array(
		        'public'    => true,
		        'label'     => __( 'Past Work'),
		        'singular_name'       => __( 'Work', 'Post Type Singular Name', 'wpheirarchy' ),
		        'menu_icon' => 'dashicons-welcome-write-blog',
		    );	
		    register_post_type( 'work', $args );
		}
		add_action( 'init', 'work' );
 
		function add_file_types_to_uploads($file_types){
			$new_filetypes = array();
			$new_filetypes['svg'] = 'image/svg+xml';
			$file_types = array_merge($file_types, $new_filetypes );
			return $file_types;
		}
		add_action('upload_mimes', 'add_file_types_to_uploads');


		add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	
	function add_current_nav_class($classes, $item) {
		
		// Getting the current post details
		global $post;
		
		// Getting the post type of the current post
		$current_post_type = get_post_type_object(get_post_type($post->ID));
		$current_post_type_slug = $current_post_type->rewrite[slug];
			
		// Getting the URL of the menu item
		$menu_slug = strtolower(trim($item->url));
		
		// If the menu item URL contains the current post types slug add the current-menu-item class
		if (strpos($menu_slug,$current_post_type_slug) !== false) {
		
		   $classes[] = 'circle--bottom';
		
		}
		
		// Return the corrected set of classes to be added to the menu item
		return $classes;
	
	}