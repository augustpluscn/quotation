<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\Filter;

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

$site_url = admin_setting('url') ? admin_setting('url') : config('app.url');
$logo = admin_setting('logo');
if ($logo) {
    $logo = '<img src="' . $site_url . '/uploads/' . admin_setting('logo') . '" width="35"> &nbsp;' . admin_setting('name');
    $logo_mini = '<img src="' . $site_url . '/uploads/' . admin_setting('logo') . '">';
} else {
    $logo = '<img src="' . $site_url . '/static/img/logo.png" width="35"> &nbsp;' . admin_setting('name');
    $logo_mini = '<img src="' . $site_url . '/static/img/logo.png">';
}

config([
    'app.url' => $site_url,
    'app.locale' => admin_setting('locale', 'zh_CN'),
    'admin.title' => admin_setting('name', '管理系统'),
    'admin.name' => admin_setting('name', '管理系统'),
    'admin.logo' => $logo,
    'admin.logo-mini' => $logo_mini,
    'admin.layout.body_class' => admin_setting('body_class'),
    'admin.layout.sidebar_style' => 'light',
    'admin.layout.dark_mode_switch' => true,
    'admin.layout.color' => 'blue',
    'admin.layout.horizontal_menu' => admin_setting('horizontal_menu'),
]);

//默认filter格式
// Filter::resolving(function (Filter $filter) {
//     $filter->panel();
//     $filter->expand();
// });

//默认Grid设置
Grid::resolving(function (Grid $grid) {
    // $grid->setActionClass(Grid\Displayers\Actions::class);
    $grid->model()->orderby('id', 'desc');
    // $grid->disableViewButton();
    // $grid->showQuickEditButton();
    // $grid->enableDialogCreate();
    // $grid->disableEditButton();
    // $grid->setDialogFormDimensions('70%', '90%');
});

// Form\Field::macro('', function () {

// });

//双击编辑
// $script = <<<JS
//       $("#grid-table > tbody > tr").on("dblclick",function() {
//          var obj = $(this).find(".feather.icon-edit");
//          if (obj.length == 1) {
//              obj.trigger("click")
//          }
//       })
// JS;
// Admin::script($script);

//默认样式更改
app('view')->prependNamespace('admin', resource_path('views/vendor/laravel-admin'));
