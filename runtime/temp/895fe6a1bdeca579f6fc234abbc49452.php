<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/home/wwwroot/bisousuo-/public/../application/index/view/baike/bklist.html";i:1530585894;}*/ ?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>百科列表</title>
    <link rel="stylesheet" href="/bisousuo-/public/static/css/Basics.css" />
	<script type="text/javascript" src="/bisousuo-/public/static/js/global.js"></script>
    <script type="text/javascript" src="/bisousuo-/public/static/js/common.js"></script>
	<link rel="stylesheet" type="text/css" href="/bisousuo-/public/static/css/bklist.css" />
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
                <a id="login" href="javascript:;" class="fr" style="font-weight: bold;"  onclick="common.poplogin();;">登录</a>
                <div class="po">
                    <a href="index.html" target="_blank">首页</a>
                    <a href="#" target="_blank">百科</a>
                    <a href="#" target="_blank">资讯</a>
                    <a href="#" target="_blank">股吧</a>
                    <a href="interlocution.html" target="_blank">问答</a>
                    <a href="#" target="_blank">吐槽 </a>
                    <a href="#" target="_blank">教程</a>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="search-box">
                <a href="index.html" class="logo fl"><img src="/bisousuo-/public/static/img/logo.png" alt=""/></a>
                <div class="search">
                    <input type="button" value="立即搜索" class="btn" />
                    <div class="po"><input type="search" class="txt"/></div>
                </div>
                <!-- <input type="button" value="全站搜索" class="btn" /> -->
            </div>
        </div>
        <div class="nav-baner">
            <div class="main">
                <a href="userCenter.html" class="fr" title="个人中心">个人中心</a>
                <ul class="po">
                    <li>
                        <a href="javascript:;" title="">首页</a>
                    </li>
                    <li>
                        <a href="javascript:;" title="">百科</a>
                    </li>
                    <li>
                        <a href="javascript:;" title="">资讯</a>
                    </li>
                    <li>
                        <a href="javascript:;" title="">股吧</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" title="">问答</a>
                    </li>
                    <li>
                        <a href="javascript:;" title="">股吐槽</a>
                    </li>
                    <li>
                        <a href="javascript:;" title="">教程</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
	
	<div class="wrapper">
		
		<div class="content">
			<div class="container">
				<div class="left-content">
					<?php if(is_array($baike) || $baike instanceof \think\Collection || $baike instanceof \think\Paginator): $i = 0; $__LIST__ = $baike;if( count($__LIST__)==0 ) : echo "没有更多数据了。。" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['article_img'] != null): ?>
					<div class="new-item">
						<img src="<?php echo $vo['article_img']; ?>" class="el-md" />
						<div class="el-md2 jl4">
							<h2><?php echo $vo['article_title']; ?>百科</h2>
							<p><?php echo $vo['article_description']; ?></p>
						</div>
					</div>
					<?php else: ?>
					<div class="new-item">
						<div class="el-md2">
							<h2><?php echo $vo['article_title']; ?>百科</h2>
							<span><?php echo $vo['article_description']; ?></span>
						</div>
					</div>
					<?php endif; endforeach; endif; else: echo "没有更多数据了。。" ;endif; ?>
			        <input type="hidden" id="page_input" value="1">
			        <div id="loadmore" style="text-align: center;"><h4>加载更多↓</h4></div>
				</div>
				<div class="ringth-content">
					<div class="ringth-long1">
						<div>
							<span class="ringth-color">风险提示:</span>
							<span>请谨防ICO、变相ICO</span>
							<div>——互联网金融协助协会</div>
						</div>
					</div>
					<div class="ringth-long2">
						<div class="ringth-ico1 tu1">
							<div>
								<span class="zz-title">ECHO</span><span class="ringth-content-text">建立自由的供需生态</span>
							</div>

						</div>
						<div class="ringth-ico1 tu2">
							<div>
								<span class="zz-title">算力坊</span ><span class="ringth-content-text">投资算了持久发展</span>
							</div>

						</div>
						<div class="ringth-ico1 tu3">
							<div>
								<span class="zz-title">weex.com</span><span class="ringth-content-text">实力派交易所 充提现秒到</span>
							</div>

						</div>
						<div class="ringth-ico1 tu4">
							<div>
								<span class="zz-title">egretia.io</span><span class="ringth-content-text">首个H5区块链游戏引擎</span>
							</div>

						</div>
						<div class="ringth-ico1 tu5">
							<div>
								<span class="zz-title">链上科技</span><span class="ringth-content-text">三天开个交易所</span>
							</div>

						</div>
						<div class="ringth-ico1 tu6">
							<div>
								<span class="zz-title">Meurlct</span><span class="ringth-content-text">全球创业者的首席增长官</span>
							</div>

						</div>
						<div class="ringth-ico1 tu7">
							<div>
								<span class="zz-title">般若PRA</span><span class="ringth-content-text">去中心化交易撮合协议</span>
							</div>

						</div>
						<div class="ringth-ico1 tu8">
							<div>
								<span class="zz-title">路易协议</span><span class="ringth-content-text">去中心化</span>
							</div>

						</div>
						<div class="ringth-ico1 tu9">
							<div>
								<span class="zz-title">BTC98</span><span class="ringth-content-text">手机交易九国语言</span>
							</div>

						</div>
						<div class="ringth-ico1 tu10">
							<div>
								<span class="zz-title">Econ chain</span><span class="ringth-content-text">去中心分销</span>
							</div>

						</div>
					</div>
					<div class="qh">
						<span>快讯</span><span>动态</span>
						<div class="new-item">
							<img src="/bisousuo-/public/static/img/zixun1-5.png" width="101px" height="61px" />
							<div class="el-md2 jl4">
								<h2>中国担任上海合作组织轮值主席国 1年干了哪些大事？</h2>
								<span>发布时间：&nbsp;2018-05-29</span>
							</div>
						</div>
						<div class="new-item">
							<img src="/bisousuo-/public/static/img/zixun1-5.png" width="101px" height="61px" />
							<div class="el-md2 jl4">
								<h2>中国担任上海合作组织轮值主席国 1年干了哪些大事？</h2>
								<span>发布时间：&nbsp;2018-05-29</span>
							</div>
						</div>
						<div class="new-item">
							<img src="/bisousuo-/public/static/img/zixun1-5.png" width="101px" height="61px" />
							<div class="el-md2 jl4">
								<h2>中国担任上海合作组织轮值主席国 1年干了哪些大事？</h2>
								<span>发布时间：&nbsp;2018-05-29</span>
							</div>
						</div>
						<div class="new-item">
							<img src="/bisousuo-/public/static/img/zixun1-5.png" width="101px" height="61px" />
							<div class="el-md2 jl4">
								<h2>中国担任上海合作组织轮值主席国 1年干了哪些大事？</h2>
								<span>发布时间：&nbsp;2018-05-29</span>
							</div>
						</div>
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
		<span class="close">x</span>
		<span class="landing-title">用户名密码登陆</span>
		<input type="" name="" placeholder="手机/邮箱/用户名" class="phone" />
		<input type="" name="" placeholder="密码" class="password" />
		<span class="landing-button">登陆</span>
		<div class="landing-count">
			<a href="javascript:;" class="wj"><span>忘记密码？</span></a>
			<a href="javascript:;" class="mf"><span>免费注册！</span></a>
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
                url : '<?php echo url("Baike/ajax_baike"); ?>',
                type : 'post',
                data : {
                    p : p,
                    keywords : keywords,
                },
                async : false,
                success : function (data) {
                    p=parseInt(p)+1;
                    $("#page_input").val(p);
                    $(".new-item:last").append(data);
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