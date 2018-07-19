<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"E:\phpStudy\PHPTutorial\WWW\bisousuo-\public/../application/index\view\guba\gubacontent.html";i:1530599838;s:77:"E:\phpStudy\PHPTutorial\WWW\bisousuo-\application\index\view\common\head.html";i:1530600904;s:77:"E:\phpStudy\PHPTutorial\WWW\bisousuo-\application\index\view\common\foot.html";i:1530600968;}*/ ?>
<!DOCTYPE html>
<html lang="zh">

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>个人中心详情</title>
		<script type="text/javascript" src="/bisousuo-/public/static/js/global.js"></script>
        <script type="text/javascript" src="/bisousuo-/public/static/js/common.js"></script>
        <link rel="stylesheet" href="/bisousuo-/public/static/css/Basics.css" />
		<link rel="stylesheet" type="text/css" href="/bisousuo-/public/static/css/grzhuye_show.css" />
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
            <a id="login" href="javascript:;" class="fr" style="font-weight: bold;" onclick="common.poplogin();">登录</a>
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
		<div class="wrap2 ">
		    <div class="content1 clearfix ">
		    	<div class="card_top ">
		    		<a href=" "><img src="/bisousuo-/public/static/img/gblogo.jpg "  class="gblogo "/></a>
		    		<div><span>怎么发股吧</span><div class="focus_btn "><a href="# ">已关注</a>&nbsp;|&nbsp;<a href="# ">取消</a></div>
		    		
		    		<span class="follo ">关注：</span><span class="text-color ">4855</span>
		    		<span class="follo ">贴子：</span><span class="text-color ">46891</span>
		    		</div>
		    	</div>
		    	<div class="nav_wrap ">
		    	<span>看贴</span>
		    </div>
		    <div class="p_thread ">
		    	<div><span>14</span>回复贴，共<span>1</span>页</div>
		    </div>
		    <div class="core_title_wrap_bright ">
		    	<span>微信3元体验48小时加粉都是骗子</span>
		    	<span></span>
		    	<span>只看楼主</span>
		    	<span>收藏</span>
		    	<span>回复</span>
		    </div>
		    <div class="l_post ">

			<div class="clearfix">
		    	<div class="headframe ">
		    		<a href="# " class="landlord "></a>
		    		<a href="# ">
		    			<img src="/bisousuo-/public/static/img/jibenzl_03.jpg " width="88px "  height="88px "/>
		    		</a>
		    		<span>
		    			<?php echo $bacontent['post_admin']; ?>aaaa
		    		</span>
		    	</div>
		    	<div class="d_post_content ">
					<?php echo $bacontent['post_content']; ?>
		    		</div>
		    	</div>

			<?php if(is_array($replycontent) || $replycontent instanceof \think\Collection || $replycontent instanceof \think\Paginator): $i = 0; $__LIST__ = $replycontent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		    	<div class="clearfix">
		    	<div class="headframe ">
		    		<a href="# " class="landlord "></a>
		    		<a href="# ">
		    			<img src="<?php echo $vo['userinfo']['headimgurl']; ?> " width="88px "  height="88px "/>
		    		</a>
		    		<span>
		    			<?php echo $vo['userinfo']['username']; ?>
		    		</span>
		    	</div>
		    	<div class="d_post_content ">
					<?php echo $vo['reply_content']; ?>
		    		</div>
		    	</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>

		    </div>
		    <div class="right_section ">
		    	<div class="my_tieba_mod">
		        <span>我在股吧</span><a href="#"><span>管理</span></a>
		        <a href="#" class="media_left">
		        	<img src="images/tx.jpg"/ width="80px" height="80px">
		        </a>
		        <div class="user_name_guba"><a href="#"><span>牵着蜗牛散步</span></a><a href="#"><span>我的等级</span></a></div>
		        <div class="gray-text">我在股吧信息</div>
		        <div class="lv-box">
		        	<span class="gray-text">本吧牛人排行榜</span><span>中级粉丝</span>
		        </div>
		        <div class="exp-box">
		        	<span class="gray-text">经验&nbsp;:</span><div class="exp-bar"><span class="progress"></span><div class="gray-text exp-text"><span class="orange-text">5</span>/<span>15</span></div></div>
		        </div>
		    	</div>
		    	<div class="ranking-list">
		    		<span class="gray-text ranking-list-title">股吧排行榜</span>
		    		<ul class="gray-text">
		    			<li><span>1</span><a href="#"><span>高考第2天11936</span></a></li>
		    			<li><span>2</span><a href="#"><span>贴吧表白墙92311</span></a></li>
		    			<li><span>3</span><a href="#"><span>魔神总司装了11604</span></a></li>
		    			<li><span class="gray-bg">4</span><a href="#" ><span>十周年武器装扮一览8388</span></a></li>
		    			<li><span class="gray-bg">5</span><a href="#"><span>进击的巨人1060</span></a></li>
		    			<li><span class="gray-bg">6</span><a href="#"><span>王祖贤为考生加油0</span></a></li>
		    			<li><span class="gray-bg">7</span><a href="#"><span>小龙虾替国足出征世界杯0</span></a></li>
		    			<li><span class="gray-bg">8</span><a href="#"><span>高考作文哪家强</span></a></li>
		    			<li><span class="gray-bg">9</span><a href="#"><span>FIFA最新排名0</span></a></li>
		    			<li><span class="gray-bg">10</span><a href="#"><span>被数学打败了吗？</span></a></li>
		    		</ul>
		    	</div>
		    </div>
		    <div class="edit_show">
		   	  <div class="edit_bar"><div class="edit_fl">发表回复</div>
		   	    <div class="edit_fr">发帖请遵守协议及'七条底线'股吧投诉</div>
		   	  </div>
		   	  <div class="edit_find">
		   	  	<textarea id="txtEditor" name="txtEditor" style="height:300px;width:100%;"></textarea>
		   	  	
		   	  </div>
		   	  <div class="edit_submit" onclick="fabiao()">发表</div>
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
	<script type="text/javascript" src="/bisousuo-/public/static/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/bisousuo-/public/static/js/editor/kindeditor-all-min.js"></script>
    <script type="text/javascript" src="/bisousuo-/public/static/js/editor/lang/zh_CN.js" charset="utf-8"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="newscontent"]', {
                cssPath : 'kindeditor/plugins/code/prettify.css',
                uploadJson : 'kindeditor/php/upload_json.php',
                fileManagerJson : 'kindeditor/php/file_manager_json.php',
                allowFileManager : true,
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
                }
            });
            prettyPrint();
        });
	  
    </script>
    <script>
	function fabiao(){
	var reply=editor.sync();
	alert(reply);
	}

    </script>

</html>
