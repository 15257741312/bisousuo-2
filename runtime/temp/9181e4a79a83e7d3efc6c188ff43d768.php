<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\login\forget_password3.html";i:1530777752;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
	<script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
    <script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/registe.css"/>
    <title>找回密码</title>
</head>
<body>
    <div class="registe-head">
        <div class="main r-box "><img src="/bisousuo-/public/static/img/logo.png" alt=""/><span>找回密码</span></div>
    </div>
    <div class="main content">
        <div class="mobilephone">
            <div class="progressBar">
                <div class="bar">
                    <div class="progressBar-item"><span>1</span></div>
                    <div class="progressBar-item"><span>2</span></div>
                    <div class="progressBar-item active"><span>3</span></div>
                </div>
                <div class="text">
                    <p>手机验证</p>
                    <p>修改密码</p>
                    <p>完成</p>
                </div>
            </div>
            <div class="container">
                <div class="cg-box">
                    <img src="/bisousuo-/public/static/img/zaohmm_12.jpg" class="ico3"/>
                    <div class="po">
                        <span class="xgcg">密码修改成功！</span>
                        <a href="<?php echo url('Login/login'); ?>" class="Back-btn" style="margin:0;">返回登录</a>
                        <a href="<?php echo url('Index/index'); ?>" class="submit"style="margin:0;">返回首页</a>
                    </div>
				</div>
            </div>
        </div>
    </div>
    <footer>
        <span class="bq main">Copyright© 2018  &nbsp;温州点对点网络科技有限公司 &nbsp;版权所有</span>
    </footer>
</body>
</html>