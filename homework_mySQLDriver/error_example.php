<?php
error_reporting(1);
include_once __DIR__ . '/functions.php';

set_exception_handler(function($exception) {
    echo $exception->getMessage() . '<br>';
    echo $exception->getLine() . '<br>';
    echo $exception->getFile() . '<br>';
    echo $exception->getTrace() . '<br>';
    echo $exception->getCode() . '<br>';
    echo $exception->getTraceAsString() . '<br>';
});

throw new Exception('This is exception');