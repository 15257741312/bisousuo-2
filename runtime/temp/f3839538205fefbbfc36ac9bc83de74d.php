<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:100:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\askanswer\interlocution.html";i:1531391364;s:42:"../application/index/view/common/head.html";i:1531290789;s:83:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\askanswer.html";i:1531383307;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\foot.html";i:1531289358;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
    <script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
    <link rel="stylesheet" href="/bisousuo-2/public/static/css/Basics.css" />
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/interlocution.css"/>
    <link rel="stylesheet" href="/bisousuo-2/public/static/css/pagelist.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>问答</title>
    <style>

        .back_textarea{
            /*display: none;*/
        }
        .ke-container{
            width: 100% !important;
        }
        .wt-button2{
            background: #fff;
        }
        .fold-btn{
            border: 0px;
        }
        .datizhe{
            margin-top: 20px;
        }
        @media screen and (min-width: 751px){
            .wt-tu{
                margin-bottom: 10px;
                cursor: pointer;
                float: left;
            }
            .mask {
                filter: alpha(opacity=60);
                background-color: #777;
                z-index: 1002;
                opacity:1.0;
                -moz-opacity:1.0;
                display: none;
                height: auto !important;
                border: none;
            }
            .mask img{
                border: 0px solid grey;
            }
            .wt-button{
                margin: 20px auto 0px 33px;
            }

        }
        @media screen and (max-width: 751px){
            .wt-tu{
                cursor: pointer;
                margin: 0 auto 10px auto;
            }
            .mask {
                filter: alpha(opacity=60);
                background-color: #777;
                z-index: 1002;
                opacity:1.0;
                -moz-opacity:1.0;
                display: none;
                height: auto !important;
                border: none;
            }
            .mask img{
                border: 0px solid grey;
            }
            .wt-button{
                margin-top: 0.2rem;
            }

        }
    </style>
    <link rel="stylesheet" href="/bisousuo-2/public/static/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="/bisousuo-2/public/static/kindeditor/themes/example1/example1.css" />
    <link rel="stylesheet" href="/bisousuo-2/public/static/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="/bisousuo-2/public/static/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="/bisousuo-2/public/static/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="/bisousuo-2/public/static/kindeditor/plugins/code/prettify.js"></script>
    <style>
        @media (min-width: 751px) {
            .zl dl{
                overflow: hidden;
            }
            .zl dl dt{
                width: 110px;
                float: left;
            }
            .zl dl dd{
                width: 250px;
                padding-left: 30px;
                height: auto;
                float: right;
            }
        }

    </style>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="back"]', {
                cssPath : '/bisousuo-2/public/static/kindeditor/plugins/code/prettify.css',
                uploadJson : '/bisousuo-2/public/static/kindeditor/php/upload_json.php',
                fileManagerJson : '/bisousuo-2/public/static/kindeditor/php/file_manager_json.php',
                allowFileManager : true,
                themeType : 'example1',
                items : [
                    'image', 'multiimage',
                    'insertfile','emoticons'
                ],
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                },
                afterUpload : function(url, data, name) { //上传文件后执行的回调函数，必须为3个参数
                    if(name=="image" || name=="multiimage"){ //单个和批量上传图片时
                        var img = new Image(); img.src = url;
                        img.onload = function(){ //图片必须加载完成才能获取尺寸
                            if(img.width>600) editor1.html(editor1.html().replace('<img src="' + url + '"','<img src="' + url + '" width="600"'))
                        }
                    }
                },
            });
            K.sync('.back_textarea');
            prettyPrint();
        });

    </script>
</head>
<body>
<div id="mask" class="mask">
    <?php if(!(empty($oneData['imgs']) || (($oneData['imgs'] instanceof \think\Collection || $oneData['imgs'] instanceof \think\Paginator ) && $oneData['imgs']->isEmpty()))): if(is_array($oneData['imgs']) || $oneData['imgs'] instanceof \think\Collection || $oneData['imgs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $oneData['imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <img src="/bisousuo-2/public/static/<?php echo $vo['source']; ?>" style="display: none" class="bigimg" alt="">
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
<input type="hidden" value="<?php echo \think\Session::get('tel'); ?>" class="tel">
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

        <div class="content">
            <div class="container">
                <div class="left-content">
                    <div class="text-item">
                        <span class="user-name1"><?php echo $oneData['title']; ?></span>
                        <p class="xq-wt"><?php echo $oneData['content']; ?></p>
                        <?php if(!(empty($oneData['imgs']) || (($oneData['imgs'] instanceof \think\Collection || $oneData['imgs'] instanceof \think\Paginator ) && $oneData['imgs']->isEmpty()))): if(is_array($oneData['imgs']) || $oneData['imgs'] instanceof \think\Collection || $oneData['imgs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $oneData['imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <img src="/bisousuo-2/public/static/<?php echo $vo['smallimg']; ?>" class="smallimg wt-tu" alt="">
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <div class="yh-xx">
                            <span><?php echo !empty($oneData['nickname'])?$oneData['nickname'] : $oneData['user_phone']; ?></span>
                            <span>浏览<?php echo $oneData['view_count']; ?>次</span>
                            <span>发表时间 <?php echo date("Y-m-d H:i",$oneData['addtime']); ?></span>
                            <div class="fx-fs">
                                <a href=""><img src="/bisousuo-/public/static/img/qq.jpg"/></a>
                                <a href=""><img src="/bisousuo-/public/static/img/kj.jpg"/></a>
                                <a href=""><img src="/bisousuo-/public/static/img/wx.jpg"/></a>
                                <a href=""><img src="/bisousuo-/public/static/img/wb.jpg"/></a>
                            </div>
                        </div>
                        <form action="<?php echo url('Askanswer/askDetail'); ?>?id=<?php echo $oneData['id']; if($keywords): ?>&keywords=<?php echo $keywords; endif; ?>" method="post">
                            <textarea name="back" class="back_textarea" id="" cols="20" rows="15"></textarea>
                            <input class="wt-button wt-button2" type="submit" name="sub" value="我有更好的答案" >
                        </form>
                    </div>
                    <?php if(!(empty($best_an) || (($best_an instanceof \think\Collection || $best_an instanceof \think\Paginator ) && $best_an->isEmpty()))): ?>
                    <div class="text-item" style="border:none;">
                       <span class="new-da">最佳答案</span>
                       <span class="new-da-date"><?php echo date("Y-m-d H:i",$best_an['addtime'] ); ?></span>
                       <p class="da-conter">
                         <?php echo $best_an['content']; ?>
                       </p>
                       <div class="cz">
                           <div class="dian">
                                <span class="active good"  <?php if($best_an['goodbad']=="1"): ?> style="background-image:url(/bisousuo-/public/static/img/tucao_23.jpg)" <?php endif; ?> cid="<?php echo $best_an['aid']; ?>"><?php echo $best_an['praise']; ?></span>
                               <span cid="<?php echo $best_an['aid']; ?>" <?php if($best_an['goodbad']=="2"): ?> style="background-image:url(/bisousuo-/public/static/img/tucao_25.jpg)" <?php endif; ?> class="bad"><?php echo $best_an['bad']; ?></span>
                           </div>
                       </div>
                       <div class="dz-xx">
                        <a href=""><img src="/bisousuo-2/public/static/uploads/<?php echo $best_an['headimgurl']; ?>" width="80px" style="margin-top: 12px;margin-left: 20px;" class="dz-tx"/></a>
                        <a href=""><span><?php echo !empty($best_an['nickname'])?$best_an['nickname'] : $best_an['phone']; ?></span></a>
                        <!--<span class="lv">LV8</span>-->
                        <div class="xinxi">
                            <span >采集率：100%</span>
                            <span>擅长：暂未定制</span>
                        </div>
                       </div>
                    </div>
                    <?php endif; if(is_array($other_an) || $other_an instanceof \think\Collection || $other_an instanceof \think\Paginator): $i = 0; $__LIST__ = $other_an;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="text-item">
                         <p class="da-conter mb20"><?php echo $vo['content']; ?></p>
                         <p class="datizhe">
                             <span><?php echo !empty($vo['nickname'])?$vo['nickname'] : $vo['phone']; ?></span>
                             <!--<span class="lv">LV4</span>-->
                             <span class="date">发布于<?php echo date("Y-m-d H:i",$vo['addtime'] ); ?></span>
                        </p>
                         <div class="cz dt-wz">
                           <div class="dian">
                            <span class="active good" <?php if($vo['goodbad']=="1"): ?> style="background-image:url(/bisousuo-/public/static/img/tucao_23.jpg)" <?php endif; ?> cid="<?php echo $vo['aid']; ?>"><?php echo $vo['praise']; ?></span>
                           <span class="bad" <?php if($vo['goodbad']=="2"): ?> style="background-image:url(/bisousuo-/public/static/img/tucao_25.jpg)" <?php endif; ?> cid="<?php echo $vo['aid']; ?>"><?php echo $vo['bad']; ?></span>
                           </div>
                       </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="fold-btn">
                        <?php echo $other_an->render(); ?>
                     </div>
                </div>
                <div class="ringth-content">
                    <div class="zl">
                        <span class="zl-title">特邀专访</span>
                        <?php if(is_array($res_men) || $res_men instanceof \think\Collection || $res_men instanceof \think\Paginator): $i = 0; $__LIST__ = $res_men;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div>
                            <dl>
                                <dt><img src="/bisousuo-2/public/static/<?php echo $vo['article_img']; ?>" width="110px"/></dt>
                                <dd>
                                    <h3><?php echo $vo['article_title']; ?></h3>
                                    <span class="z-title"><?php echo $vo['title_min']; ?></span>
                                    <span><?php echo $vo['article_content']; ?></span>
                                </dd>
                            </dl>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="pl">
                        <span class="pl-title">热点专题</span>
                        <div>
                            <img src="<?php echo $res_hot['thumbnail']; ?>" width="152px"/>
                            <div class="dw4">
                            <p><?php echo $res_hot['title']; ?></p>
                            <span><?php echo $res_hot['resource']; ?></span>
                            </div>

                        </div>
                    </div>
                    <!--<div class="pl">-->
                        <!--<span class="pl-title">企业专栏</span>-->
                        <!--<div>-->
                            <!--<img src="/bisousuo-/public/static/img/wenda_26.jpg"/>-->
                            <!--<div class="dw5">-->
                            <!--<span>DRC金融科技</span>-->
                            <!--<p>两会指引区块链产业健康发展-金色财经邀您共看未来</p>-->
                            <!--</div>-->

                        <!--</div>-->
                        <!--<div>-->
                            <!--<img src="/bisousuo-/public/static/img/wenda_26.jpg"/>-->
                            <!--<div class="dw5">-->
                            <!--<span>DRC金融科技</span>-->
                            <!--<p>两会指引区块链产业健康发展-金色财经邀您共看未来</p>-->
                            <!--</div>-->

                        <!--</div>-->
                        <!--<div>-->
                            <!--<img src="/bisousuo-/public/static/img/wenda_26.jpg"/>-->
                            <!--<div class="dw5">-->
                            <!--<span>DRC金融科技</span>-->
                            <!--<p>两会指引区块链产业健康发展-金色财经邀您共看未来</p>-->
                            <!--</div>-->

                        <!--</div>-->
                        <!--<div>-->
                            <!--<img src="/bisousuo-/public/static/img/wenda_26.jpg"/>-->
                            <!--<div class="dw5">-->
                            <!--<span>DRC金融科技</span>-->
                            <!--<p>两会指引区块链产业健康发展-金色财经邀您共看未来</p>-->
                            <!--</div>-->

                        <!--</div>-->

                    <!--</div>-->
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

    </div>

    <script src="js/layer/layer.js" type="text/javascript"></script>
        <script type="text/javascript">
            //显示大图
            function hideMask(){
                $("#mask").hide();
            }

            $(".text-item img.smallimg").click(function (event) {
                var bigimg_index=$("#mask img").length;
                var smallimg_index=$(".smallimg").index(this);
                $("#mask").css({"width":'auto',"height":"auto"});
                $("#mask img").eq(smallimg_index).css({"width":"800px","height":"auto"}).show().siblings().hide();

                $("#mask").show();
                var w=$("#mask img").eq(smallimg_index).width();
                var h=$("#mask img").eq(smallimg_index).height();
                var win_w=$(window).width();
                var win_h=$(window).height();
                var margin_w=(win_w-w)/2;
                var margin_h=(win_h-h)/2;
                $("#mask").css({"margin":margin_h+"px "+margin_w+"px"});
                event.stopPropagation();
            })

            $(document).click(function () {
                $("#mask").hide();
                $("#mask img").hide();
            })

            $(".wt-button").click(function () {
                var tel=$(".tel").val();
                if(tel==""){
                    common.poplogin();
                    return false;
                }

                var con=$(document.getElementsByTagName("iframe")[0].contentWindow.document.body).html();
                if(con==""){
                    return false;
                }
            })
            
            $(".pl-border").click(function () {
                //$("textarea[name='back_area']").show().animate({height : "300px"})
            })

            $(".good").click(function () {
                if($(".tel").val()=="") return false;
                var num=$(this).html();
                var self=$(this);
                $.ajax({
                    url : '<?php echo url("Askanswer/goodbad"); ?>',
                    type : 'post',
                    data : {
                        cid : $(this).attr("cid"),
                        goodbad : 1,
                    },
                    success : function (msg) {
                        if(msg=="no") return;
                        num=parseInt(num)+1;
                        self.html(num);
                        self.css({"background-image":"url(/bisousuo-/public/static/img/tucao_23.jpg)"});
                    },
                    error : function () {
                        swal("网络连接失败");
                    }
                })
            })

            
            $(".bad").click(function () {
                if($(".tel").val()=="") return false;
                var num=$(this).html();
                var self=$(this);
                $.ajax({
                    url : '<?php echo url("Askanswer/goodbad"); ?>',
                    type : 'post',
                    data : {
                        cid : $(this).attr("cid"),
                        goodbad : 2,
                    },
                    success : function (msg) {

                        if(msg=="no") return;
                        num=parseInt(num)+1;
                        self.html(num);
                        self.css({"background-image":"url(/bisousuo-/public/static/img/tucao_25.jpg)"});
                    },
                    error : function () {
                        swal("网络连接失败");
                    }
                })
            })
        </script>
</body>
</html>