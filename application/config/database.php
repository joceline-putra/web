<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
<<<<<<< HEAD
	// 'hostname' => 'srv1365.hstgr.io',		
	// 'username' => 'u941743752_avista_web',
	// 'database' => 'u941743752_avista_web',
	// 'password' => '@Sincia2573',	
	'hostname' => 'localhost:2291',		
=======
		// 'hostname' => 'srv1365.hstgr.io',
		// 'username' => 'u941743752_dolphin',
		// 'database' => 'u941743752_dolphin',
		// 'password' => '@Sincia2573',
	'hostname' => 'localhost:2291',
>>>>>>> 5100c6c7a7a18dc5f1a47a0ece6900649dccb26c
	'username' => 'joe',
	'database' => 'web',
	'password' => '@Master2023',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	// 'char_set' => 'utf8',
	// 'dbcollat' => 'utf8_general_ci',
	'char_set' => 'utf8mb4',
	'dbcollat' => 'utf8mb4_unicode_ci',	
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
