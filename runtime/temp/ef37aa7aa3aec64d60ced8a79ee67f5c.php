<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/mobile\view\login\login.html";i:1531914515;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="../css/bi_style.css"/>
	</head>
	<body>
		<div id="wrap" class="flex-wrap flex-vertical">
			<!--top-->
			<header id="aui-header" class="baike2Top" style="position:fixed;top:0;">
				<a href="javascript:history.go(-1)"><img src="../image/baike_04_03.jpg"/></a>
		    <span>登录</span>
			</header>
			<!--内容-->
			<div id="main" class="flex-con" style="margin-top: 70px;">
			  <section class="loginYLogo"><img src="../image/logo.jpg" alt="Logo"></section>
			  <form action="#" method="get">
			    <div class="loginYinput">
			      <label for="tel">+86</label><input type="tel" required placeholder="请输入手机号码" pattern="^[0-9]{11}$" id="tel" oninvalid="setCustomValidity('请输入您的手机号');" oninput="setCustomValidity('');" />
			    </div>
			    <div class="loginYinput">
			      <label for="yan">密码</label><input type="password" required placeholder="请输入密码" id="yan" />
			    </div>
			    <p class="mimaP"><span class="mimaL">验证码登录</span><span class="miamR">忘记密码？</span></p>
			    <div class="loginYD">
			      <button>登录</button>
			    </div>
		  	</form>
			</div>
		</div>
	</body>
  <!-- <script>
    var user=document.getElementById("tel");
    user.onblur=function(){
      if(user.value){
          user.setCustomValidity("");//现将有输入时的提示设置为空
      }else if(user.validity.valueMissing){
          user.setCustomValidity("用户名不能为空");
      };
      if(user.validity.patternMismatch){
          user.setCustomValidity("用户名只能是英文或数字，长度6到12位");
      }
    };
  </script> -->
</html>
