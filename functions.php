<?php /*
===============================================================
Commentpress Modern Child Theme Functions
===============================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
---------------------------------------------------------------
NOTES

Example theme amendments and overrides.

---------------------------------------------------------------
*/




/** 
 * @description: augment the CommentPress Modern Theme setup function
 * @todo: 
 *
 */
function cpmodernchild_setup( 
	
) { //-->

	/** 
	 * Make theme available for translation.
	 * Translations can be added to the /languages/ directory of the child theme.
	 */
	load_theme_textdomain( 
	
		'cpmodernchild-theme', 
		get_stylesheet_directory() . '/languages' 
		
	);

}

// add after theme setup hook
add_action( 'after_setup_theme', 'cpmodernchild_setup' );






/** 
 * @description: override styles by enqueueing as late as we can
 * @todo:
 *
 */
function cpmodernchild_enqueue_styles() {

	// init
	$dev = '';
	
	// check for dev
	if ( defined( 'SCRIPT_DEBUG' ) AND SCRIPT_DEBUG === true ) {
		$dev = '.dev';
	}
	
	// dequeue parent theme colour styles
	//wp_dequeue_style( 'cp_webfont_lato_css' );
	//wp_dequeue_style( 'cp_colours_css' );
	
	// add child theme's css file
	wp_enqueue_style( 
	
		'cpmodernchild_css', 
		get_stylesheet_directory_uri() . '/assets/css/style-overrides'.$dev.'.css',
		array( 'cp_screen_css' ),
		'1.0', // version
		'all' // media
	
	);
	
}

// add a filter for the above
add_filter( 'wp_enqueue_scripts', 'cpmodernchild_enqueue_styles', 998 );





