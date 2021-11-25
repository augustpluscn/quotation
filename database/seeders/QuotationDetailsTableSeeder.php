<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuotationDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quotation_details')->delete();
        
        \DB::table('quotation_details')->insert(array (
            0 => 
            array (
                '报价单号' => '00001',
                '序号' => '0001',
                '元素编号' => 'Y0001',
                '元素名称' => '直径',
                '值' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '报价单号' => '00001',
                '序号' => '0002',
                '元素编号' => 'Y0002',
                '元素名称' => '刃长',
                '值' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                '报价单号' => '00001',
                '序号' => '0003',
                '元素编号' => 'Y0003',
                '元素名称' => '密度',
                '值' => '0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                '报价单号' => '00002',
                '序号' => '0001',
                '元素编号' => 'Y0004',
                '元素名称' => '数量',
                '值' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                '报价单号' => '00002',
                '序号' => '0002',
                '元素编号' => 'Y0005',
                '元素名称' => '刀长',
                '值' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                '报价单号' => '00002',
                '序号' => '0003',
                '元素编号' => 'Y0006',
                '元素名称' => '规格',
                '值' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                '报价单号' => '00002',
                '序号' => '0004',
                '元素编号' => 'Y0007',
                '元素名称' => '度数',
                '值' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}