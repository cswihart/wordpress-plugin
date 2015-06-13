<?php
/*
Plugin Name: Hello Craig
Plugin URI: N/A
Description: sample test plugin
Version: 1.0
Author: Craig Swihart
Author URI: N/A
Text Domain: hello-craig
Domain Path: /languages
License: GPL v3

This is a test plugin for wordpress.
*/

// Prevent direct file access
if( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

global $rv_db_version;
$rv_db_version = '1.0';

function rv_install() {
	global $wpdb;
	global $rv_db_version;

	$table_name = $wpdb->prefix . 'top_rv_dealers';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		d_firstname tinytext DEFAULT '' NOT NULL,
		d_lastname tinytext DEFAULT '' NOT NULL,
                d_email varchar(320) DEFAULT '' NOT NULL,         
		d_companyname tinytext DEFAULT '' NOT NULL,
                d_coaddressstreet tinytext DEFAULT '' NOT NULL,
                d_coaddresscity tinytext DEFAULT '' NOT NULL,
                d_coaddresscountry tinytext DEFAULT '' NOT NULL, 
                d_coaddresszip tinytext DEFAULT '' NOT NULL,  
                d_url tinytext DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'rv_db_version', $rv_db_version );
}
/* add $wpdb->prepare , add user entry fields , then insert them.
function rv_install_data() {
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'top_rv_dealers';
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'd_firstname' => $d_firstname, 
			'd_lastname' => $d_lastname, 
			'd_email' => $d_email,
			'd_companyname' => $d_companyname,
			'd_coaddressstreet' => $d_coaddressstreet,
			'd_coaddresscity' => $d_coaddresscity,
			'd_coaddresscountry' => $d_coaddresscountry,
			'd_coaddresszip' => $d_coaddresszip,
			'd_url' => $d_url,
		) 
	);
}
*/
register_activation_hook( __FILE__, 'rv_install' );
//register_activation_hook( __FILE__, 'rv_install_data' );



