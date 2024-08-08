<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class HelloCommand extends Command
{
    protected $signature = 'Hello {name}';
    protected $description = 'Hello command';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $name = $this->argument('name');

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/hello.log'),
        ])->info("Hello, $name!");
    }
}
