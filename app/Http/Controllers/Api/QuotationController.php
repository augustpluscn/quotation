<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function add()
    {
        $rule = request()->input('rule');
        $cus = request()->input('cus');
        $eles = request()->input('eles');
        $res = request()->input('res');
        $remark = request()->input('remark');

        $user = auth('api')->user();

        $rules = DB::connection('cus')->table('rules')->where('编号', $rule)->first();
        $quotationId = getSerialByPre('quotations', '单号');
        DB::connection('cus')->table('quotations')->insert(
            [
                '单号' => $quotationId,
                '日期' => date('Y-m-d'),
                '类型' => $rules->分类,
                '客户' => $cus,
                '报价模板' => $rule,
                '说明' => $remark,
                '公式' => $rules->公式,
                '金额' => $res['res'],
                '报价人' => $user->erpUser,
            ]
        );

        $detail = [];
        $n = 1;
        foreach ($eles as $key => $value) {
            $detail[] = [
                '报价单号' => $quotationId,
                '序号' => substr('0000' . $n, -4),
                '元素编号' => $key,
                '值' => $value,
            ];
            $n++;
        }
        DB::connection('cus')->table('quotation_details')->insert($detail);

        $items = [];
        $n = 1;
        foreach ($res['resArr'] as $item) {
            $items[] = [
                '报价单号' => $quotationId,
                '序号' => substr('0000' . $n, -4),
                '成本编号' => $item['成本编号'],
                '成本名称' => $item['成本名称'],
                '公式' => array_key_exists('公式', $item) ? $item['公式'] : '',
                '说明' => array_key_exists('说明', $item) ? $item['说明'] : '',
                '金额' => $item['金额'],
            ];
            $n++;
        }
        DB::connection('cus')->table('quotation_items')->insert($items);

        return $this->success([
            'msg' => '保存成功',
        ]);
    }
}
