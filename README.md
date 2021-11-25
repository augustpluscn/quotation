# 说明
整合laravel8和vue  
包含dcat admin作为后台  
vue使用jwt实现登录认证  
jwt认证使用表是admin_users  

# 安装方式  
## laravel环境  
composer install -vvv  
复制.env文件，配置数据库  
执行php artisan key:generate 产生key  
执行php artisan base:reset 生成数据库和默认数据  
执行php artisan jwt:secret 生成jwt key  

---

## vue环境
cd resources/js/  
npm install  
修改.env.development和.env.production中接口主地址  
npm run serve  开发环境  
npm run build 生产环境  