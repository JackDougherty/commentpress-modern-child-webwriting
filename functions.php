<?php /*
===============================================================
CommentPress Modern - Child Theme - Web Writing Functions
===============================================================
AUTHOR: Christian Wach, modified by Jack Dougherty (http://github.com/JackDougherty)
---------------------------------------------------------------
NOTES

Example theme amendments and overrides.

---------------------------------------------------------------
*/



/** 
 * @description: override styles by enqueueing as late as we can
 * @todo:
 *
 */
function cpmodern_childtheme_enqueue_styles() {

	// init
	$dev = '';
	
	// check for dev
	if ( defined( 'SCRIPT_DEBUG' ) AND SCRIPT_DEBUG === true ) {
		$dev = '.dev';
	}
	
	// add child theme's css file
	wp_enqueue_style( 
	
		'cpmodern_childtheme_css', 
		get_stylesheet_directory_uri() . '/assets/css/style-overrides'.$dev.'.css',
		array( 'cp_reset_css' ),
		'1.0', // version
		'all' // media
	
	);

}