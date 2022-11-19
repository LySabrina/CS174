<?php
declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


use Monolog\Logger;
use Monolog\Handler\StreamHandler;


require_once("Monolog\Logger");
require_once("Monolog\Handler\StreamHandler");


$logger = new Logger('info');
$logger->pushHandler(new StreamHandler(__DIR__.'/test_log.log', Logger::DEBUG));
$logger->info('Test');
