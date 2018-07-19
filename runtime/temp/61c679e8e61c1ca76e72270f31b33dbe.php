<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/home/wwwroot/bisousuo-/public/../application/index/view/login/login.html";i:1530585650;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>首页</title>
	<link rel="stylesheet" href="/bisousuo-/public/static/css/Basics.css" />
	<script type="text/javascript" src="/bisousuo-/public/static/js/global.js"></script>
	<script type="text/javascript" src="/bisousuo-/public/static/js/common.js"></script>
	<link rel="stylesheet" type="text/css" href="/bisousuo-/public/static/css/index.css?v=2" />
</head>
<body >
	<div class="mask" ></div>
	<div class="landing" >
		<span class="landing-title">用户名密码登陆</span>
		<input type="" name="" value="手机/邮箱/用户名" class="phone" />
		<input type="" name="" value="密码" class="password" />
		<span class="landing-button">登陆</span>
		<div class="landing-count">
			<a href="javascript:;" class="wj"><span>忘记密码？</span></a>
			<a href="javascript:;" class="mf"><span>免费注册！</span></a>
		</div>
		<div class="fast-landing">
			<span class="kj">快捷方式登陆</span>
			<span class="tj">推荐</span>
		</div>
		<div class="fast-landing-xz">
			<span class="qqdl">QQ登陆</span>
			<span class="dxdl">短信登陆</span>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(function () {
        var loadmore=$("#loadmore");
        loadmore.click(function () {
            var p=$("#page_input").val();
            var keywords=$(".search").val();
            $.ajax({
                url : '<?php echo url("Index/ajax_content"); ?>',
                type : 'post',
                data : {
                    p : p,
                    keywords : keywords,
                },
                async : false,
                success : function (data) {
                    p=parseInt(p)+1;
                    $("#page_input").val(p);
                    $(".news-item:last").append(data);
                    if(data==""){
                        loadmore.html('没有更多数据了。。');
                    }
                },
                error : function () {
                    alert("网络连接失败");
                }
            })
        })
    })
</script>
</html>
