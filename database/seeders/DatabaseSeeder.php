<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RulesTableSeeder::class);
        $this->call(RuleDetailsTableSeeder::class);
        $this->call(StrategysTableSeeder::class);
        $this->call(StrategyDetailsTableSeeder::class);
        $this->call(ElementsTableSeeder::class);
        $this->call(QuotationsTableSeeder::class);
        $this->call(QuotationDetailsTableSeeder::class);
        $this->call(QuotationItemsTableSeeder::class);
    }
}
