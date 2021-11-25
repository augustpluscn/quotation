<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rules')->delete();
        
        \DB::table('rules')->insert(array (
            0 => 
            array (
                '编号' => '0001',
                '分类' => 1,
                '成本名称' => '材料费',
                '公式' => '直径*20',
                '说明' => NULL,
                '备注' => NULL,
                '级别' => 2,
                '元素' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '编号' => '0002',
                '分类' => 1,
                '成本名称' => '加工费',
                '公式' => '刃长/0.2',
                '说明' => NULL,
                '备注' => '',
                '级别' => 2,
                '元素' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                '编号' => '0003',
                '分类' => 1,
                '成本名称' => 'CNC',
                '公式' => 'CNC*2',
                '说明' => NULL,
                '备注' => NULL,
                '级别' => 2,
                '元素' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                '编号' => '0004',
                '分类' => 1,
                '成本名称' => 'CNC加工费',
                '公式' => '密度*2',
                '说明' => NULL,
                '备注' => NULL,
                '级别' => 2,
                '元素' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                '编号' => '0005',
                '分类' => 1,
                '成本名称' => '铣刀',
                '公式' => '材料费+加工费+CNC',
                '说明' => NULL,
                '备注' => NULL,
                '级别' => 1,
                '元素' => 'Y0001,Y0002,Y0003',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                '编号' => '0006',
                '分类' => 1,
                '成本名称' => '今朝报价',
                '公式' => '单价*数量+调机费',
                '说明' => NULL,
                '备注' => NULL,
                '级别' => 1,
                '元素' => 'Y0004,Y0005,Y0006,Y0007',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                '编号' => '0007',
                '分类' => 1,
                '成本名称' => '单价',
                '公式' => '生产费+材料费',
                '说明' => NULL,
                '备注' => NULL,
                '级别' => 2,
                '元素' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}