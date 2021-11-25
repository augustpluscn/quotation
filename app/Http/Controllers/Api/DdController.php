<?php

namespace App\Http\Controllers\Api;

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
}
