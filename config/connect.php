<?php


require 'lib/medoo.min.php';

$config = parse_ini_file('server/server.ini');


use Medoo\Medoo;

$database = new Medoo([
// required
// 'database_type' => 'mysql',
'database_type' => $config['database_type'],
'database_name' => $config['dbname'],
'server' => $config['servername'],
'username' => $config['username'],
'password' => $config['password'], 
'charset' => 'utf8',

// optional
'port' => 3306,
// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
'option' => [
PDO::ATTR_CASE => PDO::CASE_NATURAL
]
]);


//using config file
// 'database_type' => 'mysql',
// 'database_name' => $config['dbname'], // boleh tukar
// 'server' => $config['servername'],
// 'username' => $config['username'], // boleh tukar
// 'password' => $config['password'], // boleh tukar
// 'charset' => 'utf8',

//without config.ini
// 'database_type' => 'mysql',
// 'database_name' => 'ntp', // boleh tukar
// 'server' => 'localhost',
// 'username' => 'root', // boleh tukar
// 'password' => '', // boleh tukar
// 'charset' => 'utf8',

