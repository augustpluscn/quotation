<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class DdController extends Controller
{
    public function getDd()
    {
        $dd = getDd();
        return $this->success(
            [
                'dd' => $dd,
            ]
        );

    }

    public function getErpDd()
    {
        $kind = request()->input('kind');

        $list = DB::connection('cus')->table('basicInfo')->where('kind', $kind)->select('BID', 'content', 'remark')->get();

        return $this->success([
            'list' => $list,
        ]);
    }

    public function getCompany()
    {
        $list = DB::connection('cus')->table('Company')->where('type', 1)->where('删除', 0)->where('Lock', 0)->select('CompName')->pluck('CompName')->toArray();
        return $this->success([
            'list' => $list,
        ]);

    }
}
