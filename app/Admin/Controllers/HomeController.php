<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('看板')
            ->description('')
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row($this->title());
                });
            });
    }

    private function title()
    {
        return view('admin.dashboard.title');
    }

}
