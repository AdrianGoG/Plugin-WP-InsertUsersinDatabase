<?php

/**
*   Plugin Name: BitTest
*   Plugin URI: https://github.com/AdrianGoG
*   Description: Un plugin care afiseaza un formular si permite inserarea unor useri noi in baza de date.
*   Version: 1.0
*   Author: Gogolan Adrian
*   Author URI: https://github.com/AdrianGoG
*   License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
*/

// no direct access

if (!defined('ABSPATH')) { die; }

function bittest_add_css() {

	wp_register_style('bittest-css', plugins_url('/theme/css/frontend.css', __FILE__));

	wp_enqueue_style('bittest-css');

}

add_action('wp_enqueue_scripts', 'bittest_add_css');


//===== SHORTCODE ADD USER / LIST USERS ========//

add_shortcode('add_users', 'custom_user_search');

function custom_user_search($atts) {
	
	require_once('inc/model.php');
	require_once('inc/view.php');

	global $wpdb;

	$input = !empty($_GET) ? $_GET['usearch'] : false;
	
	$model_obj = new BitTestModel($input, $wpdb);
	$results = $model_obj->post_users();
	$results = $model_obj->get_users();
	
	$output = BitTestView::generate_users_view($results);
	
	return $output;
}


//==================HOOKS=====================//

add_action('wp_footer', 'footer_mod'); 
function footer_mod() { 
    echo '<div class="myfooterhook">Copyright © Proiect Final. PHP Frameworks 2021</div>'; 
}






























