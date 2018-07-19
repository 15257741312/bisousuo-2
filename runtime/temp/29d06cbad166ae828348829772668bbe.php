<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:88:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\index\index.html";i:1531121608;s:42:"../application/index/view/common/head.html";i:1531290789;s:48:"../application/index/view/common/sowing_map.html";i:1531121463;s:42:"../application/index/view/common/foot.html";i:1531289358;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>首页</title>
	<link rel="stylesheet" href="/bisousuo-2/public/static/css/Basics.css" />
	<script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
	<script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
	<script src="/bisousuo-2/public/static/js/dist/easySlider.js"></script>
	<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/index.css?v=2" />
	<link rel="stylesheet" href="/bisousuo-2/public/static/css/sow.css">
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
            <a href="index.html" class="logo fl"><img src="/bisousuo-/public/static/img/logo.png" alt="" /></a>
            <div class="search">
                <form action="<?php echo url('Index/index'); ?>" method="post">
                    <input type="submit" style="cursor: pointer" value="立即搜索" class="btn" />
                    <div class="po">
                        <input type="text" class="txt" value="<?php echo $keywords; ?>" name="keywords"/>
                        <div class="select_down">
                            <ul class="select_ul">
                                <li class="select_li">吐槽吐槽吐槽吐槽啊啊啊</li>
                                <li class="select_li">吐槽吐槽啊啊啊</li>
                                <li class="select_li">吐槽吐槽</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <input type="button" value="全站搜索" class="btn" /> -->
        </div>
    </div>
</div>
<!-- 广告 -->
<div class="address">
	<div id="slider">
		<ul class="slides clearfix">
			<li><img class="responsive" src="/bisousuo-/public/static/img/sowing_img.jpg"></li>
			<li><img class="responsive" src="/bisousuo-/public/static/img/sowing_img.jpg"></li>
			<li><img class="responsive" src="/bisousuo-/public/static/img/sowing_img.jpg"></li>
			<li><img class="responsive" src="/bisousuo-/public/static/img/sowing_img.jpg"></li>
			<li><img class="responsive" src="/bisousuo-/public/static/img/sowing_img.jpg"></li>
			<li><img class="responsive" src="/bisousuo-/public/static/img/sowing_img.jpg"></li>
		</ul>
		<ul class="controls">
			<li><img src="/bisousuo-2/public/static/js/dist/prev.png" alt="previous"></li>
			<li><img src="/bisousuo-2/public/static/js/dist/next.png" alt="next"></li>
		</ul>
		<ul class="pagination">
			<li class="active"></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<div class="address_r">
		
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("#slider").easySlider( {
			slideSpeed: 500,
			paginationSpacing: "15px",
			paginationDiameter: "12px",
			paginationPositionFromBottom: "20px",
			slidesClass: ".slides",
			controlsClass: ".controls",
			paginationClass: ".pagination"					
		});
	});
</script>
<div class="wrapper">
	<div>
		<div class="main">
			<div class="menu-gurd" style="display: none;">
				<span class="mine-text">我的关注</span><span class="menu-item current">推荐</span><span class="menu-item">导航</span>
			</div>
			<div class="news-wrapper">

				<!-- <div class="news-flash-tips"">
					<div class="left-line"></div>
					<div class="tips-content">
						<span>以下信息根据您的兴趣推荐</span>
					</div>
					<div class="rigth-line"></div>
				</div> -->
				<div class="water-container">
					<!-- 贴吧 -->
					<?php if(is_array($ba) || $ba instanceof \think\Collection || $ba instanceof \think\Paginator): $i = 0; $__LIST__ = $ba;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="news-item">
						<div class="img_cnt">
							<img src="<?php echo $vo['smbo_logo']; ?>" class="jl" style="width: 15%;height: auto;" />
						</div>
						<h2 class="dw" style="left: 140px;"><?php echo $vo['smbo_title']; ?></h2>
						<span class="dw2" style="left: 140px;"><?php echo $vo['smbo_description']; ?></span>
					</div>
			        <?php endforeach; endif; else: echo "" ;endif; ?>

			        <!-- 百科 -->
			        <?php if($baike != null): ?>
					<div class="news-item">
						<h2><a href="<?php echo url('Baike/baike'); ?>?id=<?php echo $baike['article_id']; ?>"><?php echo $baike['article_title']; ?>百科</a></h2>
						<span><?php echo msubstr($baike['article_content'],0,212,'utf-8',true); ?></span>
					</div>
					<?php endif; ?>

					<!-- 新闻 -->
					<!-- 多图新闻 -->
					<!-- <div class="news-item">
						<h2>俄罗斯能办世界杯才不仅仅因为他们是战斗民族</h2>
						<div class="img_cnt">
							<div class="img_cntdiv"><img src="/bisousuo-/public/static/img/tu1.png" /></div>
							<div class="img_cntdiv"><img src="/bisousuo-/public/static/img/tu2.png" /></div>
							<div class="img_cntdiv"><img src="/bisousuo-/public/static/img/tu3.png" /></div>
						</div>
						<span>温州点对点网络科技有限公司 &nbsp; &nbsp; &nbsp;2018-05-29 &nbsp;18:56</span>
					</div> -->
					<!-- 无图新闻 -->
					<!-- <div class="news-item">
						<h2>冬虫夏草被踢出保健品圈子 神话要"凉凉"?</h2>
						<span>温州点对点网络科技有限公司 &nbsp; &nbsp; &nbsp;2018-05-29 &nbsp;18:56</span>
					</div> -->
					<?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "没有更多数据了。。" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="news-item">
						<div class="img_cnt">
							<img src="<?php echo $vo['thumbnail']; ?>" class="jl" />
						</div>
						<h2 class="dw"><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a></h2>
						<span class="dw2"><?php echo $vo['summary']; ?></span>
						<span class="dw2" style="top: 155px;">时间：<?php echo date("Y-m-d",$vo['time_num']); ?>&nbsp;&nbsp;来源：<?php echo $vo['resource']; ?></span>
					</div>
					<?php endforeach; endif; else: echo "没有更多数据了。。" ;endif; ?>
			        <input type="hidden" id="page_input" value="1">
			        <div id="loadmore" style="text-align: center;"><h4>→加载更多←</h4></div>
				</div>
				<!-- 右侧新闻 -->
				<div class="news-rank-wrapper">
					<?php if(is_array($right_news) || $right_news instanceof \think\Collection || $right_news instanceof \think\Paginator): $i = 0; $__LIST__ = $right_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="news-text">
						<i class="yuan act"></i>
						<span><?php echo date("Y-m-d",$vo['time_num']); ?></span>
						<span><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a></span>
						<span><?php echo $vo['summary']; ?></span>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="news-rank-address" style="width: 22rem;height: 200px;background-color: #000;"></div>
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
                    $(".news-item:last").after(data);
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