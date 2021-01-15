<?php
// Setup MySQL DB Connection
$fw->set('DB', new DB\SQL(
		'mysql:host='.$fw->get('mysql.host').';port='.$fw->get('mysql.port').';dbname='.$fw->get('mysql.database').';charset='.$fw->get('mysql.charset'), 
		$fw->get('mysql.username'),
		$fw->get('mysql.password'), 
		[
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_STRINGIFY_FETCHES => false,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	)
);

// Additional Template Headers for Convenience
Template::instance()->filter('length', 'Template_Helper::length');
Template::instance()->filter('convertDate', 'Date::convertUtcDateToTimeZone');
Template::instance()->filter('convertDateTime', 'Date::convertUtcTimestampToTimeZone');