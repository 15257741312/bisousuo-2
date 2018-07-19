<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
use think\Paginator;

class Index extends Controller{

	/*
	*搜索结果匹配
	*/
	public function index(){
        if(input('keywords')){
            //查找吧
            $map_ba['smbo_description']=['like','%"'.input('keywords').'"%'];
            $res_ba=Db::name('bbs_small_board')->where(('smbo_title like "%'.input('keywords').'%") or (smbo_description like "%'.input('keywords').'%"'))->order('attention desc')->limit(2)->select();
            if(empty($res_ba)){
                $res_ba=Db::name('bbs_small_board')->order('id desc')->limit(2)->select();
            }
            //查找百科
            $res_baike=Db::name('baike')->where(('article_title like "%'.input('keywords').'%") or (article_description like "%'.input('keywords').'%"'))->order('click_count desc')->limit(1)->find();

            //查找新闻
            $news=Db::name('bbk_news_api')->where('title like "%'.input('keywords').'%"')->order("id desc")->limit(8)->select();
        }

        //没有输入则显示最新的最热的
        if(input('keywords')==""){
            //查找吧
            $res_ba=Db::name('bbs_small_board')->order('id')->limit(2)->select();

            //查找百科
            $res_baike=Db::name('baike')->order('article_id desc')->limit(1)->find();
            $news = '';
        }
        foreach ($res_ba as $key => $value) {
        	$where = 'post_smbo_id = '.$value['id'].' and small_top = 2';
        	$res_ba_top = Db::table('bbs_post') -> field('post_title') -> where($where) -> limit(3) -> select();
        	if($res_ba_top){
        		foreach ($res_ba_top as $k => $v) {
	        		$res_ba[$key]['post'][] = $v['post_title'];
	        	}
        	}else{
        		$res_ba[$key]['post'] = '';
        	}
        }

        //右侧新闻
        $res_news=Db::name('bbk_news_api')->order("id desc")->limit(8)->select();
        if(!$news){
        	$news = $res_news;
        }

        $this->assign("keywords",input("keywords"));
        $this->assign('ba',$res_ba);
        $this->assign('baike',$res_baike);
        $this->assign('news',$news);
        $this->assign('right_news',$res_news);

        return $this->fetch('index');
    }
    
    /*
    *首页加载更多
    */
    public function ajax_content(){
        $page=input("p");
        $start=$page*8;
        $step=8;
        //当p传的值为1时，发送第二页的信息;
        if(input('keywords')){
            //查找新闻
            $res_news=Db::name('bbk_news_api')->where('title like "%'.input('keywords').'%"')->order("id desc")->limit($start,$step)->select();
        }
        if(input('keywords')==""){
            $res_news=Db::name('bbk_news_api')->order("id desc")->limit($start,$step)->select();
        }
        if($res_news){
            $str="";
            foreach ($res_news as $k=>$v){
                $str .= '<div class="news-item"><div class="img_cnt"><a href="'.$v['url'].'" target="_blank"><img src="'.$v['thumbnail'].'" class="jl" /></a></div><a style="color: black" href="'.$v['url'].'" target="_blank"><h2 class="dw">'.$v['title'].'</h2></a><span class="dw2">'.$v['summary'].'</span><span class="dw2" style="top: 155px;">时间：'.date('Y-m-d',strtotime($v['published_time'])).'&nbsp;&nbsp;来源：'.$v['resource'].'</span></div>';
            }

            echo $str;

        }else{
            echo "";
        }
    }
}
