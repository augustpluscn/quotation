<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Http\Controllers\AdminController as BaseController;

class AdminController extends BaseController
{
    protected $dd;
    public function __construct()
    {
        $this->dd = getDd();
    }
}
