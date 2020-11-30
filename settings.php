<?php
require 'environment.php';
require 'core/utils.php';

header('Access-Control-Allow-Origin: *');

define('BASE_URL', 'http://www.eliseu.online/');

define('favicon',  'http://www.eliseu.online/assets/images/favicon.ico');

define('VERSION',  '1254');

define('keywords', 'keywords do site');
define('description', 'description do site');
define('author', 'Eliseu Carneiro de Oliveira');
define('ogtitle', 'ogtitle do site');
define('ogimage', 'ogimage do site');
define('ogurl', 'ogurl do site');
define('ogsite_name', 'Loja - by Eliseu');
define('ogdescription', 'ogdescription do site');
define('canonical', 'canonical do site');

$settings = [];

if(ENVIRONMENT == 'development') {
	$settings['HOST']   = 'localhost';
	$settings['DBNAME'] = 'dbname';
	$settings['USER']   = 'user';
	$settings['PASS']   = 'pass';
} else {
	$settings['HOST']   = 'localhost';
	$settings['DBNAME'] = 'provamvc';
	$settings['USER']   = 'root';
	$settings['PASS']   = '';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$settings['DBNAME'].";host=".$settings['HOST'], $settings['USER'], $settings['PASS']);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  $db->exec('set names utf8');
}catch(PDOException $e){
	echo 'Error: ' .$e->getMessage();
} 