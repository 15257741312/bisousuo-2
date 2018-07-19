<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Baike extends Controller{

    /*
    *百科首页
    */
    public function bklist(){
        if(input('keywords')){
            $baike=Db::name('baike')
                        ->where(('article_title like "%'.input('keywords').'%") or (article_description like "%'.input('keywords').'%"'))
                        ->order('click_count desc')
                        ->limit(8)
                        ->select();
        }else{
            $baike=Db::name('baike')->order('article_id desc')->limit(8)->select();
        }

        $this->assign("keywords",input("keywords"));
        $this->assign('baike',$baike);
        return $this->fetch('bklist');
    }

    /*
    *百科页面
    */
    public function baike(){
    	if(!input('id')){
    		$this->error('网络繁忙，请稍后再试');
    	}
    	
    	$where['article_id'] = input('id');
    	$baikeInfo = Db::table('baike') -> where($where) -> find();

    	$this->assign('info',$baikeInfo);
    	return $this->fetch('baike');
    }

    /*
    *首页加载更多
    */
    public function ajax_baike(){
        $page=input("p");
        $start=$page*8;
        $step=8;
        //当p传的值为1时，发送第二页的信息;
        if(input('keywords')){
            $baike=Db::name('baike')
                        ->where(('article_title like "%'.input('keywords').'%") or (article_description like "%'.input('keywords').'%"'))
                        ->order('id desc')
                        ->limit($start,$step)
                        ->select();
        }
        if(input('keywords')==""){
            $baike=Db::name('baike')->order('article_id desc')->limit($start,$step)->select();
        }
        if($baike){
            $str="";
            foreach ($baike as $k=>$v){
                if (!$v['article_img']) {
                    $str .= '<div class="new-item"><div class="el-md2"><h2>'.$v['article_title'].'百科</h2><span>'.$v['article_description'].'</span></div></div>';
                }else{
                    $str .= '<div class="new-item"><img src="'.$v['article_img'].'" class="el-md" /><div class="el-md2 jl4"><h2>'.$v['article_title'].'百科</h2><p>'.$v['article_description'].'</p></div></div>';
                }
            }

            echo $str;

        }else{
            echo "";
        }
    }

}
