<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class CalculateController extends Controller
{
    private $split = "/[\+\-\*\/\(\)]/";
    private $eleArr = [];
    public function compute()
    {
        $rule = request()->input('rule');
        $eles = request()->input('eles');

        $this->eleArr = $eles;
        $res = $this->rule($rule);
        return $this->success([
            'res' => $res,
        ]);
    }

    public function rule($rule)
    {
        $resArr = [];
        $rules = DB::connection('cus')->table('rules')->where('编号', $rule)->first();
        $ruleDetails = DB::connection('cus')->table('rule_details')->where('规则编号', $rule)->get();

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
        $strategyInfo = DB::connection('cus')->table('strategys')->where('编号', $strategy)->first();
        $strategyDetail = DB::connection('cus')->table('strategy_details')->where('策略编号', $strategy)->get();
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
                '成本编号' => $strategy,
                '成本名称' => $strategyInfo->名称,
                '金额' => $val,
            ],
        ];
    }

    public function c($eleVals, $formula)
    {
        //排序,字符多的key先替换
        $keyArr = array_keys($eleVals);
        $newArr = [];
        foreach ($keyArr as $value) {
            $isInsert = 0;
            for ($i = 0; $i < count($newArr); $i++) {
                if (strlen($value) >= strlen($newArr[$i])) {
                    array_splice($newArr, $i, 0, $value);
                    $isInsert = 1;
                    break;
                }
            }
            if ($isInsert == 0) {
                $newArr[] = $value;
            }
        }

        foreach ($newArr as $key) {
            $formula = str_replace($key, $eleVals[$key], $formula);
        }

        // foreach ($eleVals as $index => $item) {
        //     $formula = str_replace($index, $item, $formula);
        // }

        $result = eval("return $formula; ");
        return $result;
    }

    public function compare($formula)
    {
        foreach ($this->eleArr as $index => $item) {
            $formula = str_replace($index, "'$item'", $formula);
        }
        $result = eval("return ($formula); ");
        return $result;
    }
}
