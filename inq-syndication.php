<?php /**
 * @package Inquirer Mobile Syndication
 * @author INQDev[Oski,Kenn,Erwin]
 * @version 1.0
 */
/*
Plugin Name: Inquirer Mobile Syndication
Plugin URI: INQUIRER.net
Description: CRUD Post to another server
Author: INQDev[Oski,Kenn,Erwin]
Version: 1.0
Author URI: INQUIRER.net
*/ 


add_action( 'save_post', 'syndicate_to_mobile_server', 10,3 );
 
function syndicate_to_mobile_server( $post_id, $post, $update ) {
 
    if ( 'post' !== $post->post_type ) {
        return;
    }
  
	$array_post_data = array();
	
	$array_post_data['title'] = get_the_title( $post_id );
	$array_post_data['link'] = get_permalink( $post_id );
	$array_post_data['content'] = get_the_content( $post_id );
	$array_post_data['t'] = $update;
	
	file_put_contents(  plugin_dir_path( __FILE__ ).'/test_sydicate.txt',serialize($array_post_data) );
   
}
?>