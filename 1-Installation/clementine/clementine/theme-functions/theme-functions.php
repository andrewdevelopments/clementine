<?php
#-------------------------------------------------#
# This file contains main functions of this theme #
#-------------------------------------------------#
// Initialize theme options
Redux::init( 'clementine_theme_options' );

if ( !function_exists('_clementine_get_option_') ) {
    function _clementine_get_option_( $check ){
        global $clementine_theme_options;
        if( isset( $clementine_theme_options[$check] ) ) {
            return $clementine_theme_options[$check];
        }
    }
}

// No direct access
if ( !defined('ABSPATH') ) exit;

// Set Content Width
if ( !isset($content_width)) :
	$content_width = 1170;
endif;

if( !function_exists('clementine_theme_setup') ) :
	/**
	Set up theme defaults for theme.
	Note that this function is hooked into the after_setup_theme hook, wich runs before the init hook.
	*/
	add_action( 'after_setup_theme', 'clementine_theme_setup' );
	
	function clementine_theme_setup() {
		global $locale;
		// Set language
		$locale = _clementine_get_option_('adD_language');
		// Load theme's translated strings
		load_theme_textdomain( 'clementine', THEME_DIR . '/languages' );
		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => __('Main Menu', 'clementine'),
				'top-menu' => __('Top Menu', 'clementine'),
				'responsive-menu' => __('Responsive Menu', 'clementine')
			)
		);
		// Add theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-formats', array('gallery', 'link', 'quote', 'video', 'audio') );
		// Add custom image sizes
		add_image_size( 'clementine-full-slider', 1920, 600, true );
		add_image_size( 'clementine-single', 1920, 700, true );
		add_image_size( 'clementine-default-thumbnail', 750, 400, true );
		add_image_size( 'clementine-fullheight-thumbnail', 750, 600, true );
		add_image_size( 'clementine-fullwidth-thumbnail', 1140, 600, true );
		// Enqueue styles and scripts
		add_action( 'wp_enqueue_scripts', 'clementine_theme_enqueues' );
		add_action( 'wp_enqueue_scripts', 'clementine_google_map' );
		add_action( 'admin_enqueue_scripts', 'clementine_admin_scripts' );
	}
endif;
function clementine_admin_scripts() {
	global $pagenow;
	if( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) :
		wp_enqueue_script( 'clementine_map-sensor', '//maps.google.com/maps/api/js', array(), '',TRUE );
		wp_enqueue_script( 'clementine_user-map', THEME_URL . '/theme-functions/assets/user-map.js', array(), '', TRUE );
		wp_enqueue_style( 'clementine_custom', THEME_URL . '/theme-functions/assets/custom.css' );
	endif;
}
function clementine_theme_enqueues() {

	// SASS Mode style & script
	wp_register_script( 'clementine_sass-script', THEME_URL . '/theme-utilities/sass/theme/scripts/main.js', array(), '1.0', TRUE );
	wp_register_style( 'clementine_sass-style', THEME_URL . '/theme-utilities/sass/theme/styles/main.css', array(), '1.0' );
	// Main style & script
	wp_register_script( 'clementine_main-script', THEME_URL . '/theme-utilities/scripts/main.min.js', array(), '1.0', TRUE );
	wp_register_style( 'clementine_main-style', THEME_URL . '/theme-utilities/styles/main.min.css', array(), '1.0' );
	// Modernizer
	wp_register_script( 'clementine_modernizr', THEME_URL . '/theme-utilities/scripts/modernizr.custom.48287.js', array(), '2.8.3', FALSE );
	// Owl carousel
	wp_register_script( 'clementine_owl-slider-js', THEME_URL . '/theme-utilities/scripts/owl.carousel.min.js', array('jquery'), '1.3.3', TRUE );
	wp_register_style( 'clementine_owl-slider-css', THEME_URL . '/theme-utilities/styles/owl.carousel.css', array(), '1.3.3' );
	// Masonry
	wp_register_script( 'clementine_masonry', THEME_URL . '/theme-utilities/scripts/masonry.min.js', array(), '3.3.2', TRUE );
	// Justified Gallery
	wp_register_script( 'clementine_justifiedGallery', THEME_URL . '/theme-utilities/scripts/jquery.justifiedGallery.min.js', array(), '3.6.1', TRUE );
	wp_register_style( 'clementine_justifiedGallery-css', THEME_URL . '/theme-utilities/styles/justifiedGallery.min.css', array(), '3.6.1' );
	// Magnific Popup
	wp_register_script( 'clementine_magnific-popup-js', THEME_URL . '/theme-utilities/scripts/jquery.magnific-popup.min.js', array('jquery'), '1.0.1', TRUE );
	wp_register_style( 'clementine_magnific-popup-css', THEME_URL . '/theme-utilities/styles/magnific-popup.css', array(), '1.0.1' );
	// General styles
	wp_register_style( 'clementine_google-fonts', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,700|Montserrat:400,700' );
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if( _clementine_get_option_('adD_layout') == 'grid-2-cols' || _clementine_get_option_('adD_layout') == 'grid-3-cols' || _clementine_get_option_('adD_layout') == 'grid-4-cols' || _clementine_get_option_('adD_layout') == 'post-grid' ) :
		wp_enqueue_script( 'clementine_masonry' );
	endif;
	if( _clementine_get_option_('adD_post_slider') == 'map' || is_single() ) :
		// wp_enqueue_script( 'sensor' );
		// wp_enqueue_script( 'map' );
	endif;
	wp_enqueue_style( 'clementine_owl-slider-css' );
	wp_enqueue_script( 'clementine_owl-slider-js' );

	wp_enqueue_style( 'clementine_google-fonts' );

	wp_enqueue_style( 'clementine_justifiedGallery-css' );
	wp_enqueue_script( 'clementine_justifiedGallery' );

	wp_enqueue_style( 'clementine_magnific-popup-css' );
	wp_enqueue_script( 'clementine_magnific-popup-js' );
	// Enqueue scripts
	if( SASS_MODE == 1 ) :
		wp_enqueue_style( 'clementine_sass-style' );
		wp_enqueue_script( 'clementine_sass-script' );
	else :
		wp_enqueue_style( 'clementine_main-style' );
		wp_enqueue_script( 'clementine_main-script' );
	endif;
	wp_enqueue_script( 'clementine_modernizr' );
}
if( _clementine_get_option_('adD_custom_js') ) :
	add_action( 'wp_footer', 'clementine_custom_javascript', 100 );
endif;
function clementine_custom_javascript() {
	$javascript = "\n<script type=\"text/javascript\">\n";
	$javascript .= "(function($) {\n";
	$javascript .= _clementine_get_option_('adD_custom_js') ."\n"; 
	$javascript .= "})(jQuery)\n"; 
	$javascript .= "</script>\n";
	echo $javascript;
}
if( _clementine_get_option_('adD_custom_css') ) :
	add_action( 'wp_head', 'clementine_custom_style', 999 );
endif;
function clementine_custom_style() {
	$style = "\n<style>\n";
	$style .= _clementine_get_option_('adD_custom_css') ."\n"; 
	$style .= "</style>\n";
	echo $style;
}
function clementine_pagination() {
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;
	 
    if( $total_pages > 1 ) :
        $current_page = max( 1, get_query_var('paged') );
    	$args = array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'prev_text' => esc_html__( 'Prev', 'clementine' ),
        	'next_text' => esc_html__( 'Next', 'clementine' ),
            'current' => $current_page,
            'total' => $total_pages,
    	);
    	echo '<div class="pagination">';
    		echo paginate_links( $args );
    	echo '</div>';
    endif;
}
if ( function_exists('register_sidebar') ) :
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'clementine' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'clementine' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'clementine' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'clementine' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'clementine' ),
		'id'            => 'footer-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
endif;

if( _clementine_get_option_('adD_sidebars') ) :
	foreach( _clementine_get_option_('adD_sidebars') as $sidebar ) :
		$transform = strtolower(str_replace(' ', '_', $sidebar));
		register_sidebar( array(
			'name' => sprintf( esc_html__( '%s', 'clementine' ), $sidebar ),
			'id' => 'sidebar-' . $transform,
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	endforeach;
endif;

function clementine_categories() {
	$separator = '';
	foreach( get_the_category() as $category )
		echo '<a href="'. esc_url( get_category_link( $category->term_id ) ) .'" title="'. sprintf( esc_html__('View all posts in %s', 'clementine'), $category->name ) .'">'. esc_attr($category->name) .'</a>';
		$separator = '';
		
}
// Post Share
function clementine_sharing() {
	// Check if post sharing is available
	if( _clementine_get_option_('adD_post_sharing') == 1 ) :
	?>
		<div class="box sharing-box">
			<span class="fa fa-share"></span>
			<div class="post-share">
				<a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
					<?php echo esc_html_e( 'Facebook', 'clementine' ); ?>
					<i class="fa fa-facebook"></i>
				</a>
				<a class="twitter" target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20-%20<?php the_permalink(); ?>">
					<?php echo esc_html_e( 'Twitter', 'clementine' ); ?>
					<i class="fa fa-twitter"></i>
				</a>
				<a class="google" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
					<?php echo esc_html_e( 'Google +', 'clementine' ); ?>
					<i class="fa fa-google-plus"></i>
				</a>
				<a class="pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())) ); ?>">
					<?php echo esc_html_e( 'Pinterest', 'clementine' ); ?>
					<i class="fa fa-pinterest-p"></i>
				</a>
			</div>
		</div>
	<?php
	endif;
}
add_filter( 'image_send_to_editor', 'clementine_image_figure', 10, 9 );
function clementine_image_figure( $html, $id, $caption, $title, $align, $url ) {
	$src  = wp_get_attachment_image_src( $id, $size, false );
	$figure = "<figure id='post-$id media-$id' class='align$align'>";
	$figure .= "<img src='$src[0]' alt='$title' width='$src[1]' height='$src[2]' />";
	$figure .= "</figure>";
  return $figure;
}
function clementine_excerpt( $limit ) {
	$content = explode( ' ', get_the_content(), $limit );
	if ( count( $content ) >= $limit ) {
		array_pop( $content );
		$content = implode( ' ', $content);
	}
	else {
		$content = implode( ' ', $content );
	}
	$content = preg_replace( '/[.+]/','', strip_shortcodes( $content ) );
	$content = apply_filters( 'the_content', strip_shortcodes( $content ) );
	$content = str_replace( ']]>', ']]&gt;', strip_shortcodes( $content ) );
	return $content;
	
}
add_filter( 'pre_get_posts', 'clementine_search_filter' );
function clementine_search_filter( $query ) {
	if( $query->is_search ) :
		$query->set('post_type', 'post');
	endif;
	return $query;
}
function clementine_count_comments( $ID ) {
	$num_comments = wp_count_comments( $ID );
	$total_comments = $num_comments->approved;
	return $total_comments;
}
function clementine_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$comment_time = 'get_comment_time';
	
	?>
	<div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		
		<div class="row">
			<div class="c-2 align-center">
				<div class="author-img">
					<?php if( !empty( _clementine_get_option_('adD_author_image')['url'] ) ) : ?>
						<img src="<?php echo _clementine_get_option_('adD_author_image')['url'] ?>" alt="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>" width="<?php echo _clementine_get_option_('adD_author_image')['width'] ?>" height="<?php echo _clementine_get_option_('adD_author_image')['height'] ?>">
					<?php else : ?>
						<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="c-10">
				<div class="comment-text">
					<h5 class="author">
						<?php echo get_comment_author_link(); ?>
						<span><?php echo human_time_diff( $comment_time('U'), current_time('timestamp') ) . ' ' . __('ago', 'clementine'); ?></span>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<span class="approve">
								<i class="fa fa-info-circle"></i>
								<?php esc_html_e('Comment awaiting approval', 'clementine'); ?>
							</span>
						<?php endif; ?>
					</h5>
					
					<?php comment_text(); ?>
					<span class="reply">
						<i class="fa fa-reply"></i>
						<?php comment_reply_link(
						array_merge( $args,
							array(
								'reply_text' => esc_html__('Reply', 'clementine'),
								'depth' => $depth,
								'max_depth' => $args['max_depth']
							)
						), $comment->comment_ID ); ?>
					</span>
				</div>
			</div>
		</div>
		
	</div>
	<?php 
}
add_action( 'tgmpa_register', 'clementine_plugins_instalation' );
function clementine_plugins_instalation() {
	$plugins = array(
		array(
			'name' => 'Vafpress Post Formats UI',
			'slug' => 'vafpress-post-formats-ui-develop',
			'source' => THEME_DIR . '/theme-functions/plugins/vafpress-post-formats-ui-develop.zip',
			'required' => true,
			'force_activation' => false,
			'force_deactivation' => false,
		),
		array(
			'name' => 'Clementine Shortcodes',
			'slug' => 'clementine-shortcodes',
			'source' => THEME_DIR . '/theme-functions/plugins/clementine-shortcodes.zip',
			'required' => true,
			'force_activation' => false,
			'force_deactivation' => false,
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required' => false,
		),
		array(
			'name' => 'MailChimp for WordPress',
			'slug' => 'mailchimp-for-wp',
			'required' => false,
		)
	);
	$config = array(
		'domain' => 'clementine',
		'menu' => 'themes.php',
		'parent_slug' => 'themes.php',
		'menu' => 'install-required-plugins',
		'capability' => 'manage_options'
	);
	tgmpa( $plugins, $config );
}

function clementine_wptitle_filter( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    $title .= get_bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'clementine' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'clementine_wptitle_filter', 10, 2 );

function clementine_google_map() {
	global $post;
	wp_register_script( 'clementine_google-maps-api', '//maps.google.com/maps/api/js', false, false );
	wp_register_script( 'clementine_posts_map', THEME_URL . '/theme-utilities/scripts/map.js', false, false, true );
	wp_enqueue_script( 'clementine_google-maps-api' );
	// Post coordinates
	if( _clementine_get_option_('adD_center_coordinates') != '' ) :
		$post_coordinates = get_post_meta( _clementine_get_option_('adD_center_coordinates'), 'map_coordinates', true );
	else :
		$post_coordinates = '';
	endif;
	if( $post_coordinates ) :
		$lat_and_long = explode(',', $post_coordinates);
		$zoom = _clementine_get_option_('adD_map_zoom');
		$style = _clementine_get_option_('adD_styles');
	else :
		$lat_and_long[0] = '';
		$lat_and_long[1] = '';
		$zoom = '';
		$style = '';
	endif;
	$map_data = array(
	    'markers' => array(), 
	    'center'  => array( $lat_and_long[0], $lat_and_long[1] ), 
	    'zoom'    => $zoom,
	    'style'    => $style,
	);
	$lat  = array();
    $long = array();
    $map_query = new WP_Query( array( 'posts_per_page' => '-1' ) );
    if( $map_query->have_posts() ) : while( $map_query->have_posts() ) : $map_query->the_post();
    	$meta_coords = get_post_meta( get_the_ID(), 'map_coordinates', true );
    	if( $meta_coords ) :
	    	$meta_title = get_post_meta( get_the_ID(), 'map_post_title', true );
	    	// $meta_description = get_post_meta( get_the_ID(), 'map_post_descr', true );
	    	$meta_icon = get_post_meta( get_the_ID(), 'map_post_icon', true );
	    	if( !$meta_icon ) :
	    		$icon = THEME_URL . '/theme-functions/assets/images/icon1.png';
			else :
				$icon = THEME_URL . '/theme-functions/assets/images/' . get_post_meta( get_the_ID(), 'map_post_icon', true ) . '.png';
			endif;
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'clementine-fullheight-thumbnail');
	    	$coords = array_map('floatval', array_map( 'trim', explode( ',', $meta_coords) ) );
	    	if( !$meta_title ) :
	    		$meta_title = get_the_title();
	    	endif;
	    	// if( !$meta_description ) :
	    	// 	$meta_description = Custom_Excerpt(15);
	    	// endif;
	    	$map_data['markers'][] = array(
	            'latlang' => $coords,
	            'title'   => $meta_title,
	            // 'desc'    => $meta_description,
	            'date'    => human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . esc_html__('ago', 'clementine'),
	            'icon'    => $icon,
	            'link'    => get_permalink(),
	            'image'    => $image[0],
	        );
	    endif;
    endwhile; endif;
    wp_reset_postdata();
    if( _clementine_get_option_('adD_google_map_on_all') == '1' ) :
    	wp_enqueue_script( 'clementine_posts_map' );
    	wp_localize_script( 'clementine_posts_map', 'map_data', $map_data );
    else :
		if( is_home() ) :
	    	wp_enqueue_script( 'clementine_posts_map' );
	    	wp_localize_script( 'clementine_posts_map', 'map_data', $map_data );
		endif;
	endif;
}
add_filter('post_gallery', 'clementine_gallery_format', 10, 2);
function clementine_gallery_format( $string, $attr ) {

    $output = "<div class=\"adD-gallery\">";
    $posts = get_posts( array('post_type' => 'attachment', 'orderby' => 'post__in'));
    foreach($posts as $imagePost){
        $output .= '<div class="gallery-item"><a href="'. esc_url( $imagePost->guid ) .'"><img src="'. esc_url( wp_get_attachment_image_src($imagePost->ID, 'large')[0] ) .'" alt="'. esc_attr($imagePost->post_excerpt) .'"></a></div>';
    }
    $output .= "</div>";
    return $output;
    
}
function clementine_remove_api () {
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_action( 'after_setup_theme', 'clementine_remove_api' );
add_action( 'after_switch_theme', 'clementine_rewrite_rules_on_activation' );
function clementine_rewrite_rules_on_activation() {
	flush_rewrite_rules();
}