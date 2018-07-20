<?php
namespace app\mobile\controller;
use think\Db;
use think\Session;
use app\mobile\controller\Common;

class Index extends Common{
	public function index(){
		$map=array();
		if(input("keywords")) $map['title']=['like','%'.input('keywords').'%'];
		$news=Db::name("bbk_news_api")->where($map)->order("id desc")->limit(15)->select();
		$this->assign('news',$news);
		return $this->fetch();
	}

	public function news_detail(){
		$url=file_get_contents(input("url"));
		print_r($url);
		return $this->fetch();
	}
	
}
