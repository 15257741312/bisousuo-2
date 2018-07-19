<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\login\forget_password1.html";i:1531472122;}*/ ?>
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
            .vcode1{
                width: 100px !important;
            }
            .col_img img{
                width: 137px;
                height: 35px;
                margin-left: 5px;
                float: left;
            }
        }

        @media screen and (max-width: 751px){
            .vcode1{
                width: 1.6rem !important;
            }
            .col_img img{
                width: 2.7rem;
                margin-left: 0.1rem;
            }
            #code_remarks{
                position: unset;
                top : -10%;
                float: left;
                margin-left: 1.6rem;
            }
            #code1_remarks{
                position: absolute;
                top: 80%;
                left: 26%;
            }
        }

    </style>
</head>
<body>
    <div class="registe-head">
        <div class="main r-box "><a href="<?php echo url('Index/index'); ?>"><img src="/bisousuo-/public/static/img/logo.png" alt=""/></a><span>找回密码</span></div>
    </div>
    <div class="main content">
        <div class="mobilephone">
            <div class="progressBar">
                <div class="bar">
                    <div class="progressBar-item active"><span>1</span></div>
                    <div class="progressBar-item"><span>2</span></div>
                    <div class="progressBar-item"><span>3</span></div>
                </div>
                <div class="text">
                    <p>手机验证</p>
                    <p>修改密码</p>
                    <p>完成</p>
                </div>
            </div>
            <div class="container">
                <div class="col">
                    <label class="label-text">手机号</label>
                    <input type="text" placeholder="请输入11位手机号码" class="phone" maxlength="11" onkeyup="value=value.replace(/[^\d]/g, '')"/>
                    <span class="remarks remarks-pwd1" id="phone_remarks">请输入正确的手机号码</span>
                    <span class="remarks remarks-pwd1" id="phone_remarks2">该账户未注册</span>
                </div>
                <div class="col col_img">
                    <label for="" class="label-text">图形验证码</label>
                    <input type="text" alt="captcha" name="code" class="vcode1 "><?php echo captcha_img(); ?>
                    <span class="remarks" style="display: none;float: left" id="code1_remarks">图形验证码不正确</span>
                </div>
                <div  class="col">
                    <label class="label-text">验证码</label>
                    <input type="text" placeholder="请输入6位验证码" class="vcode" maxlength="6" onkeyup="value=value.replace(/[^\d]/g, '')"/>
                    <button class="bnt-code">获取验证码</button>
                    <span class="remarks remarks-pwd1" id="code_remarks">请输入收到的验证码</span>
                </div>
                <div class="next_btn">
                    <a href="javascript:void(0)" class="submit" onclick="submit()">下一步</a>
                    <a href="javascript:history.back(-1)" class="Back-btn">返回</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <span class="bq main">Copyright© 2018  &nbsp;温州点对点网络科技有限公司 &nbsp;版权所有</span>
    </footer>
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

    $('.vcode1').blur(function () {
        if($('.vcode1').val().length != 5){
            $('#code1_remarks').show();
        }else{
            $('#code1_remarks').hide();
        }
    })

    $(".phone").blur(function () {
        $('#phone_remarks2').hide();
        if(!(/^1[34578]\d{9}$/.test($('.phone').val()))){
            $('#phone_remarks').css('display','inline-block');
        }else{
            $('#phone_remarks').hide();
        }
    });

    $(".bnt-code").click(function () {
        var self=$(this);
        var tel=$(".phone").val();
        var code=$(".vcode1").val();
        if(!(/^1[34578]\d{9}$/.test($('.phone').val()))){
            $('#phone_remarks').show();
            return false;
        }

        if($(".vcode1").val().length!=5){
            $("#code1_remarks").show();
            return false;
        }

        var url="<?php echo url('Login/sendSms'); ?>?tel="+tel+"&type=forget&code="+code;
        $.ajax({
            url : url,
            type : 'POST',
            success : function (msg) {
                if(msg=="no"){
                    $("#phone_remarks2").show();
                }else if(msg=="yes"){
                    countdown(self);
                }else if(msg=="code"){
                    $("#code1_remarks").show();
                }
            },
            error : function () {
                console.log("网络连接失败");
            }
        });
    })

    function submit(){
        if(!(/^1[34578]\d{9}$/.test($('.phone').val()))){
            $('#phone_remarks').css('display','inline-block');
            return false; 
        }
        if($('.vcode').val().length != 6){
            $('#code_remarks').css('display','inline-block');
            return false;
        }
        $.ajax({
            url:"<?php echo url('Login/forgetPwd1Ajax'); ?>",
            type:"POST",
            dataType:"JSON",
            async:false,
            data:{
                phone:$('.phone').val(),
                vcode:$('.vcode').val(),
                code : $(".vcode1").val(),
            },
            success:function(data){
                if(data.info == '成功'){
                    window.location.href="<?php echo url('Login/forgetPwd2'); ?>?phone="+data.data;
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