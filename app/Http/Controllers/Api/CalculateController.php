<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class CalculateController extends Controller
{
    private $split = "/[\+\-\*\/\(\)]/";
    private $eleArr = [];
    private $quotation;
    public function compute()
    {
        //查询规则
        $id = '00002';

        $this->quotation = DB::table('quotations')->where('单号', $id)->first();
        //元素
        $details = DB::table('quotation_details')->where('报价单号', $this->quotation->单号)->get();
        $detailArr = [];
        foreach ($details as $item) {
            $detailArr[$item->元素编号] = $item->值;
        }
        $this->eleArr = $detailArr;

        $res = $this->rule($this->quotation->报价模板);
        dd($res);
        return $this->success([
            'val' => $res,
        ]);
    }

    public function rule($rule)
    {
        $resArr = [];
        $rules = DB::table('rules')->where('编号', $rule)->first();
        $ruleDetails = DB::table('rule_details')->where('规则编号', $rule)->get();

        $formula = $rules->公式;
        $elements = preg_split($this->split, $formula);

        $eleVals = [];
        foreach ($elements as $item) {
            $ele = $ruleDetails->where('计算元素', $item)->first();
            $value = 1;
            if ($ele) {
                switch ($ele->来源类型) {
                    case '公式':
                        $res = $this->rule($ele->来源);
                        $value = $res['res'];
                        $resArr = array_merge($resArr, $res['resArr']);
                        // $value = 4;
                        break;
                    case '策略':
                        $res = $this->strategy($ele->来源);
                        $value = $res['res'];
                        array_unshift($resArr, $res['resArr']);
                        // $value = 3;
                        break;
                    case '元素':
                        $value = $this->eleArr[$ele->来源];
                        break;
                    default:
                        $value = 1;
                        break;
                }
                $eleVals[$item] = $value;
            }
        }
        $result = $this->c($eleVals, $formula);

        array_unshift($resArr, [
            '报价单号' => $this->quotation->单号,
            '成本编号' => $rule,
            '成本名称' => $rules->成本名称,
            '公式' => $rules->公式,
            '说明' => $rules->说明,
            '金额' => $result,
        ]);

        return ['res' => $result, 'resArr' => $resArr];
    }

    public function strategy($strategy)
    {
        $formula = 1;
        $strategyInfo = DB::table('strategys')->where('编号', $strategy)->first();
        $strategyDetail = DB::table('strategy_details')->where('策略编号', $strategy)->get();
        foreach ($strategyDetail as $item) {
            if ($this->compare($item->条件)) {
                $formula = $item->数值;
                break;
            }
        }

        $val = $this->c($this->eleArr, $formula);

        return [
            'res' => $val,
            'resArr' => [
                '报价单号' => $this->quotation->单号,
                '成本编号' => $strategy,
                '成本名称' => $strategyInfo->名称,
                '金额' => $val,
            ],
        ];
    }

    public function c($eleVals, $formula)
    {
        foreach ($eleVals as $index => $item) {
            $formula = str_replace($index, $item, $formula);
        }

        $result = eval("return $formula; ");
        return $result;
    }

    public function compare($formula)
    {
        foreach ($this->eleArr as $index => $item) {
            $formula = str_replace($index, $item, $formula);
        }
        $result = eval("return ($formula); ");
        return $result;
    }
}
