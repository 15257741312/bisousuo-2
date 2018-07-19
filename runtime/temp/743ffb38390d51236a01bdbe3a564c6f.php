<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\phpstudy\PHPTutorial\WWW\bisousuo-\public/../application/index\view\login\login.html";i:1530674748;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="/bisousuo-/public/static/css/login.css"/>
	<script type="text/javascript" src="/bisousuo-/public/static/js/global.js"></script>
	<script type="text/javascript" src="/bisousuo-/public/static/js/jquery.validate.js"></script>
	<script type="text/javascript" src="/bisousuo-/public/static/js/additional-methods.js"></script>
	<script type="text/javascript" src="/bisousuo-/public/static/js/jquery.form.js"></script>
	<title>登录</title>
	<style>


	</style>
	<script type="text/javascript">
        $(function(){

            $.validator.setDefaults({
                submitHandler : function(form){
                    var tel=$("input[name='tel']").val();
                    var pass=$("input[name='pass']").val();
                    var code=$("input[name='code']").val();
                    $('#form').ajaxSubmit({
                        url: "<?php echo url('login'); ?>",
                        type: "POST",
                        data: "tel=" + tel + "&pass=" + pass + "&code=" + code,
                        success: function (responseText) {
                            console.log(responseText);
                            if (responseText == 'ok') {
                                location.href = "<?php echo url('Index/index'); ?>";
                            } else {
                                console.log(responseText);
                                $(".notice").remove();
                                $(".yzm").append('<label style="display: inline-block;color: red;" class="notice">' + responseText + '</label>');
                            }
                        },
                        error : function () {
                            console.log(123);
                        }
                    })

                }

            });


            $("#form").validate({
                debug : true,
                rules : {
                    tel :{
                        required : true,
                        isMobile : true,
                    },
                    pass : 'required',
                    code : {
                        required : true,
                    }
                },
                messages : {
                    tel : {
                        required : "账号不能为空",
                        isMobile : "手机号码格式不正确",
                    },
                    pass : "密码不能为空",
                    code : {
                        required : "验证码不能为空",
                    }
                },
                errorPlacement : function(error,element){
                    error.appendTo(element.parent());
                }
            });
        })
	</script>
</head>
<body>
<div class="registe-head">
	<div class="main r-box "><img src="/bisousuo-/public/static/img/logo.png" alt=""/><span>登录</span></div>
</div>
<div class="main content">

	<div class="regis po">
		<form id="form">
		<div class="col">
			<label for="" class="label-text">手机号</label>
			<input type="text" name="tel" placeholder="请输入11位手机号码" class="phone" maxlength="11" onkeyup="value=value.replace(/[^\d]/g, '')"/>
		</div>
		<div class="col ">
			<label for="" class="label-text">验证码</label>
			<input type="text" alt="captcha" name="code" class="vcode "><?php echo captcha_img(); ?>
		</div>
		<div class="col yzm">
			<label for="" class="label-text">密码</label>
			<input name="pass" type="password" class="set-uppassword" placeholder="6-19位密码" maxlength="19"/>
			<span class="remarks" id="pwd1_remarks">请输入6-19位的密码</span>
		</div>
		<span class="submit"><input type="submit" value="提交" class="abc" name="send" /></span>
		</form>
		<a class="btn_a" href="<?php echo url('Login/regist'); ?>">注册</a><a class="btn_a" href="<?php echo url('Login/forgetPwd1'); ?>">忘记密码</a>
	</div>


</div>

<footer>
	<span class="bq main">Copyright© 2018  &nbsp;温州点对点网络科技有限公司 &nbsp;版权所有</span>
</footer>
</body>
<script type="text/javascript">

</script>
</html>
