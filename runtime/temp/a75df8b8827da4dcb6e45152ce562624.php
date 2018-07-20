<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/mobile\view\my\index.html";i:1531994843;s:81:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\mobile\view\common\footer.html";i:1531909912;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>我的</title>
		<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/api.css"/>
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/bi_style.css"/>
		<script type="text/javascript" src="/bisousuo-2/public/static/js/jquery-1.9.1.min.js"></script>
		<style type="text/css">
			.ios{height: 20px;background-color: #fff;position: fixed;top: 0;width: 100%;}
		</style>
		
	</head>
	<body class="MyBody">
		<input type="hidden" id="usertel" value="<?php echo \think\Session::get('tel'); ?>" name="">
		<div id="wrap" class="flex-wrap flex-vertical">
			<div id="ios"></div>
			<div id="main" class="flex-con">
	  		<div class="myTop">
	        <div class="myShezhi"><a class="islogin" href="<?php echo url('My/setting'); ?>"><img src="/bisousuo-2/public/static/mobile/image/shezhi.png" alt="设置"></a></div>
	        <?php if(\think\Session::get('tel')): ?>
	        <dl class="myTouxaing" id="userON">
	          <dt><img src="/bisousuo-2/public/static/uploads/<?php echo $userInfo['headimgurl']; ?>" alt="头像"></dt>
	          <dd>
	            <h3><?php echo $userInfo['username']; ?></h3>
	            <p>资料完善度<?php echo $userInfo['per']; ?>%</p>
	          </dd>
	        </dl>
	        <?php else: ?>
			<dl class="myTouxaing" id="userDOWN">
	          <dt class="huanying">欢迎来到币搜索</dt>
	          <dd>
	            <a href="<?php echo url('Login/login'); ?>"><div class="denglu">登录</div></a>
	            <a href="<?php echo url('Login/registe'); ?>"><div class="zhuce">注册</div></a>
	          </dd>
	        </dl>
	        <?php endif; ?>
	        <div class="myTopBot">
	          <dl>
	            <dd>积分</dd>
	            <dd>1000</dd>
	          </dl>
	          <dl>
	            <dd>等级</dd>
	            <dd>9</dd>
	          </dl>
	          <dl>
	            <dd>邀请好友</dd>
	            <dt><img src="/bisousuo-2/public/static/mobile/image/fenxiang2.png" alt="邀请好友"></dt>
	          </dl>
	        </div>
	  		</div>
	      <div class="myBot">
	        <ul>
	          <a href="#" class="myAborder islogin"><li><img src="/bisousuo-2/public/static/mobile/image/mytiezi.png" alt="我的帖子">我的帖子</li></a>
	          <a href="#" class="islogin"><li><img src="/bisousuo-2/public/static/mobile/image/myhuifu.png" alt="我的回复">我的回复</li></a>
	        </ul>
	        <ul>
	          <a href="#" class="myAborder islogin"><li><img src="/bisousuo-2/public/static/mobile/image/mytiwen.png" alt="我的提问">我的提问</li></a>
	          <a href="#" class="islogin"><li><img src="/bisousuo-2/public/static/mobile/image/myhuida.png" alt="我的回答">我的回答</li></a>
	        </ul>
	        <ul>
	          <a href="#" class="islogin"><li><img src="/bisousuo-2/public/static/mobile/image/mytucao.png" alt="我的吐槽">我的吐槽 </li></a>
	        </ul>
	      </div>
			</div>
			<div id="footer" class="border-t">
        <ul class="flex-wrap" >
            <a href="<?php echo url('Index/index'); ?>"><li class="flex-con <?php if($controller=='Index'): ?>active<?php endif; ?>" >首页</li></a>
            <a href="<?php echo url('Biba/index'); ?>"><li class="flex-con <?php if($controller=='Biba'): ?>active<?php endif; ?>" >币吧</li></a>
            <a href="<?php echo url('Wenda/index'); ?>"><li class="flex-con <?php if($controller=='Wenda'): ?>active<?php endif; ?>" >问答</li></a>
            <a href="<?php echo url('My/index'); ?>"><li class="flex-con <?php if($controller=='My'): ?>active<?php endif; ?>" >我的</li></a>
        </ul>
    </div>
		</div>
		<script>
		$(function(){
			//苹果系统顶部状态栏兼容
			var u = navigator.userAgent, app = navigator.appVersion;
	    	var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
		    if (isIOS) {
		　　　　//这个是ios操作系统
				$('#ios').addClass('ios');
				$('#main').css('marginTop','20px');
		    }

		    $(".islogin").click(function(){
		    	if($("#usertel").val()==""){
		    		return false;
		    	}
		    })
		});
		</script>
	</body>
</html>
