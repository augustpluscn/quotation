<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RuleDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rule_details')->delete();
        
        \DB::table('rule_details')->insert(array (
            0 => 
            array (
                '规则编号' => '0001',
                '序号' => '0001',
                '计算元素' => '直径',
                '来源类型' => '元素',
                '来源' => 'Y0001',
                '来源说明' => '直径',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '规则编号' => '0002',
                '序号' => '0001',
                '计算元素' => '刃长',
                '来源类型' => '策略',
                '来源' => '00001',
                '来源说明' => '刃长策略',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                '规则编号' => '0003',
                '序号' => '0001',
                '计算元素' => 'CNC',
                '来源类型' => '公式',
                '来源' => '0004',
                '来源说明' => 'CNC公式',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                '规则编号' => '0004',
                '序号' => '0001',
                '计算元素' => '密度',
                '来源类型' => '元素',
                '来源' => 'Y0003',
                '来源说明' => '密度',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                '规则编号' => '0005',
                '序号' => '0001',
                '计算元素' => '材料费',
                '来源类型' => '公式',
                '来源' => '0001',
                '来源说明' => '材料费',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                '规则编号' => '0005',
                '序号' => '0002',
                '计算元素' => '加工费',
                '来源类型' => '公式',
                '来源' => '0002',
                '来源说明' => '加工费',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                '规则编号' => '0005',
                '序号' => '0003',
                '计算元素' => 'CNC',
                '来源类型' => '公式',
                '来源' => '0003',
                '来源说明' => 'CNC',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                '规则编号' => '0006',
                '序号' => '0001',
                '计算元素' => '单价',
                '来源类型' => '公式',
                '来源' => '0007',
                '来源说明' => '单价',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                '规则编号' => '0006',
                '序号' => '0002',
                '计算元素' => '数量',
                '来源类型' => '元素',
                '来源' => 'Y0004',
                '来源说明' => '生产数量',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                '规则编号' => '0006',
                '序号' => '0003',
                '计算元素' => '调机费',
                '来源类型' => '策略',
                '来源' => '00002',
                '来源说明' => '调机费',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                '规则编号' => '0007',
                '序号' => '0001',
                '计算元素' => '生产费',
                '来源类型' => '策略',
                '来源' => '00003',
                '来源说明' => '生产费',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                '规则编号' => '0007',
                '序号' => '0002',
                '计算元素' => '材料费',
                '来源类型' => '策略',
                '来源' => '00004',
                '来源说明' => '材料费',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}