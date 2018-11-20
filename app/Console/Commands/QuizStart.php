<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QuizStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quiz:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Option 1. Empty the laravel.log file, OR
        exec('echo > ' . storage_path('logs/laravel-2018-11-18.log'));

        // Option 2. Empty the logs folder
        exec('rm ' . storage_path('logs/*'));

        $this->comment('Logs have been cleared!');
    }
}
