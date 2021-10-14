<?php
require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/functions.php';
include_once __DIR__ . '/app/Core/FileHandlerLog.php';

use App\Core\FileHandlerLog;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new FileHandlerLog(__DIR__ . '/app.log', Logger::WARNING));
$log->warning('Foo');
$log->error('Bar');