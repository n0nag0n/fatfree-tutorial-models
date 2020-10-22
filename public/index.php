<?php

require(__DIR__.'/../vendor/autoload.php');

// install mariadb/mysql
// sudo apt-get install mariadb mariadb-server

// sudo apt-get install php-pdo php-mysql php-mysqlnd

// https://adminer.org

$fw = Base::instance();

$db = new DB\SQL(
    'mysql:host=localhost;port=3306;dbname=fatfree_tutorial;charset=utf8',
    'fatfree_user',
	'testing123',
	[
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::ATTR_STRINGIFY_FETCHES => false
	]
);

$fw->set('DB', $db);
$fw->set('AUTOLOAD', '../controllers/');

$fw->route('GET /', function($fw) { echo "Hello World!"; });
$fw->route('GET /car-parts', 'Car_Parts_Controller->index');
$fw->route('GET /car-parts/insert/@car_part_name', 'Car_Parts_Controller->insert');
$fw->run();