<?php
// add $wpdb->prepare , add user entry fields , then insert them.
function rv_install_data() {
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'top_rv_dealers';
	
	$wpdb->insert( 
		$table_name, 
		array(
			'd_firstname' => $_POST["d_firstname"], 
			'd_lastname' => $_POST["d_lastname"], 
			'd_email' => $_POST["d_email"],
			'd_companyname' => $_POST["d_companyname"],
			'd_coaddressstreet' => $_POST["d_coaddressstreet"],
			'd_coaddresscity' => $_POST["d_coaddresscity"],
			'd_coaddresscountry' => $_POST["d_coaddresscountry"],
			'd_coaddresszip' => $_POST["d_coaddresszip"],
			'd_url' => $_POST["d_url"],
		) 
	);
}

//rv_install_data();