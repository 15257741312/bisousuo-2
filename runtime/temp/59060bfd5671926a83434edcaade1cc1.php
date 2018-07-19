<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/index\view\guba\guba.html";i:1530600835;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\head.html";i:1531290789;s:78:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\index\view\common\foot.html";i:1531289358;}*/ ?>
<html lang="zh">

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>股吧</title>
		<script type="text/javascript" src="/bisousuo-2/public/static/js/global.js"></script>
        <script type="text/javascript" src="/bisousuo-2/public/static/js/common.js"></script>
        <link rel="stylesheet" href="/bisousuo-2/public/static/css/Basics.css" />
       <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/sign2.css"/>
		<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/css/guba.css" />
	</head>
         <style type="text/css">
         	body,html{position: relative;}
         </style>
	<body>
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

		
		<div class="wrapper">

				<div class="content">
					<div class="head_content">
						<div class="card_banner card_banner_link">
							<img src="/bisousuo-/public/static/img/bg.jpg" id="forum-card-banner">
						</div>
						<div class="card_top_wrap clearfix card_top_theme ">
							<div class="card_top_right">
								<div id="pagelet_forum/pagelet/sign_mod">
									<div class="sign_mod_bright" id="sign_mod">
										<div id="signstar_wrapper" class="j_sign_box sign_box_bright">
											<a rel="noreferrer" href="#" onclick="return false" data-dw="1" tabindex="3" title="签到" class="j_signbtn sign_btn_bright j_cansign">
												
												<span class="sign_today_date">06月25日</span>
												<span class="sign_month_lack_days">漏签<span class="j_sign_month_lack_days">0</span>天</span>
											</a>
											<div class="signin">
												<div class="signshade"></div>
												<div class="signin_cnt">
													<div id="calendar"></div>
													<div class="signtip_cnt">
														<div class="signtip">
														   <div class="signimg"><img src="/bisousuo-/public/static/img/rili.png"/></div>
														   <div class="signtext">签到排名：今日本吧第<span>505</span>个签到，
															离前十名还有些距离，大家来得更勤快些吧~</div>
														</div>			
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="card_top clearfix">
								<div class="card_head">
									<a rel="noreferrer" href="">
										<img class="card_head_img" id="forum-card-head" src="/bisousuo-/public/static/img/logo.jpg">
									</a>
								</div>
								<div class="card_title">
									<a rel="noreferrer" class=" card_title_fname" title="" href="">
										温州大学吧
									</a>
									<div class="focus_btn_wrap">
										<div id="pagelet_forum/pagelet/focus_btn">

										</div>
									</div>
								</div>
								<p class="card_slogan">温州大学学生服务站</p>
							</div>
						</div>
						<div id="pagelet_frs-header/pagelet/head_content_middle">
							<div class="top_content  ">
								<div class="top_cont_main">

								</div>
								<div class="top_cont_toggle"></div>
							</div>
							<div class="game_frs_in_head">
							</div>
							<div id="pagelet_platform-official/pagelet/official_head_block">
							</div>
							<div id="pagelet_entertainment-liveshow/pagelet/lecai_head"></div>
							<div id="pagelet_entertainment-liveshow/pagelet/video_head"></div>
						</div>
						<div class="content-box clearfix">
							<div class="find-box">
								<div class="find-title">
									<span>发现</span>
								</div>
				

							<?php if(is_array($res_ba) || $res_ba instanceof \think\Collection || $res_ba instanceof \think\Paginator): $i = 0; $__LIST__ = $res_ba;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<?php echo $vo['post_id']; ?>
								<div class="find-item">
									<div class="find_bk1"><img src="/bisousuo-/public/static/img/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title"><a href="<?php echo url('index/guba/gubacontent',['post_id'=>$vo['post_id']]); ?> "><?php echo $vo['post_title']; ?></a></div>
											<p><span>作者：<?php echo $vo['post_admin']; ?></span>&nbsp;<span>评论：141 阅读：<?php echo $vo['click_count']; ?></span>&nbsp;&nbsp;<span>发布时间:<?php echo $vo['post_create_time']; ?></span></p>
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
					
							<?php endforeach; endif; else: echo "" ;endif; ?>



<!--
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
								<div class="find-item">
									<div class="find_bk1"><img src="images/guba_03.jpg" class="find-item-img"/></div>
									<div class="find_bk2">
										<div class="find-item-text">
											<div class="find_title">股吧访谈之首席投资人：进入国际的A股，新起点量变质一定会变</div>
											<p><span>作者：王牌出击   </span>&nbsp;<span>评论：141 阅读：521</span>&nbsp;&nbsp;<span>发布时间：2018-6-12</span></p>										
										</div>
										<span class="icon-top">置顶</span>
									</div>
								</div>
				
					-->
							</div>
							<div class="aside">
								<span class="aside-title">专栏作者</span>
								<div class="clearfix author-img">
									<img src="images/guba_07.jpg" />
									<img src="images/guba_10.jpg"  />
									<img src="images/guba_07.jpg" />
									<img src="images/guba_10.jpg"  />
									<img src="images/guba_07.jpg" />
									<img src="images/guba_10.jpg"  />
									<img src="images/guba_07.jpg" />
									<img src="images/guba_10.jpg"  />
								</div>
								<span class="aside-title">专栏文章</span>
								<div class="clearfix">
									<img src="images/guba_22.jpg" class="article-img" />
									<div class="article-text">
								    <h6>币圈乱象盖不住 区块链技</h6>									
										<p>从线上到线下，区块链行业隐 约透出一股焦虑味儿。一边是 无数“光环...
									</p>
									</div>
								</div>
								<img src="images/guba_22.jpg" class="article-img" />
									<div class="article-text">
								    <h6>币圈乱象盖不住 区块链技</h6>									
										<p>从线上到线下，区块链行业隐 约透出一股焦虑味儿。一边是 无数“光环...
									</p>
									</div>
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

		<!--<div id="SignIn">
			<div style="" id="calendar"></div>
			<div style="text-align:center;position: relative;padding: 15px;    font-size: 14px;">
				<div class="signtip">
				   <div class="signimg"><img src="images/rili.png"/></div>
				   <div class="signtext">签到排名：今日本吧第<span>505</span>个签到，
					离前十名还有些距离，大家来得更勤快些吧~</div>
				</div>			
			</div>
		</div>-->
		
		
	</body>
	 
	<script src="js/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../Basics/js/basics.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/calendar2.js"></script>
	<script type="text/javascript">
		$(function(){
		  //ajax获取日历json数据
		  var signList=[{"signDay":"09"},{"signDay":"11"},{"signDay":"12"},{"signDay":"13"}];
		   calUtil.init(signList);
		   //自定页
			
		   $(".j_signbtn").on("click",function(){
		   	   $(".signin").toggleClass("active");
		   });
		   $(".signshade").on("click",function(){
		   	 $(".signin").removeClass("active");
		   });
		});
	</script>

</html>
