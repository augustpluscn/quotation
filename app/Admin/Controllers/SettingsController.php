<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;

class SettingsController extends Controller
{
    /**
     * 版本号.
     *
     * @var string
     */

    public function index(Content $content, $classinfo)
    {
        // dd(config('app.url'));
        switch ($classinfo) {
            case 'setting':
                $title = '网站设置';
                break;
            default:
                $title = '运营设置';
        }

        $classinfo = ucfirst($classinfo);

        $classinfo = '\App\Admin\Forms\\' . $classinfo;
        return $content
            ->title($title)
            ->description('详情')
            ->body(Card::make('设置', new $classinfo())->withHeaderBorder());
    }

}
