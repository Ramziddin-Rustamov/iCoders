<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Gii extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:olma {property}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'php artisan ';

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
     * @return int
     */
    public function handle()
    {
         echo $this->argument("property");

    }
}
