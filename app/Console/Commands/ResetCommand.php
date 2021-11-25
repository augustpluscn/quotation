<?php

namespace App\Console\Commands;

use Database\Seeders\DatabaseSeeder;
use Dcat\Admin\Models\AdminTablesSeeder;
use Illuminate\Console\Command;

class ResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '重置数据库';

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
        $this->initDatabase();

        $this->info('Done.');

    }

    /**
     * Create tables and seed it.
     *
     * @return void
     */
    public function initDatabase()
    {
        $this->call('migrate:fresh');

        $userModel = config('admin.database.users_model');

        if ($userModel::count() == 0) {
            $this->call('db:seed', ['--class' => AdminTablesSeeder::class]);
            $this->call('db:seed', ['--class' => DatabaseSeeder::class]);
        }
    }
}
