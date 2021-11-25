<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuotationItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quotation_items')->delete();
        
        
        
    }
}