<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"E:\phpStudy\PHPTutorial\WWW\bisousuo-\public/../application/index\view\index\index.html";i:1530599378;s:77:"E:\phpStudy\PHPTutorial\WWW\bisousuo-\application\index\view\common\head.html";i:1530692033;s:77:"E:\phpStudy\PHPTutorial\WWW\bisousuo-\application\index\view\common\foot.html";i:1530600968;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>首页</title>
	<link rel="stylesheet" href="/bisousuo-/public/static/css/Basics.css" />
	<script type="text/javascript" src="/bisousuo-/public/static/js/global.js"></script>
	<script type="text/javascript" src="/bisousuo-/public/static/js/common.js"></script>
	<link rel="stylesheet" type="text/css" href="/bisousuo-/public/static/css/index.css?v=2" />
</head>
<body>
	<div class="head">
    <div class="top">
        <div class="main">
            <a id="setting" href="javascript:;" class="fr" style="font-weight: bold;" onclick="common.settingUp(this);">设置</a>
            <div class="top-menu" style="display:none;">
                <a href="#" target="_blank"> 搜索设置 </a>
                <a href="#" target="_blank"> 高级搜索 </a>
                <a href="#" target="_blank"> 关闭预测 </a>
                <a href="#" target="_blank"> 搜索历史 </a>
            </div>
            <?php if(\think\Session::get('tel')): ?>
            <a id="login" href="javascript:;" class="fr" style="font-weight: bold;" >个人中心</a>
            <?php else: ?>
            <a id="login" href="javascript:;" class="fr" style="font-weight: bold;" onclick="common.poplogin();">登录</a>
            <?php endif; ?>
            <div class="po">
                <a href="<?php echo url('Index/index'); ?>">首页</a>
                <a href="baike.html">百科</a>
                <a href="#">资讯</a>
                <a href="#">股吧</a>
                <a href="interlocution.html">问答</a>
                <a href="#">吐槽 </a>
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
                        <input type="text" class="txt" value="" name="keywords"/>
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
								<img src="<?php echo $vo['smbo_logo']; ?>" class="jl" style="width: 15%;" />
							</div>
							<h2 class="dw" style="left: 140px;"><?php echo $vo['smbo_title']; ?></h2>
							<span class="dw2" style="left: 140px;"><?php echo $vo['smbo_description']; ?></span>
						</div>
				        <?php endforeach; endif; else: echo "" ;endif; ?>

				        <!-- 百科 -->
				        <?php if($baike != null): ?>
						<div class="news-item">
							<h2><?php echo $baike['article_title']; ?>百科</h2>
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
								<a href="<?php echo $vo['url']; ?>" style="color: #444" target="_blank"><img src="<?php echo $vo['thumbnail']; ?>" class="jl" /></a>
							</div>
							<h2 class="dw"><a href="<?php echo $vo['url']; ?>" style="color: #444" target="_blank"><?php echo $vo['title']; ?></a></h2>
							<span class="dw2"><a href="<?php echo $vo['url']; ?>" style="color: #444" target="_blank"><?php echo $vo['summary']; ?></a></span>
						</div>
						<?php endforeach; endif; else: echo "没有更多数据了。。" ;endif; ?>
				        <input type="hidden" id="page_input" value="1">
				        <div id="loadmore" style="text-align: center;"><h4 style="cursor : pointer">加载更多↓</h4></div>
					</div>
					<div class="news-rank-wrapper">
						<?php if(is_array($right_news) || $right_news instanceof \think\Collection || $right_news instanceof \think\Paginator): $i = 0; $__LIST__ = $right_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="news-text">
							<i class="yuan act"></i>
							<span><?php echo $vo['published_time']; ?></span>
							<span><a href="<?php echo $vo['url']; ?>" style="color: #444" target="_blank"><?php echo $vo['title']; ?></a></span>
							<span><?php echo $vo['summary']; ?></span>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
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
    <span class="bq">Copyright© 2018  &nbsp;&nbsp;&nbsp;温州点对点网络科技有限公司 &nbsp;&nbsp;&nbsp;版权所有</span>
</footer>
<div class="mask" style="display: none;"></div>
<div class="landing" style="display: none;">
    <span class="close" onclick="common.hidemask();"></span>
    <span class="landing-title">用户名密码登陆</span>
    <input type="" name="" value="手机/邮箱/用户名" class="phone" />
    <input type="" name="" value="密码" class="password" />
    <span class="landing-button">登陆</span>
    <div class="landing-count">
        <a href="javascript:;" class="wj"><span>忘记密码？</span></a>
        <a href="<?php echo url('Login/regist'); ?>" class="mf"><span>免费注册！</span></a>
    </div>
    <div class="fast-landing">
        <span class="kj">快捷方式登陆</span>
        <span class="tj">推荐</span>
    </div>
    <div class="fast-landing-xz">
        <span class="qqdl">QQ登陆</span>
        <span class="dxdl">短信登陆</span>
    </div>
</div>

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
                    $(".news-item:last").append(data);
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