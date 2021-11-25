<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuotationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quotations')->delete();
        
        \DB::table('quotations')->insert(array (
            0 => 
            array (
                '单号' => '00001',
                '日期' => '2021-11-24',
                '类型' => 1,
                '客户' => '老王',
                '报价模板' => '0005',
                '说明' => '铣刀报价',
                '公式' => '材料费',
                '数量' => '1.00',
                '单价' => NULL,
                '金额' => NULL,
                '报价人' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '单号' => '00002',
                '日期' => '2021-11-24',
                '类型' => 1,
                '客户' => '今朝报价',
                '报价模板' => '0006',
                '说明' => '今朝报价测试',
                '公式' => NULL,
                '数量' => NULL,
                '单价' => NULL,
                '金额' => NULL,
                '报价人' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}