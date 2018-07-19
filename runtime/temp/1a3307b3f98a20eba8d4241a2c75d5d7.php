<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\login\forget_password2.html";i:1531471048;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/registe.css"/>
	<script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
    <script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>找回密码</title>
    <style>
        @media screen and (min-width: 751px) {
            .remarks{
                margin-left: 130px;
            }
        }
        /*.remarks{*/
            /*width: 130px;*/
        /*}*/
    </style>
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
                    <div class="progressBar-item active"><span>2</span></div>
                    <div class="progressBar-item"><span>3</span></div>
                </div>
                <div class="text">
                    <p>手机验证</p>
                    <p>修改密码</p>
                    <p>完成</p>
                </div>
            </div>
            <div class="container">
                <input type="hidden" class="phone" value="<?php echo $phone; ?>">
                <div class="col">
                    <label class="label-text">输入新的密码</label>
                    <input type="password" class="set-uppassword" placeholder="6-19位密码" maxlength="19"/>
                    <span class="remarks remarks-pwd1" id="pwd1_remarks">请输入6-19位的密码</span>

                </div>
                <div  class="col">
                    <label class="label-text">重新输入密码</label>
                    <input type="password" class="confirm-password" placeholder="重复输入6-19位密码" maxlength="19"/>
                    <span class="remarks remarks-pwd1" id="pwd2_remarks">两次密码不一致，请确认后再试</span>
                </div>
                <div class="next_btn">
                    <a href="javascript:void(0)" class="submit" onclick="submit()">下一步</a>
                    <a href="<?php echo url('Login/login'); ?>" class="Back-btn">返回登录</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <span class="bq main">Copyright© 2018  &nbsp;温州点对点网络科技有限公司 &nbsp;版权所有</span>
    </footer>
</body>
<script type="text/javascript">
    $(".confirm-password").blur(function () {
        if($('.set-uppassword').val() != $('.confirm-password').val() || $('.confirm-password').val() == '' || $('.confirm-password').val().length < 6 || $('.confirm-password').val().length > 19){
            $('#pwd2_remarks').css('display','inline-block');
        }else{
            $('#pwd2_remarks').hide();
        }
    })

    function submit(){
        if($('.set-uppassword').val() == '' || $('.set-uppassword').val().length < 6 || $('.set-uppassword').val().length > 19){
            $('#pwd1_remarks').css('display','inline-block');
            return false;
        }
        if($('.set-uppassword').val() != $('.confirm-password').val() || $('.confirm-password').val() == '' || $('.confirm-password').val().length < 6 || $('.confirm-password').val().length > 19){
            $('#pwd2_remarks').css('display','inline-block');
            return false;
        }
        $.ajax({
            url:"<?php echo url('Login/forgetPwd2Ajax'); ?>",
            type:"POST",
            dataType:"JSON",
            async:false,
            data:{
                phone:$('.phone').val(),
                pwd1:$('.set-uppassword').val(),
                pwd2:$('.confirm-password').val(),
            },
            success:function(data){
                if(data == '成功'){
                    window.location.href="<?php echo url('Login/forgetPwd3'); ?>";
                }else{
                    swal(data);
                }
            },
            error:function(data){
                swal('警告','网络繁忙，请稍后再试！','error');
            },
        });
    }
</script>
</html>