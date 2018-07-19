<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\info\mywd_ask.html";i:1531400852;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\head.html";i:1531290789;s:80:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\myinfo.html";i:1531401935;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\foot.html";i:1531289358;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>个人中心</title>
    <script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
    <script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
    <link rel="stylesheet" href="/bisousuo-2/public/static/css/Basics.css" />
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/myguba.css" />
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

</div>
<div class="headinfo_wrap-bg">
    <div class="hede-wrap"></div>
    <div class="userinfo-wrap">
        <div class="userinfo-wrap-top">
    <img src="/bisousuo-2/public/static/uploads/<?php echo $mem['headimgurl']; ?>" />
    <!--<span class="copy">编辑资料</span>-->
    <div class="user_name-box">
        <span class="user_name"><?php echo $mem['username']; ?></span><span class="user_name2">用户名：<span><?php echo $mem['username']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>吧龄：<?php echo $mem['age']; ?>年</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>发帖：<?php echo $mem['post']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>提问：<?php echo $mem['ask_c']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>吐槽：<?php echo $mem['spit']; ?></span></span>
    </div>
    <!--<div class="userinfo_shortcut">-->
    <!--<a href="#">服务中心</a>-->
    <!--<a href="#">我在股吧</a>-->
    <!--<a href="#">我的i股吧</a>-->
    <!--</div>-->
</div>
<div class="ihome_nav_wrap">
    <a href="<?php echo url('info/myindex'); ?>" class="tbnav_tab_inner <?php if($action=='myindex'): ?>active-inhome ico-img1 <?php endif; ?>">我的主页</a>
    <a href="" class="tbnav_tab_inner ico-img2">股吧</a>
    <a href="<?php echo url('info/mywd_ask'); ?>"  class="tbnav_tab_inner <?php if($action=='mywd_ask' ||  $action=='mywd_answer'): ?>active-inhome ico-img3<?php endif; ?> ">问答</a>
    <a href="#" class="tbnav_tab_inner ico-img4">吐槽</a>
</div>
        <div class="reviews-content clearfix">
            <div class="left-box">
                <div class="left-box">
                    <div class="reply">
                        <div class="myguba">
                            <span class="hot">我的股吧</span>
                            <span>怎么发帖</span>
                        </div>
                        <span class="hot">热门动态</span>
                        <div class="reply clearfix">
                            <div class="postcontent clearfix">
                                <img src="images/grzhuye_tou.jpg"  width="43px" height="43px" class="tc_guimg"/>
                                <div class="mation"><span>股吧</span><span>2018-06-08</span>
                                    <div class="mation-title">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <div class="mation-text">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <img src="images/grzhuye-tu.jpg"/>
                                    <div class="answer">点对点科技</div>
                                </div>
                            </div>
                            <div class="postcontent clearfix">
                                <img src="images/grzhuye_tou.jpg"  width="43px" height="43px" class="tc_guimg"/>
                                <div class="mation"><span>股吧</span><span>2018-06-08</span>
                                    <div class="mation-title">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <div class="mation-text">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <div class="answer">点对点科技</div>
                                </div>
                            </div>
                            <div class="postcontent clearfix">
                                <img src="images/grzhuye_tou.jpg"  width="43px" height="43px" class="tc_guimg"/>
                                <div class="mation"><span>股吧</span><span>2018-06-08</span>
                                    <div class="mation-title">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <div class="mation-text">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <div class="answer">点对点科技</div>
                                </div>
                            </div>
                            <div class="postcontent clearfix">
                                <img src="images/grzhuye_tou.jpg"  width="43px" height="43px" class="tc_guimg"/>
                                <div class="mation"><span>股吧</span><span>2018-06-08</span>
                                    <div class="mation-title">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <div class="mation-text">我今年在龙华兴华培训学英语，咨询的时候他们会什么都说的很好，可等我交完钱后</div>
                                    <div class="answer">点对点科技</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ringth-box">
                <div class="recemtly"><span>最近来访</span><img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                </div>
                <div class="follow"><div>关注我的人<span>（8）</span></div>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                    <img src="images/touxiang.jpg" width="43px" height="43px"/>
                </div>

            </div>
        </div>
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

</body>
<script src="../Basics/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../Basics/js/basics.js" type="text/javascript" charset="utf-8"></script>
<script src="../Basics/js/index.js" type="text/javascript" charset="utf-8"></script>

</html>