<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class RuleController extends Controller
{

    function list() {

        $kind = request()->input('kind', '');
        $list = DB::connection('cus')
            ->table('rules')
            ->where([
                ['级别', 1],
                ['分类', $kind],
            ])
            ->get();

        return $this->success([
            'list' => $list,
        ]);
    }
}
