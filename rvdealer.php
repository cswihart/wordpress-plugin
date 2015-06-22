<?php

/*

Plugin Name: rvdealer
Plugin URI: N/A
Description: sample test plugin
Version: 1.1
Author: Craig Swihart
Author URI: N/A
Text Domain: rvdealer
Domain Path: /languages
License: GPL v3

*/

// Prevent direct file access
if( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

// Loads the plugin files
require_once (dirname(__FILE__) . '/includes/rvdealer-update-db.php');

global $rv_db_version;
$rv_db_version = '1.0';

/* If RV dealer database is not allready installed in the wordpress database
   This function will create it */

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

register_activation_hook( __FILE__, 'rv_install' );

