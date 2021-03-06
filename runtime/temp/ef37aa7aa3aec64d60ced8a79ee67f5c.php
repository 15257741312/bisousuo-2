<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/mobile\view\login\login.html";i:1531992643;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/bi_style.css"/>
		<script type="text/javascript" src="/bisousuo-2/public/static/js/jquery-1.9.1.min.js"></script>
	</head>
	<body>
		<div id="wrap" class="flex-wrap flex-vertical">
			<!--top-->
			<header id="aui-header" class="baike2Top" style="position:fixed;top:0;">
				<a href="javascript:history.go(-1)"><img src="/bisousuo-2/public/static/mobile/image/baike_04_03.jpg"/></a>
		    <span>登录</span>
			</header>
			<!--内容-->
			<div id="main" class="flex-con" style="margin-top: 70px;">
			  <section class="loginYLogo"><img src="/bisousuo-2/public/static/mobile/image/logo.jpg" alt="Logo"></section>
			    <div class="loginYinput">
			      <label for="tel">+86</label><input type="tel" required placeholder="请输入手机号码" pattern="^[0-9]{11}$" id="tel" oninvalid="setCustomValidity('请输入您的手机号');" oninput="setCustomValidity('');" />
			    </div>
			    <p class="yanzheng"><span class="shoujihao"></span></p>
			    <div class="loginYinput">
			      <label for="yan">密码</label><input type="password" required placeholder="请输入密码" id="yan" />
			    </div>
			    <p class="yanzheng"><span class="mima"></span></p>
			    <p class="mimaP"><span class="mimaL">验证码登录</span><span class="miamR">忘记密码？</span></p>
			    <div class="loginYD">
			      <button class="log">登录</button>
			    </div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(function(){
		$("#tel").blur(function(){
			if(/^1[34578]\d{9}$/.test(tel)){
				$('.shoujihao').text("");
			}
		})
		$("#yan").blur(function(){
			if($("#yan").val()!=""){
				$('.mima').text("");
			}
		})

		var flag=1;
		$(".log").click(function(){
			if(flag==1){
				
				var tel=$("#tel").val();
				var pass=$("#yan").val();
				if(!/^1[34578]\d{9}$/.test(tel)){
					$('.shoujihao').text("手机格式不正确");
					return false;
				}

				if(pass==""){
					$('.mima').text("密码不能为空");
					return false;
				}
				flag=2;
				$.ajax({
					url : "<?php echo url('Login/login'); ?>",
					data : {
						tel : tel,
						pass : pass,
					},
					async : false,
					success : function(res){
						flag=1;
						if(res==1){
							$('.mima').text("账号或密码错误");
						}else if(res==2){
							location.href='<?php echo url("Index/index"); ?>';
						}
					},
					error : function(msg){
						flag=1;
						$('.mima').text("网络连接错误");
					},
				})
			}
		})
	})
</script>
