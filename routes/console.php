<?php

use App\Console\Commands\HelloCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(HelloCommand::class, ['Cody'])->everyFiveSeconds();
