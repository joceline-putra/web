<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	// 'hostname' => 'avista.id',		
	// 'username' => 'u941743752_avista_web',
	// 'password' => '@M45t3rj0300',	
	// 'database' => 'u941743752_avista_web',
	// 'hostname' => 'localhost',		
	// 'username' => 'root',
	// 'password' => '',	
	// 'database' => 'florina',	
	'hostname' => 'localhost:2291',		
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
