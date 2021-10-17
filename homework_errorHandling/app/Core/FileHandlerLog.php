<?php

namespace App\Core;

use Monolog\Handler\HandlerInterface;

class FileHandlerLog implements HandlerInterface 
{
    public function isHandling(array $record): bool
    {
        return true;
    }

    public function handle(array $record): bool
    {
        dump($record);
        return true;
    }

    public function handleBatch(array $records): void
    {

    }

    public function close(): void
    {

    }
}