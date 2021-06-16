<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CustomLog extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom-log:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create log';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Log Successfully Created!");
        echo "ok\n";
    }
}
