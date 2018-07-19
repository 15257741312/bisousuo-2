<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/mobile\view\login\registe.html";i:1531989700;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=no"/>
    	<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>注册</title>
		<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/bi_style.css"/>
		<link rel="stylesheet" type="text/css" href="../css/bi_style.css"/>
		<script type="text/javascript" src="/bisousuo-2/public/static/js/jquery-1.9.1.min.js"></script>
		<style type="text/css">
			.sendout{
				 background-color: #a6a6a6;
			}
			.huoquuanzhengma{
				outline: none;
    			border: none;
			}    
		</style>
	</head>
	<body>
		<div id="wrap" class="flex-wrap flex-vertical">
			<!--top-->
			<header id="aui-header" class="baike2Top" style="position:fixed;top:0;background-color:#fff;z-index: 999;">
				<a href="<?php echo url('My/index'); ?>"><img src="/bisousuo-2/public/static/mobile/image/baike_04_03.jpg"/></a>
	      <span>注册</span>
			</header>
			<!--内容-->
			<div id="main" class="flex-con" style="margin-top: 70px;">
			    <section class="loginYLogo"><img src="/bisousuo-2/public/static/mobile/image/logo.jpg" alt="Logo"></section>
			    <div class="loginYinput">
			        <label for="tel">+86</label><input type="tel" name="tel" id="tel" required placeholder="请输入手机号码"/>
			    </div>
			    <p class="yanzheng"><span class="shoujihao"></span></p>
			    <div class="loginYinput">
			        <label for="yan">验证码</label><input type="text" name="code" required placeholder="请输入验证码" id="yan" /><button class="huoquuanzhengma">获取验证码</button>
			    </div>
			    <p class="yanzheng"><span class="yanzhengma"></span></p>
			    <div class="loginYinput">
			        <label for="pwd">密码</label><input type="password" name="pass" class="pass1" required placeholder="请输入6-18位密码" id="pwd" />
			    </div>
			    <p class="yanzheng"><span class="mima1"></span></p>
			    <div class="loginYinput">
			        <label for="pwdt">确认密码</label><input type="password" required class="pass2" placeholder="请再次输入6-18位密码" id="pwdt" />
			    </div>
			    <p class="yanzheng"><span class="mima2"></span></p>
			    <div class="loginYD">
			        <button class="reg">注册</button>
			    </div>
			    <p class="registerXy">已阅读并同意及遵守<span>《点对点用户服务协议》</span></p>
			</div>
		</div>
	</body>
  <script type="text/javascript">
  	function countdown(obj){
        var wait = 120,myCountDown;
        if(wait==120){
            var timeflag = setInterval(function(){
                if(wait>0){
                    $(obj).text(wait+'秒后重发');
                    $(obj).attr('disabled','disabled').addClass("sendout");
                    wait--;
                }else {
                    wait=120;
                    $(obj).text('重新发送验证码');
                    $(obj).removeAttr('disabled').removeClass("sendout");
                    clearInterval(timeflag);
                }
            },1000);
        }
    }
  	$(function(){
  		$("#tel").blur(function(){
  			if((/^1[34578]\d{9}$/.test($("#tel").val()))){
  				$('.shoujihao').text("");
  			}
  		})

  		$("#yan").blur(function(){
  			if($("input[name='code']").val().length==6){
  				$('.yanzhengma').text("");
  			}
  		})

  		$("#pwd").blur(function(){
  			if($("#pwd").val().length>=6 && $("#pwd").val().length<=18){
  				$('.mima1').text("");
  			}
  		})

  		$("#pwdt").blur(function(){
  			if($("pwdt").val()!=""){
  				$(".mima2").text("");
  			}
  		})

  		$(".huoquuanzhengma").click(function(){
  			var self=$(this);
  			var tel=$("#tel").val();
  			if(tel=="") {
  				$('.shoujihao').text("手机号未填写");
  				return false;
  			}
  			if(!(/^1[34578]\d{9}$/.test(tel))){
	  			$('.shoujihao').text("手机号格式不正确");
	  			return false;
	  		}
  		
  			
  			var code=$("input[name='code']").val();
	  		$.ajax({
	  			url : "<?php echo url('Login/sendSms'); ?>",
	  			data : {
	  				tel : tel,
	  				type : 'registe',		//验证是注册提交还是忘记密码提交
	  			},
	  			type : 'post',
	  			async : false,	
	  			success : function(res){
	  				if(res=="no"){
	  					$('.shoujihao').text("该账号已被注册");
	  					return false;
	  				}else if(res=="yes"){
	  					countdown(self);
	  				}
	  			},
	  			error : function(msg){
	  				$('.shoujihao').text("网络连接失败");
	  			}
	  		})
	  	});

	  	$(".reg").click(function(){
	  		if(!/^1[34578]\d{9}$/.test($("#tel").val())){
	  			$('.shoujihao').text("手机号填写不正确");
	  			return false;
	  		}
	  		if($("input[name='code']").val().length!=6){
	  			$('.yanzhengma').text("验证码格式不正确");
	  			return false;
	  		}
	  		var pass1=$(".pass1").val();
	  		var pass2=$(".pass2").val();
	  		if(pass1.length<6 || pass1.length>18){
	  			$('.mima1').text("请输入6-18位密码");
	  			return false;
	  		}

	  		if(pass1!=pass2){
	  			$('.mima2').text("两次密码不一致");
	  			return false;
	  		}

	  		$.ajax({
	  			url : '<?php echo url("Login/registe"); ?>',
	  			type : 'post',
	  			data : {
	  				tel : $("input[name='tel']").val(),
	  				code : $("input[name='code']").val(),
	  				pass : $("input[name='pass']").val(),
	  			},
	  			async : false,
	  			success : function(res){
	  				if(res==1){
	  					$('.shoujihao').text("该账号已被注册");
	  				}else if(res==2){
	  					$('.yanzhengma').text("验证码不正确");
	  				}else if(res==3){
	  					$('.shoujihao').text("网络错误,请重新注册");
	  				}else if(res==4){
	  					//注册成功
	  					location.href="<?php echo url('Login/login'); ?>";
	  				}
	  			},
	  			error : function(msg){
	  				$('.shoujihao').text("网络连接失败");
	  			}
	  		})
	  	})

  	})
  	
  </script>

</html>
