<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/mobile\view\my\setting.html";i:1531992009;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>设置</title>
		<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/bi_style.css"/>
	</head>
	<body class="MyBody">
		<div id="wrap" class="flex-wrap flex-vertical">
			<!--top-->
			<header class="baike2Top" id="aui-header" style="position:fixed;top:0;background-color:#fff;z-index: 999;">
				<a href="javascript:history.go(-1)"><img src="/bisousuo-2/public/static/mobile/image/baike_04_03.jpg"/></a>
	      <span>设置</span>
			</header>
			<!--内容-->
			<div id="main" class="flex-con" style="margin-top: 70px;">
		    <ul class="accountSafeUl1">
		    	<section class="setUpSec">账号设置</section>
					<li>账号与安全</li>
					<li>推送设置</li>
		    </ul>
				<ul class="accountSafeUl1">
					<section class="setUpSec">其他</section>
					<li>版本更新</li>
					<li>清除缓存</li>
					<li>关于我们</li>
				</ul>
				<div class="setUpBot">
					<a href="<?php echo url('Login/loginout'); ?>"><p class="setUpBotP1">退出账号</p></a>
					<a href="<?php echo url('Login/switchLogin'); ?>"><p>切换账号</p></a>
				</div>
			</div>
		</div>
	</body>
</html>
