eve简单的命令行框架
=================

执行
--------------
php bin/index.php ${路由名}  | ${参数}
```
php bin/index.php /
```

config目录
---------------
alias.yml 命名空间配置
config.yml 所有配置文件
router.yml 路由配置文件

待补充
---------------
request 请求参数不够多

Develop
---------------
获取di
    Application::$di
获取config
    Application::$di->$config;
初始化capsule      
    Application::$di->bootCapsule();
获取capsule
    Application::$di->get('capsule')

sl为业务逻辑目录
---------------

work_flow
---------------
index->Application->Kernel->Di->Dispatch->Middleware->Controller
