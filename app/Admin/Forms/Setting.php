<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;

class Setting extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        // dump($input);

        // return $this->response()->error('Your error message.');
        admin_setting($input);
        return $this->response()->success('设置成功')->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->confirm('您确定要提交设置吗', '部分设置提交之后需要重新刷新一下浏览器才能生效');
        $this->text('name', '网站名称')->default(admin_setting('name', '管理系统'));
        $this->url('url', '网站地址')->default(admin_setting('url', 'https://test.com'));
        $this->image('logo', '网站LOGO')->accept('jpg,png,gif,jpeg')->maxSize(512)->required()->autoUpload()->help('大小不要超过512K');
        $this->radio('horizontal_menu', '菜单位置')->options([0 => '侧栏', 1 => '顶栏'])->default(admin_setting('horizontal_menu', 0));
        $this->radio('body_class', '侧栏布局')->options(['default' => '默认', 'sidebar-separate' => '分离']);
        // $this->radio('logintheme', '登录页样式')->options(['bigpicture' => '大图', 'simple' => '简单']);
        // $this->image('logobg', '登陆页背景图')->accept('jpg,png,gif,jpeg')->maxSize(1024)->autoUpload()->help('大小不要超过512K，仅在登录页为大图模式下生效');
        $this->switch('locale', '语言')
            ->customFormat(function ($v) {
                return $v == 'zh_CN' ? 1 : 0;
            })
            ->saving(function ($v) {
                return $v ? 'zh_CN' : 'en';
            });

        // $this->switch('debug', '开发者模式')
        //     ->customFormat(function ($v) {
        //         return $v == '打开' ? 1 : 0;
        //     })
        //     ->saving(function ($v) {
        //         return $v ? 'true' : 'false';
        //     })
        //     ->help('如非排查错误，请平时关闭此选项');

    }

    /**
     * The data of the form.
     *
     * @return array
     */
    function default() {
        return [
            'logo' => admin_setting('logo'),
            'locale' => admin_setting('locale', 'zh_CN'),
            'color' => admin_setting('color', 'green'),
            'body_class' => admin_setting('body_class', 'sidebar-separate'),
            'sidebar_style' => admin_setting('sidebar_style', 'light'),
            'body_class' => admin_setting('body_class', 'sidebar-separate'),
            'logintheme' => admin_setting('logintheme', 'bigpicture'),
            'logobg' => admin_setting('logobg'),
            'horizontal_menu' => admin_setting('horizontal_menu', '0'),
            'style_type' => admin_setting('style_type', 1),
        ];

    }
}
