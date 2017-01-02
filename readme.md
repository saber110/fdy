## 中南大学辅导员考试学习园地平台


## 简单规范
```
本地搭建时建议放在网站根目录下,比如`/www/FDY`

若弹出"此应用正在测试"的对话框,则需联系相应的开发负责人授权
```
### 后台
```
开发以应用为单位，控制器命名`AppName.php`

模型命名`AppName_Model.php`

插件放在`applications/third_party`目录下

应用生成或者上传文件目录设置在`./attch/appname`
```
### 前端
```
前端页面放置在`applications/views/appname`下

前端资源放置在`./pagestuff/appname`下

插件放在`./plugin`目录下
```
## test
```
测试时可注释掉相应控制器`/applications/controllers/Appname.php`里面的构造函数部分`__construct()`
```
