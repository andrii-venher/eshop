<?php
require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/functions.php';
include_once __DIR__ . '/app/Core/FileHandlerLog.php';

use App\Core\FileHandlerLog;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/app.log', Logger::ERROR));
$log->error('Bar', ['test' => 123]);