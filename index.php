<?php
require 'vendor/autoload.php';

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

// ロガー作成
$logger = new Logger('sample');
$logger->pushHandler(new StreamHandler('logs/sample.log', Logger::INFO));
$logger->info('information log');


