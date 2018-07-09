<?php

require 'environment.php';

global $db;
global $config;

$config = array();
if (ENVIRONMENT == 'development') {
    define('BASE_URL', 'http://10.10.1.134/upticket/');    
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

try {
    $db = new PDO("mysql:dbname=" . $config['dbname'] . "; host=" . $config['host'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
}