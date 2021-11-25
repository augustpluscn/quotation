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
        $list = DB::connection('cus')->table('elements')->whereIn('编号', $itemArr)->get();

        return $this->success([
            'list' => $list,
        ]);
    }
}
