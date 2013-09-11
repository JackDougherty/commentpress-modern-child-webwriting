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


/** 
 * @description: override comment_form template by intercepting value
 * @todo: 
 *
 */
function cpmodernchild_template_comment_form() {
	
	// --<
	return get_stylesheet_directory() . '/assets/templates/comment_form.php';

}

// add a filter for the above
add_filter(	'cp_template_comment_form', 'cpmodernchild_template_comment_form' );


// to remove the day-of-the-week from meta display in original theme
if ( ! function_exists( 'commentpress_echo_post_meta' ) ):
/** 
 * @description: show user(s) in the loop
 * @todo: 
 *
 */
function commentpress_echo_post_meta() {

	// compat with Co-Authors Plus
	if ( function_exists( 'get_coauthors' ) ) {
	
		// get multiple authors
		$authors = get_coauthors();
		//print_r( $authors ); die();
		
		// if we get some
		if ( !empty( $authors ) ) {
		
			// use the Co-Authors format of "name, name, name & name"
			$author_html = '';
			
			// init counter
			$n = 1;
			
			// find out how many author we have
			$author_count = count( $authors );
		
			// loop
			foreach( $authors AS $author ) {
				
				// default to comma
				$sep = ', ';
				
				// if we're on the penultimate
				if ( $n == ($author_count - 1) ) {
				
					// use ampersand
					$sep = __( ' &amp; ', 'commentpress-core' );
					
				}
				
				// if we're on the last, don't add
				if ( $n == $author_count ) { $sep = ''; }
				
				// get name
				$author_html .= commentpress_echo_post_author( $author->ID, false );
				
				// and separator
				$author_html .= $sep;
				
				// increment
				$n++;
				
				// yes - are we showing avatars?
				if ( get_option('show_avatars') ) {
				
					// get avatar
					echo get_avatar( $author->ID, $size='32' );
					
				}
					
			}
			
			?><cite class="fn"><?php echo $author_html; ?></cite>
			
			<p><a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a></p>
			
			<?php
				
		}
	
	} else {
	
		// get avatar
		$author_id = get_the_author_meta( 'ID' );
		echo get_avatar( $author_id, $size='32' );
		
		?>
		
		<cite class="fn"><?php commentpress_echo_post_author( $author_id ) ?></cite>
		
		<p><a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a></p>
		
		<?php 
	
	}
		
}
endif; // commentpress_echo_post_meta
