<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StrategysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('strategys')->delete();
        
        \DB::table('strategys')->insert(array (
            0 => 
            array (
                '编号' => '00001',
                '名称' => '刃长策略',
                '描述' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '编号' => '00002',
                '名称' => '调机费策略',
                '描述' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                '编号' => '00003',
                '名称' => '生产费用策略',
                '描述' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                '编号' => '00004',
                '名称' => '材料费策略',
                '描述' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}