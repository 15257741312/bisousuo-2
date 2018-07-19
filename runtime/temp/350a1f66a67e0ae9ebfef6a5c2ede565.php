<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/mobile\view\index\index.html";i:1531983085;s:81:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\mobile\view\common\footer.html";i:1531909912;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
		<link rel="stylesheet" type="text/css" href="/bisousuo-2/public/static/mobile/css/bi_style.css"/>
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<style type="text/css">
			#main{
				-webkit-overflow-scrolling: touch;
			}
		</style>
</head>
<body>
<div id="wrap" class="flex-wrap flex-vertical">
    <header id="aui-header">
      <div class="tieba1Top" id="header">
  			<div class="swiper-container">
  			    <div class="swiper-wrapper">
  			        <div class="swiper-slide"><img src="/bisousuo-2/public/static/mobile/image/index_02.jpg" class="topimg"/></div>
  			        <div class="swiper-slide"><img src="/bisousuo-2/public/static/mobile/image/index_02.jpg" class="topimg"/></div>
  			        <div class="swiper-slide"><img src="/bisousuo-2/public/static/mobile/image/index_02.jpg" class="topimg"/></div>
  			    </div>
  			</div>
  			<form action="#" method="" id="form">
  				<input type="text" value="" placeholder=""/>
  				<button>币搜索一下</button>
  			</form>
  		</div>
      <div class="navi">
        <div class="tabWi" id="nav">
          <a href="#" class="curri">热闻</a>
          <a href="#" class="renews">百科</a>
          <a href="#" class="renews">资讯</a>
          <a href="#" class="renews">吐槽</a>
          <a href="#" class="renews">教程</a>
        </div>
      </div>
    </header>
  		<!--content-->
    <div id="main" class="flex-con">
		  <div class="contenti">
		  	<ul>
		  		<!--rewen-->
		   		<li style="display: block">
		   			<div class="indexZixun">
			   				<dl>
			   					<dd>
			   						<article>俄罗斯能办世界杯才不仅仅是因为他们是战斗民族</article>
			   						<p>资讯 &nbsp;2018/05/29 &nbsp;18:56</p>
			   					</dd>
			   					<dt><img src="/bisousuo-2/public/static/mobile/image/zixun_03.jpg"/></dt>
			   				</dl>
		   			</div>
		   			<div class="indexZixun">
		   				<dl>
		   					<dd>
		   						<article>冬虫夏草被踢出保健圈子 &nbsp;神话要“凉凉”</article>
		   						<p>资讯 &nbsp;2018/05/29 &nbsp;18:56</p>
		   					</dd>
		   					<dt><img src="/bisousuo-2/public/static/mobile/image/zixun_06.jpg"/></dt>
		   				</dl>
		   			</div>
		   			<div class="indexZixun">
		   				<dl>
		   					<dd>
		   						<article>有多少优秀的孩子，都毁在了父母的差评里！</article>
		   						<p>资讯 &nbsp;2018/05/29 &nbsp;18:56</p>
		   					</dd>
		   					<dt><img src="/bisousuo-2/public/static/mobile/image/zixun_08.jpg"/></dt>
		   				</dl>
		   			</div>
		   			<div class="indexZixun">
		   				<dl>
		   					<dd>
		   						<article>孩子不想学就不学，那还要家长做什么！</article>
		   						<p>资讯 &nbsp;2018/05/29 &nbsp;18:56</p>
		   					</dd>
		   					<dt><img src="/bisousuo-2/public/static/mobile/image/zixun_10.jpg"/></dt>
		   				</dl>
		   			</div>
		   			<div class="indexZixun">
		   				<dl>
		   					<dd>
		   						<article>孩子不想学就不学，那还要家长做什么！</article>
		   						<p>资讯 &nbsp;2018/05/29 &nbsp;18:56</p>
		   					</dd>
		   					<dt><img src="/bisousuo-2/public/static/mobile/image/zixun_10.jpg"/></dt>
		   				</dl>
		   			</div>
		   			<div class="indexZixun">
		   				<dl>
		   					<dd>
		   						<article>孩子不想学就不学，那还要家长做什么！</article>
		   						<p>资讯 &nbsp;2018/05/29 &nbsp;18:56</p>
		   					</dd>
		   					<dt><img src="/bisousuo-2/public/static/mobile/image/zixun_10.jpg"/></dt>
		   				</dl>
		   			</div>
		   		</li>
		  	</ul>
			</div>
    </div>
    <div id="footer" class="border-t">
        <ul class="flex-wrap" >
            <a href="<?php echo url('Index/index'); ?>"><li class="flex-con <?php if($controller=='Index'): ?>active<?php endif; ?>" >首页</li></a>
            <a href="<?php echo url('Biba/index'); ?>"><li class="flex-con <?php if($controller=='Biba'): ?>active<?php endif; ?>" >币吧</li></a>
            <a href="<?php echo url('Wenda/index'); ?>"><li class="flex-con <?php if($controller=='Wenda'): ?>active<?php endif; ?>" >问答</li></a>
            <a href="<?php echo url('My/index'); ?>"><li class="flex-con <?php if($controller=='My'): ?>active<?php endif; ?>" >我的</li></a>
        </ul>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
<script>
  $(function() {
    $("#form").addClass('form');
    $(".navi").addClass('nav2');
    var mySwiper = new Swiper ('.swiper-container', {
      direction: 'horizontal',
      autoplay: 3000,
      loop: true,
    });
  })

</script>
</script>
</body>
</html>