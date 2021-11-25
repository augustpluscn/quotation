<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class RuleController extends Controller
{

    function list() {

        $list = DB::connection('cus')->table('rules')->where('级别', 1)->get();

        return $this->success([
            'list' => $list,
        ]);
    }
}
