<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class ElementController extends Controller
{
    public function items()
    {
        $item = request()->input('item');
        $itemArr = explode(',', $item);
        if (count($itemArr) == 0) {
            return $this->failed('元素不能为空');
        }
        $list = DB::connection('cus')->table('elements')->whereIn('编号', $itemArr)->orderBy('排序')->orderBy('编号')->get();

        //DB::connection('cus')->table('basicInfo')->where('kind', $kind)->select('BID', 'content', 'remark')->get();
        $ddArr = [];
        //获取字典
        foreach ($list as $item) {
            if ($item->类型 == 2) {
                $ddArr[$item->编号] = DB::connection('cus')->table('basicInfo')->where('kind', $item->来源)->selectRaw('content as label')->pluck('label')->toArray();
            }
        }

        return $this->success([
            'list' => $list,
            'dd' => $ddArr,
        ]);
    }
}
