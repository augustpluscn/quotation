<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ElementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('elements')->delete();
        
        \DB::table('elements')->insert(array (
            0 => 
            array (
                '编号' => 'Y0001',
                '名称' => '直径',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '编号' => 'Y0002',
                '名称' => '刃长',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                '编号' => 'Y0003',
                '名称' => '密度',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                '编号' => 'Y0004',
                '名称' => '数量',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                '编号' => 'Y0005',
                '名称' => '刀长',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                '编号' => 'Y0006',
                '名称' => '规格',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                '编号' => 'Y0007',
                '名称' => '度数',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}