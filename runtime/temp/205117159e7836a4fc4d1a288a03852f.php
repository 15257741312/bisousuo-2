<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/home/wwwroot/bisousuo-/public/../application/index/view/login/registe.html";i:1530084447;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="/bisousuo-/public/static/css/registe.css"/>
    <script type="text/javascript" src="/bisousuo-/public/static/js/global.js"></script>
    <script type="text/javascript" src="/bisousuo-/public/static/js/common.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>注册</title>
</head>
<body>
    <div class="registe-head">
        <div class="main r-box "><img src="/bisousuo-/public/static/img/logo.png" alt=""/><span>注册</span></div>
    </div>
    <div class="main content">
        <div class="right-box fr">
            <img src="/bisousuo-/public/static/img/logo.png" width="156px" height="156px" alt=""/>
            <div class="text ico1"><span>已有账号，</span><a href="login.html" title="立即登录">立即登录</a></div>
            <div class="text ico2"><span>我</span><a href="<?php echo url('Login/forgetPwd1'); ?>" title="忘记密码">忘记密码</a><span>了！！</span></div>
        </div>
        <div class="regis po">
            <div class="col">
                <label for="" class="label-text">手机号</label>
                <input type="text" placeholder="请输入11位手机号码" class="phone" maxlength="11" onkeyup="value=value.replace(/[^\d]/g, '')"/>
                <span class="remarks" id="phone_remarks">请输入正确的手机号码</span>
            </div>
            <div class="col">
                <label for="" class="label-text">验证码</label>
                <input type="text" placeholder="4位验证码" class="vcode" maxlength="6" onkeyup="value=value.replace(/[^\d]/g, '')"/>
                <button class="bnt-code" onclick="common.bntCode(this);">获取验证码</button>
                <span class="sendout" style="display:none;margin-left: -106px;">120秒后重发</span>
                <span class="remarks" id="code_remarks">请输入收到的验证码</span>
            </div>
            <div class="col">
                <label for="" class="label-text">设置密码</label>
                <input type="password" class="set-uppassword" placeholder="6-19位密码" maxlength="19"/>
                <span class="remarks" id="pwd1_remarks">请输入6-19位的密码</span>
            </div>
            <div class="col">
                <label for="" class="label-text">确认密码</label>
                <input type="password" class="confirm-password" placeholder="重复输入6-19位密码" maxlength="19"/>
                <span class="remarks" id="pwd2_remarks">两次密码不一致，请确认后再试</span>
            </div>
            <div class="zc-item">
                <input type="checkbox"  id="dx"/>
                <label for="dx" class="ty">
                    <span>我已同意并遵守</span>
                    <a href="javascript:;" class="ys">《点对点用户服务协议》</a>
                    <div class="ys-note">
                    </div>
                </label>
            </div>
            <span id="dx_remarks">请确认同意《点对点用户服务协议》后再进行注册</span>
            <span class="submit">注册</span>
        </div>
        
    </div>
    <footer>
        <span class="bq main">Copyright© 2018  &nbsp;温州点对点网络科技有限公司 &nbsp;版权所有</span>
    </footer>
</body>
<script type="text/javascript">
    $('.submit').click(function(){
        if(!(/^1[34578]\d{9}$/.test($('.phone').val()))){
            $('#phone_remarks').show();
            return false; 
        }
        if($('.vcode').val().length != 4){
            $('#code_remarks').show();
            return false;
        }
        if($('.set-uppassword').val() == '' || $('.set-uppassword').val().length < 6 || $('.set-uppassword').val().length > 19){
            $('#pwd1_remarks').show();
            return false;
        }
        if($('.set-uppassword').val() != $('.confirm-password').val() || $('.confirm-password').val() == '' || $('.confirm-password').val().length < 6 || $('.confirm-password').val().length > 19){
            $('#pwd2_remarks').show();
            return false;
        }
        if(!$('#dx').is(':checked')){
            $('#dx_remarks').show();
            return false;
        }
        $.ajax({
            url:"<?php echo url('Login/registAjax'); ?>",
            type:"POST",
            dataType:"JSON",
            async:false,
            data:{
                phone:$('.phone').val(),
                vcode:$('.vcode').val(),
                pwd1:$('.set-uppassword').val(),
                pwd2:$('.confirm-password').val(),
            },
            success:function(data){
                if(data == '注册成功'){
                    swal(data,'2s后自动跳转登陆','success');
                }else{
                    swal('警告',data,'error');
                }
            },
            error:function(data){
                swal('警告','网络繁忙，请稍后再试！','error');
            },
        });
    })
</script>
</html>
