<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\info\info.html";i:1531477516;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\head.html";i:1531290789;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\foot.html";i:1531289358;}*/ ?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
    <script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
    <link rel="stylesheet" href="/bisousuo-2/public/static/css/Basics.css" />
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/info.css" />
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/magic-input.min.css" />
    <link href="/bisousuo-2/public/static/css/bootstrap-fileinput.css" rel="stylesheet">
    <script src="/bisousuo-2/public/static/js/bootstrap-fileinput.js"></script>
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/user-info.css" />
    <link href="/bisousuo-2/public/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bisousuo-2/public/static/css/style.css" rel="stylesheet">
    <!-- CSS公共部分 结束 -->

    <link href="/bisousuo-2/public/static/css/crowdfunding.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>个人中心</title>
    <style type="text/css">
        .basic-info{
            padding: 0px !important;
            width: 90%;
        }

        @media screen and (min-width: 750px){
            .user-information{
                margin-top: 40px;
            }
            .nav_span{
                display: none;
            }
            .po{
                width: 80%;
            }
            .userInfo-content .col span{
                width: auto;
            }
        }
        @media screen and (max-width: 750px){
            .nav_span{
                display: block;
                margin: 0 auto;
                width: 90%;
                text-align: center;
            }
            .nav_span span{
                font-size: 0.3rem;
                color: #F29602;
                display: inline-block;
                width: 18%;
            }
        }

        .content-right ul a{
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="head">
    <div class="top">
    <div class="main">
        <?php if(\think\Session::get('tel')): ?>
        <a id="setting" href="<?php echo url('Login/loginout'); ?>" class="fr" style="font-weight: bold;" >退出</a>
        <?php endif; ?>
        <div class="top-menu" style="display:none;">
            <a href="#" target="_blank"> 搜索设置 </a>
            <a href="#" target="_blank"> 高级搜索 </a>
            <a href="#" target="_blank"> 关闭预测 </a>
            <a href="#" target="_blank"> 搜索历史 </a>
        </div>
        <?php if(\think\Session::get('tel')): ?>
        <a id="login" href="<?php echo url('Info/index'); ?>" class="fr" style="font-weight: bold;" >个人中心</a>
        <?php else: ?>
        <a id="login" href="javascript:;" class="fr" style="font-weight: bold;" onclick="common.poplogin();">登录</a>
        <?php endif; ?>
        <div class="po">
            <a href="<?php echo url('Index/index'); ?>">首页</a>
            <a href="<?php echo url('Baike/bklist'); ?>">百科</a>
            <a href="<?php echo url('News/newsList'); ?>">资讯</a>
            <a href="<?php echo url('Guba/guba'); ?>">股吧</a>
            <a href="<?php echo url('Askanswer/index'); ?>">问答</a>
            <a href="<?php echo url('Spit/spitList'); ?>">吐槽 </a>
            <a href="#">教程</a>
        </div>
    </div>
</div>

    <div class="main">
        <div class="search-box">
            <a href="index.html" class="logo fl"><img src="/bisousuo-/public/static/img/search_logo.png" alt="" /></a>
            <div class="search">
                <form action="<?php echo url('Index/index'); ?>" method="post">
                    <input type="submit" style="cursor: pointer" value="立即搜索" class="btn" />
                    <div class="po">
                        <input type="text" class="txt" value="" name="keywords"/>
                    </div>
                </form>
            </div>
            <!-- <input type="button" value="全站搜索" class="btn" /> -->
        </div>
    </div>
</div>
<!-- 核心 开始 -->
<div class="container border1 nopadding margin10" style="width: 1200px;">
    <div id="vertical_navigation" class="col-lg-3 background831312 nopadding">
        <div class="dead_pic"><img src="img/member_center/nopic.jpg.png"><br>
            <span class="username">用户名</span></div>
        <div class="usertype">用户类型： 跟投人<br>
            会员等级：<img style="margin-right:0px;" src="img/member_center/star.png"></img> <img style="margin-right:0px;" src="img/member_center/xx2.png"></img> <img style="margin-right:0px;" src="img/member_center/xx2.png"></img> <img style="margin-right:0px;" src="img/member_center/xx2.png"></img> <img style="margin-right:0px;" src="img/member_center/xx2.png"></img> </div>
        <div class="menu">
            <div class="menu_title"> 个人信息修改 </div>
            <div class="menu_list">
                <ul class="list-unstyled">
                    <li id="listClick1" class="menu_list_on" onClick="listClick(1)"><img src="img/member_center/left_icon_1.png"> 基本信息修改</li>
                    <li id="listClick2" class="" onClick="listClick(2)"> <img src="img/member_center/left_icon_2.png"> 头像修改</li>
                    <li id="listClick4" class="" onClick="listClick(4)"> <img src="img/member_center/left_icon_3.png"> 密码修改</li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <div class="menu_title"> 贴吧模块 </div>
            <div class="menu_list">
                <ul class="list-unstyled">
                    <li id="listClick6" class="" onClick="listClick(6)"><img src="img/member_center/left_icon_6.png"> 我的帖子</li>
                    <li id="listClick7" class="" onClick="listClick(7)"> <img src="img/member_center/left_icon_6.png"> 我的回复</li>
                    <li id="listClick8" class="" onClick="listClick(8)"> <img src="img/member_center/left_icon_6.png"> 我的关注</li>
                    <li id="listClick9" class="" onClick="listClick(9)"> <img src="img/member_center/left_icon_6.png"> 我的贴吧</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <iframe name="left" id="crowdfunding_iframe" src="crowdfunding.center/my_info.html" frameborder="false" scrolling="no" style="border:none;" width="100%" height="1045" allowtransparency="true"></iframe>
    </div>
</div>


<footer class="nav-footer">
    <a href=""><span>首页</span></a>
    <a href=""><span>百科</span></a>
    <a href=""><span>资讯</span></a>
    <a href=""><span>股吧</span></a>
    <a href=""><span>问答</span></a>
    <a href=""><span>股吐槽</span></a>
    <a href="" style="border-right: none;"><span>教程</span></a>
    <span class="bq ">Copyright© 2018  &nbsp;&nbsp;&nbsp;温州点对点网络科技有限公司 &nbsp;&nbsp;&nbsp;版权所有</span>
</footer>
<style>
    #yzm{
        display: inline-block;
        float: left;
        width: 100px;
        margin-top: 0px;
        background: url('/bisousuo-2/public/static/img/yzm.png') no-repeat 12px center;
    }

    .error_input{
        border : 1px solid red !important;
    }
</style>
<div class="mask" style="display: none;"></div>
<div class="landing" style="display: none;">
    <span class="close" onclick="common.hidemask();"></span>
    <span class="landing-title" >用户名密码登陆</span>
    <p class="error_p" style="color: red;display: none">用户名或密码错误</p>
    <input type="text" name="" placeholder="请输入手机号码" value="" class="phone " />
    <input type="password" name="" placeholder="密码" value="" class="password" />
    <span style="" class="landing-button">登陆</span>
    <div class="landing-count">
        <a href="<?php echo url('Login/forgetPwd1Ajax'); ?>" class="wj"><span>忘记密码？</span></a>
        <a href="<?php echo url('Login/regist'); ?>" class="mf"><span>免费注册！</span></a>
    </div>
    <input type="hidden" class="action" value="<?php echo request()->action(); ?>">
    <!--<div class="fast-landing">-->
        <!--<span class="kj">快捷方式登陆</span>-->
        <!--<span class="tj">推荐</span>-->
    <!--</div>-->
    <!--<div class="fast-landing-xz">-->
        <!--<span class="qqdl">QQ登陆</span>-->
        <!--<span class="dxdl">短信登陆</span>-->
    <!--</div>-->
    <script src="/bisousuo-2/public/static/js/jquery-2.0.3.min.js"></script>
</div>

<script>
    $('.phone').blur(function () {
        if(!/^1[34578]\d{9}$/.test($('.phone').val())){
            $(this).addClass("error_input");
        }else{
            $(this).removeClass("error_input");
        }
    })

    $("#yzm").blur(function () {
        if($("#yzm").val()!=6){
            $(this).removeClass("error_input");
        }else{
            $(this).addClass("error_input");
        }
    })

    $(".password").blur(function () {
        if($(".password").val()==""){
            $(this).addClass("error_input");
        }else{
            $(this).removeClass("error_input");
        }
    })

    $(".password").keyup(function () {
        if($(".password").val()==""){
            $(this).addClass("error_input");
        }else{
            $(this).removeClass("error_input");
        }
    })



    $(".landing-button").click(function () {
        if(!/^1[34578]\d{9}$/.test($('.phone').val())){
            $(this).addClass("error_input");
            return false;
        }

        if($(".password").val()==""){
            $(this).addClass("error_input");
            return false;
        }

        $.ajax({
            url : '<?php echo url("Login/login"); ?>',
            data : {
                tel : $(".phone").val(),
                pass : $(".password").val(),
            },
            async : false,
            success : function (msg) {
                var action=$(".action").val();
                if(msg=='ok'){
                    var url=location.href;
                    var url_arr=url.split("?");
                    var param="?"+url_arr[1];
                    top.location.href='<?php echo url("'+action+'"); ?>'+param;
                }else{
                    $(".error_p").show();
                }

            },
            error : function (res) {
                swal('警告','网络连接失败','error');
                //swal('警告',data,'error');
            }
        })
    })
</script>

<script src="js/layer/layer.js" type="text/javascript"></script>
<script type="text/javascript">
    // function login(){
    //     layer.open({
    //       type: 1,
    //       //skin: 'layui-layer-demo', //样式类名
    //       closeBtn: 0, //不显示关闭按钮
    //       area: ['360px','440px'],
    //       title: false, //不显示标题
    //       anim: 0,
    //       scrollbar: false,
    //       shadeClose: true, //开启遮罩关闭
    //       content: $("#login-form"),
    //     });
    // };
</script>

<script>
    $(function () {
        $(".msgbtn").click(function () {
            var img=$(".fileinput-preview img").attr("src");
            var username=$("input[name='username']").val();
            var sex=$("input[name='sex']:checked").val();
            var qq=$("input[name='qq']").val();
            $.ajax({
                url : "<?php echo url('Info/updateInfo'); ?>",
                data : {
                    img : img,
                    username : username,
                    sex : sex,
                    qq : qq,
                },
                type : 'POST',
                async : false,
                success : function (msg) {
                    if(msg=='用户名已存在'){
                        swal('用户名已存在','','error');
                    }else{
                        swal({
                            title: "提示",
                            text: "修改成功",
                            timer: 2000,
                            showConfirmButton: false
                        });
                        if(msg) $('.img-portrait').attr('src',"/bisousuo-2/public/static/uploads/"+msg);
                        window.location.reload();
                    }

                },
                error : function () {
                    swal('警告','图片最大为2M','error');
                }
            })
        })
    })
</script>
</body>
</html>
