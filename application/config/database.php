<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// 'hostname' => 'srv1365.hstgr.io',
// 'username' => 'u941743752_dolphindoor',
// 'password' => '@Sincia2573',
// 'database' => 'u941743752_dolphindoor',

// 'hostname' => 'srv1365.hstgr.io',		
// 'username' => 'u941743752_web',
// 'password' => '@Sincia2573',	
// 'database' => 'u941743752_web',	

// 'hostname' => 'localhost:2291',
// 'username' => 'joe',
// 'database' => 'web',
// 'password' => '@Master2023',

// 'hostname' => 'localhost:2291',
// 'username' => 'joe',
// 'database' => 'web_mgdt',
// 'password' => '@Master2023',

// 'hostname' => 'srv1365.hstgr.io',		
// 'username' => 'u941743752_megadata',
// 'password' => '@Sincia2573',	
// 'database' => 'u941743752_megadata',	

$db['default'] = array(
	'dsn'	=> '',			
'hostname' => 'srv1365.hstgr.io',		
'username' => 'u941743752_megadata',
'password' => '@Sincia2573',	
'database' => 'u941743752_megadata',	
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
