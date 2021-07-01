<?php
/**
 * @package Message_Plugin
 * @version 1.0.0
 */
/*
Plugin Name: Message Plugin
Plugin URI: http://kabrane.soumia.org/plugins/Message-Plugin/
Description: Recive an email from your web site
Version: 1.0.0
Author URI: http://kabrane.soumia/
*/


function pwwp_enqueue_my_scripts() {
    // jQuery is stated as a dependancy of bootstrap-js - it will be loaded by WordPress before the BS scripts 
    wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), true); // all the bootstrap javascript goodness
}
add_action('wp_enqueue_scripts', 'pwwp_enqueue_my_scripts');

function pwwp_enqueue_my_styles() {
    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

    // this will add the stylesheet from it's default theme location if your theme doesn't already
    //wp_enqueue_style( 'my-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'pwwp_enqueue_my_styles');
ob_start();
// add menu to admin panel

add_action('admin_menu','custom_function'); //add menu
// add_action('template_redirect','insert_message_form_infos');



function custom_function(){
    add_menu_page(
        'page_title', //Page Title
        'User\'s Messages', // menu Title
        'manage_options',// capability
        'custom_plugin', //menu slug
        'custom_function2' // callable function
    );
    // add_submenu_page('my-menu', 'Submenu Page Title', 'Whatever You Want', 'manage_options', 'my-menu' );

}


function custom_function2 (){
    if(isset($_GET['repid'])){
        include("replayM.php");
 
    }
    else
    include("displayMessage.php");


}



//define absolute path to avoid direct access
if(!defined('ABSPATH')){
    define('ABSPATH',dirname(__FILE__).'/');
    
}

if(!defined('WP_DEBUG')){
    define('WP_DEBUG',TRUE);
    
}
//include database file 
include_once("DBP_db_file.php");
//uninstall
function formM_plugin_uninstall()
	{   
		global $wpdb;
		$table = $wpdb->prefix ."table_form";
		// $qr = "drop table if exists $table";
        $wpdb->query( "DROP TABLE IF EXISTS $table" );
	}
// register hook
register_activation_hook(__FILE__,"DBP_tb_create");
register_uninstall_hook(__FILE__ ,'formM_plugin_uninstall');

function front_inc($atts)
{
   include("form_Message.php");
   insert_message_form_infos($atts);
}


add_shortcode('message','front_inc');


?>