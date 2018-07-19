<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
use think\Paginator;

class Guba extends Controller{

	/*
	*搜索结果匹配
	*/
	public function guba(){
            $res_ba=Db::name('bbs_post')->select();
	//	dump ($res_ba);die;
		$this->assign('res_ba',$res_ba);
		return $this->fetch('guba');
    }
	public function gubacontent(){
		$data=input("post_id");
        $where['post_id'] = $data;
            $bacontent=Db::name('bbs_post')->where($where)->find();
	    $wherebauser['id']=$bacontent['post_admin_id'];
            $bauserinfo=Db::name('user')->where($wherebauser)->find();
        $where2['reply_post_id'] = $data;
            $replycontent=Db::name('bbs_reply')->where($where2)->select();
            foreach ($replycontent as $key=>$rep){
			$whererepuserid['id']=$rep['reply_admin_id'];
            $replyuserinfo=Db::name('user')->where($whererepuserid)->field('id,username,headimgurl,sex,level,experience')->find();
//			$res_ba[$key]['post'][] = $v['post_title'];
			$replycontent[$key]['userinfo']=$replyuserinfo;
			
			}
//	dump ($bacontent);die;
		$this->assign('bacontent',$bacontent);
		$this->assign('replycontent',$replycontent);
		return $this->fetch('gubacontent');
	}
    /*
    *搜索AJAX
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
                $str.='<dl><dt><a href=""><img src="'.$v['thumbnail'].'" alt=""></a></dt><dd class="news_title"><h4>'.$v['title'].'</h4></dd><dd class="news_info"><span>'.$v['summary'].'</span></dd></dl>';
            }
            echo $str;
        }else{
            echo "";
        }
    }
}
