<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
    - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here
/*
2. lib/enqueue-sass.php or enqueue-css.php
    - enqueueing scripts & styles for Sass OR CSS
    - please use either Sass OR CSS, having two enabled will ruin your weekend
*/
require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
//require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
/*
3. lib/foundation.php
	- add pagination
	- custom walker for top-bar and related
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
**********************/
function reverie_theme_support() {
	// Add language supports. Please note that Reverie does not include language files, not yet
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie'),
		'utility' => __('Utility Navigation', 'reverie')
	));
	
	// Add custom background support
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}




//automatically create home, details, gallery and location page

if (isset($_GET['activated']) && is_admin()){



	//Add Homepage

	$new_page_title = "Home";

	$new_page_content = "";

	$new_page_template = "template-page-home.php"; //ex. template-custom.php. Leave blank if you don't want a custom page template.



	//don't change the code below, unless you know what you're doing



	$page_check = get_page_by_title($new_page_title);

	$new_page = array(

		'post_type' => 'page',

		'post_title' => $new_page_title,

		'post_content' => $new_page_content,

		'post_status' => 'publish',

		'post_author' => 1,

	);

	if(!isset($page_check->ID)){

		$new_page_id = wp_insert_post($new_page);

		if(!empty($new_page_template)){

			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);

		}

	}

	

	//Add Details Page

	$new_page_title = "Details";

	$new_page_content = "";

	$new_page_template = "template-page-property-details.php"; //ex. template-custom.php. Leave blank if you don't want a custom page template.



	//don't change the code below, unless you know what you're doing



	$page_check = get_page_by_title($new_page_title);

	$new_page = array(

		'post_type' => 'page',

		'post_title' => $new_page_title,

		'post_content' => $new_page_content,

		'post_status' => 'publish',

		'post_author' => 1,

	);

	if(!isset($page_check->ID)){

		$new_page_id = wp_insert_post($new_page);

		if(!empty($new_page_template)){

			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);

		}

	}

	

	//Add Gallery Page

	$new_page_title = "Gallery";

	$new_page_content = "";

	$new_page_template = "template-page-gallery.php"; //ex. template-custom.php. Leave blank if you don't want a custom page template.



	//don't change the code below, unless you know what you're doing



	$page_check = get_page_by_title($new_page_title);

	$new_page = array(

		'post_type' => 'page',

		'post_title' => $new_page_title,

		'post_content' => $new_page_content,

		'post_status' => 'publish',

		'post_author' => 1,

	);

	if(!isset($page_check->ID)){

		$new_page_id = wp_insert_post($new_page);

		if(!empty($new_page_template)){

			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);

		}

	}

	

	//Add Location Page

	$new_page_title = "Location";

	$new_page_content = "";

	$new_page_template = "template-page-location.php"; //ex. template-custom.php. Leave blank if you don't want a custom page template.



	//don't change the code below, unless you know what you're doing



	$page_check = get_page_by_title($new_page_title);

	$new_page = array(

		'post_type' => 'page',

		'post_title' => $new_page_title,

		'post_content' => $new_page_content,

		'post_status' => 'publish',

		'post_author' => 1,

	);

	if(!isset($page_check->ID)){

		$new_page_id = wp_insert_post($new_page);

		if(!empty($new_page_template)){

			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);

		}

	}



}


//set page background image to value of custom field "Page Background Image"

function new_background(){


	echo '<img src="'.$background.'"  class="bg"/>';


}


function add_toggle_script() {

	?>

	<script type="text/javascript">

		jQuery(document).ready(function($){

		  $("#contact-toggle").click(function(){

			$("#contact-form").slideToggle(1000, function(){

				

				$("#contact-toggle").text($(this).is(':visible') ? "close form" : "request more info");



				});

		  });

		});

	</script>

	<?php

}

add_action('thematic_head_scripts', 'add_toggle_script');



function add_fancybox() {

	?>

	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/fancybox/jquery.fancybox-1.3.4.css" type="text/css" />

	<script type="text/javascript">

		jQuery(document).ready(function($) {

			/* Apply fancybox to multiple items */

			

			$(".iframe").fancybox();

		});

</script>



<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

<?php

}

add_action('thematic_head_scripts', 'add_fancybox');


?>