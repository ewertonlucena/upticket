<?php

require 'environment.php';

global $db;
global $config;

$config = array();
if (ENVIRONMENT == 'development') {
    define('BASE_URL', 'http://10.10.1.133/upticket/');    
    $config['dbname'] = 'helpdesk';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define('BASE_URL', 'http://localhost/upticket/');    
    $config['dbname'] = 'helpdesk';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
}

date_default_timezone_set('America/Recife');
error_reporting(E_ALL ^ E_NOTICE);

try {
    $db = new PDO("mysql:dbname=" . $config['dbname'] . "; host=" . $config['host'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
}