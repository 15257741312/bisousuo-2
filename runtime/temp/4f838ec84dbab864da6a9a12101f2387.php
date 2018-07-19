<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\askanswer\index.html";i:1531383913;s:42:"../application/index/view/common/head.html";i:1531290789;s:83:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\askanswer.html";i:1531383307;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\foot.html";i:1531289358;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>问答专栏</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="/bisousuo-2/public/static/css/Basics.css" />
        <script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
        <script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
        <script src="/bisousuo-2/public/static/js/dist/easySlider.js"></script>
        <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/index.css?v=2" />
        <link rel="stylesheet" href="/bisousuo-2/public/static/css/sow.css">
        <link rel="stylesheet" href="/bisousuo-2/public/static/css/pagelist.css">

        <style>
            .con{
                height: 100%;
                margin: 0 auto;
            }
            .con a{
                color:  #F29602;
            }
            .nav-footer{
                clear: both;
            }
            @media (min-width : 751px) {
                .con{
                    width: 1200px;
                    padding: 20px 10px;
                    font-size: 18px;
                }
                .con a:hover{
                    text-decoration: underline !important;
                }
                .con ul.con_ul{

                }
                .con ul.con_ul li{
                    margin-bottom: 15px;
                }
                .con ul.con_ul li > a{
                    display: block;
                    float: left;
                    margin-bottom: 10px;
                }
                .con ul.con_ul li span{
                    float: right;
                    color: #999;
                    font-size: 14px;
                    width: 70px;
                }
                .con ul.con_ul li hr{
                    clear: both;
                    border : 1px solid #eeeeee;
                }
            }
            @media (max-width : 751px) {
                .con{
                    width: 7rem;
                    padding: 20px 10px;
                    font-size: 0.4rem;
                }
                .con a:hover{
                    text-decoration: underline !important;
                }
                .con ul.con_ul{

                }
                .con ul.con_ul li{
                    margin-bottom: 0.4rem;
                }
                .con ul.con_ul li > a{
                    display: block;
                    float: left;
                    margin-bottom: 0.3rem;
                }
                .con ul.con_ul li span{
                    clear: left;
                    float: right;
                    color: #999;
                    font-size: 0.3rem;
                    width: 1.5rem;
                }
                .con ul.con_ul li hr{
                    clear: both;
                    border : 1px solid #eeeeee;
                }
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
        <a href='javascript:;' class="logo fl"><img src="/bisousuo-/public/static/img/logo.png" alt="" /></a>
        <div class="search">
            <input type="button" value="筛选" class="btn filterAsk" style="cursor: pointer" />
            <div class="po">
                <input type="text" class="txt" name="keywords" value="<?php echo $keywords; ?>" />
            </div>
        </div>
        <input type="button" value="发起提问" class="btn beginAsk" style="cursor: pointer" />
    </div>
</div>
<script>
    $(function () {
        $(".beginAsk").click(function () {
            location.href='<?php echo url("Askanswer/ask"); ?>';
        });
        $(".filterAsk").click(function () {
            location.href='<?php echo url("Askanswer/index"); ?>?keywords='+$("input[name='keywords']").val();
        });
        $(".logo").click(function () {
            location.href='<?php echo url("Askanswer/index"); ?>?keywords='+$("input[name='keywords']").val();
        });
    })
</script>
        </div>
        <div class="con">
            <ul class="con_ul">
                <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "没有更多数据了。。。" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('Askanswer/askDetail'); ?>?id=<?php echo $vo['id']; if($keywords): ?>&keywords=<?php echo $keywords; endif; ?>"><?php echo $vo['title']; ?></a><span ><?php echo $vo['strtime']; ?></span><span><?php echo $vo['commend_num']; ?>回复　|　</span><hr></li>
                <?php endforeach; endif; else: echo "没有更多数据了。。。" ;endif; ?>
            </ul>
            <?php echo $res->render(); ?>
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
</html>
