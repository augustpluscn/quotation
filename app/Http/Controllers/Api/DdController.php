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
}
