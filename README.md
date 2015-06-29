# 代码结构

	prjroot/
		|-- backend/					后端功能
			|-- assets/ 				后端通用assets
			|-- config/					后端配置
				|-- web.php				web配置文件（线上生产/预发布）
				|-- db.php				数据库配置
				|-- modules.php			模块配置文件
				|-- params.php			公用参数配置文件
			|-- modules/
					|-- module1/
						|-- assets/			模块assets
						|-- controllers/	模块1的控制器
						|-- views/			模块1的views
						|-- model/			模块1的模型（userform等）
						|-- submodules/		子模块目录
						|-- Module.php		模块1的bootstrap类
						|-- ...
			|-- runtime/
			|-- views/						通用views
				
			|-- web/						webroot
				|-- js/						通用的js
				|-- css/					通用的css
				|-- images/					通用的images
				|-- module1/				模块相关的js/css/	
					|-- js/
					|-- css/
					|-- images/
				|-- assets/					静态资源发布目录
				|-- upload/		
				|-- index.php				启动脚本
				|-- index-test.php			测试环境启动文件
				|-- .htaccess				apache的rewrite规则
		|-- common/							通用目录
			|-- config/						通用配置目录
			|-- dals/						dals层目录
				|-- logic1/					业务1dal逻辑
				|-- ...
			|-- srvs/						services层目录
				|-- logic1/					业务1service逻辑
			|-- views/					前后端通用模板
		|-- console/						命令行代码目录（后台作业等）
			|-- config/						配置
			|-- controllers/				后台作业控制器代码
			|-- runtime/				
			|-- console.php					启动脚本
		|-- environments/					环境有关代码
			|-- dev/						开发环境配置目录
				|-- ...		
			|-- prod/						生产/预发布环境配置目录
				|-- ..
			|-- conf.php					环境配置文件
		|-- vendor/						第三方依赖（通过composer管理）
				|-- yiisoft/		
						|-- yii2/			yii2的官方库
						|-- yii2-debugger/
		|--	frontend/ 						结构同backend，前端功能
		|-- tests/							测试代码目录
		|-- docs/							项目开发文档
		|-- .gitignore
		|-- init
		|-- init.bat
		|-- READEME.md

# 注
* 前后端分离，前端功能（微信，轻应用）相关的代码逻辑置于frontend下面，后端管理（后台管理，配置）相关的代码逻辑置于backend下面。frontend/web,backend/web需要分别配置。
* 所有的环境相关代码在代码结构里面不入版本库，由environment统一管理，如果需要修改线上环境，请在environment中对应修改。这些文件通过初始化脚本init.php创建（拉下代码后，执行php init.php）

* 将projectroot/frontend/web配置为服务器的webroot，所有的代码文件不放在web里面，这样相对安全些。
* vendors通过composer来管理，其他人以源代码的形式拉取vendor里面的内容。

# 本地开始

* PHP版本，5.5.15（ 推荐xampp-1.8.3：<http://sourceforge.net/projects/xampp/files/> ）
* 安装git（ 推荐msysgit：<http://msysgit.github.io/> ）
* 安装ZendStudio或者其他IDE
* 执行init.bat脚本文件，该脚本依序如下步骤
	* `git clone git@github.com:hustnaive/yii-advanced-modular-vendor.git vendor` 拖取公用依赖包到项目下的vendor目录。
	* `php requirement.php` 验证扩展，依赖是否存在。
	* `php init` 执行php环境的初始化。
* 将 `backend/web` 和 `frontend/web` 分别配置到你的webroot下

# 命名空间

* `@common` => `common/`
* `@frontend` => `frontend/`
* `@backend` => `backend/`
* `@console` => `console/`
* `@dals` => `common/dals`
* `@srvs` => `common/srvs`
* `@modules` => 针对frontend，为`frontend/modules/`；针对backend，为`backend/modules/`

* `@modulename`，针对某模块内部引用，采用`@modulename`直接引用。如果跨模块，请`@modules\modulename`方式。
# 提交代码

* git pull 拖取最新版本的代码
* git push 将本地代码提交到仓库