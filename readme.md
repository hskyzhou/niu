#install
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. php artisan migrate
5. php artisan db:seed

# 定义统一格式

## 页面使用blade模板引擎，然后保存，修改，删除等操作皆调用接口处理。页面跳转都由前端处理。

