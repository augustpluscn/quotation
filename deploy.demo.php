<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'base');

// Project repository
set('repository', 'http://home.pgss.tk:8099/august/BaseLaravel.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

//保留版本
set('keep_releases', 3);

// Hosts
host('47.103.63.224')
// ->stage('prod')
->user('root')
    ->identityFile('/Users/august/OneDrive/sshkey/redwoodmfq.pem')
    ->set('deploy_path', '/www/wwwroot/{{application}}');

// Tasks
// 自定义任务：重置 opcache 缓存
task('opcache_reset', function () {
    run('{{bin/php}} -r \'opcache_reset();\'');
});

// 自定义任务：重启 php-fpm 服务
task('php-fpm:restart', function () {
    run('systemctl restart php-fpm.service');
});
// 自定义任务：supervisor reload
task('supervisor:reload', function () {
    run('sudo supervisorctl reload');
});

// 重置数据库
task('dbreset', function () {
    run('{{bin/php}} {{release_path}}/artisan base:reset');
});

// 执行自定义任务，注意时间点是 current 已经成功链向新部署的目录之后
after('deploy:symlink', 'php-fpm:restart');
after('deploy:symlink', 'supervisor:reload');
// 部署成功后重置 opcache 缓存
after('deploy:symlink', 'opcache_reset');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
// before('deploy:symlink', 'artisan:migrate');
// before('deploy:symlink', 'dbreset');
