<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\public/../application/mobile\view\index\index.html";i:1532053359;s:81:"D:\phpstudy\PHPTutorial\WWW\bisousuo-2\application\mobile\view\common\footer.html";i:1531909912;}*/ ?>
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
	<script type="text/javascript" src="/bisousuo-2/public/static/js/jquery-1.9.1.min.js"></script>
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
		   			<?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		   			<a href="<?php echo url('Index/news_detail'); ?>?url=<?php echo $v['url']; ?>" class="a_news" _href="<?php echo $v['url']; ?>" target="_blank"><div class="indexZixun">
			   				<dl>
			   					<dd>
			   						<article><?php echo $v['title']; ?></article>
			   						<p><?php echo $v['author']; ?> &nbsp;<?php echo date("Y-m-d",$v['time_num']); ?></p>
			   					</dd>
			   					<dt><img src="<?php echo $v['thumbnail']; ?>"/></dt>
			   				</dl>
		   			</div>
		   			</a>
		   			<?php endforeach; endif; else: echo "" ;endif; ?>
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
