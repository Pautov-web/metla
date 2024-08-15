<?php

namespace App\Logging;
 
use Monolog\Handler\AbstractProcessingHandler;
use App\Models\Logger;
use Monolog\LogRecord;
 
class DatabaseHandler extends AbstractProcessingHandler
{
    protected function write(LogRecord $record): void
    {
        Logger::create([
            'user_id' => auth()->check() ? auth()->user()->id : null,
            'info' => $record['message'],
        ]);
    }
}
