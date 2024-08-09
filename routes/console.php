<?php

use App\Console\Commands\HelloCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(HelloCommand::class, ['Cody'])
    ->timezone('America/Mexico_City')
    ->yearlyOn(8, 8, '18:46');
