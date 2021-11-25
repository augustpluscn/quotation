<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BkSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base:bkseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '备份seed数据';

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
        $tables = [
            'admin_menu',
        ];
        $tableStr = implode(',', $tables);
        $command = "iseed $tableStr --force";
        Artisan::call($command);
        $this->info('Done.');

    }
}
