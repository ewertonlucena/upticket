<?php

require 'environment.php';

global $config;
$config = array();
if (ENVIRONMENT == 'development') {
    define('BASE_URL', 'http://localhost/upticket/');
    $config['dbname'] = 'helpdesk';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define('BASE_URL', 'http://meusite.com.br/');
    $config['dbname'] = 'helpdesk';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}
global $db;
try {
    $db = new PDO("mysql:dbname=" . $config['dbname'] . "; host=" . $config['host'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
}