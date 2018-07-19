<?php
namespace app\index\controller;
use app\index\controller\Common;
use think\Db;
use think\File;
use think\Image;
use think\Session;
use think\Paginator;

class Askanswer extends Common{
    public  function __construct(){
        parent::__construct();

    }

    public  function index(){
        $keywords=input("keywords");
        $this->assign("keywords",$keywords);
        $map['title']=['like','%'.$keywords.'%'];
        $res=Db::name('bbs_ask')->where($map)->order("id desc")->paginate(9,false,['query'=>request()->param()])->each(function ($item,$key){
                $cdtime=time()-$item['addtime'];
                switch ($cdtime){
                    case $cdtime<60:
                        $strtime=$cdtime."秒前";
                        break;
                    case $cdtime>=60 && $cdtime<3600:
                        $min=floor($cdtime/60);
                        $strtime=$min."分钟前";
                        break;
                    case $cdtime>=3600 && $cdtime<3600*24:
                        $hour=floor($cdtime/3600);
                        $strtime=$hour."小时前";
                        break;
                    default :
                        $days=floor($cdtime/(3600*24));
                        $strtime=$days."天前";
                        break;
                }
                $item['strtime']=$strtime;
                return $item;
        });

        $this->assign("res",$res);
        return $this->fetch('index');
    }

    //提问详情
    public function askDetail(){

        //提交回答
        if(input("id") && input("sub") && input("back")){
            $data['answer_phone']=Session::get("tel");
            $data['content']=input("back");
            $data['ask_id']=input("id");
            $data['addtime']=time();
            Db::name("bbs_answer")->insert($data);
            Db::name("bbs_ask")->where("id","=",input("id"))->setInc("commend_num");
            if(input("keywords")){
                $this->redirect("Askanswer/askDetail?id=".input("id")."&keywords=".input("keywords"));
            }else{
                $this->redirect("Askanswer/askDetail?id=".input("id"));
            }

        }

        //搜索栏关键字
        $this->assign("keywords",input("keywords"));

        //浏览次数加1
        Db::name("bbs_ask")->where("id","=",input("id"))->setInc("view_count",1);

        //查询提问信息
        $oneData=Db::name("bbs_ask")->alias("a")->join("user u","u.phone=a.user_phone")->where('a.id','=',input("id"))->field("a.*,u.nickname")->find();
        $imgs=json_decode($oneData['img']);

        $newArr=array();
        if(!empty($imgs)){
            foreach ($imgs as $k=>$v){
                $imgs_arr2=explode("**",$v);
                $newArr[$k]['smallimg']=$imgs_arr2[1];
                $newArr[$k]['source']=$imgs_arr2[0];
            }
            $oneData['imgs']=$newArr;
        }
        $this->assign("oneData",$oneData);

        //查询回答信息
        //1.最佳回答
        $map['an.ask_id']=input("id");
        $map['an.best']=1;
        $best_an=Db::name("bbs_answer")->alias("an")->join("user u","u.phone=an.answer_phone")->where($map)->field("an.*,an.id aid,u.*")->find();
        //查询是否已点赞或者踩
        if(!empty($best_an)){
            $map_like['com_id']=$best_an['id'];
            $map_like['user_phone']=Session::get("tel");
            $map_like['type']=1;
            $c_res=Db::name("bbs_like")->where($map_like)->field("goodbad")->find();
            if(!empty($c_res)){
                $best_an['goodbad']=$c_res['goodbad'];
            }else{
                $best_an['goodbad']=0;
            }
        }
        $this->assign("best_an",$best_an);
        //2.其他回答
        $map2['an.ask_id']=input("id");
        $map2['an.best']=['<>',1];
        $other_an=Db::name("bbs_answer")->alias("an")->join("user u","u.phone=an.answer_phone","left")->where($map2)->field("an.*,an.id aid,u.*")->order("an.id desc")->paginate(9,false,["query"=>request()->param()])->each(function ($item,$key){
            //查询是否已点赞或者踩
            $map_like_other['user_phone']=Session::get("tel");
            $map_like_other['type']=1;
            $map_like_other['com_id']=$item['aid'];
            $res_other=Db::name("bbs_like")->where($map_like_other)->field("goodbad")->find();
            if(!empty($res_other)){
                $item['goodbad']=$res_other['goodbad'];
            }else{
                $item['goodbad']=0;
            }
            return $item;
        });
        $this->assign("other_an",$other_an);

        //侧栏人物
        $res_men=Db::name("baike")->where("cont_type","=",3)->order("article_id desc")->limit(3)->select();
        $this->assign("res_men",$res_men);

        //热点专题
        $res_hot=Db::name("bbk_news_api")->order("id desc")->find();
        $this->assign("res_hot",$res_hot);
        return $this->fetch("interlocution");
    }

    public  function  myAsk(){
        return $this->fetch("mywd");
    }

    //发起提问
    public function ask(){
        $this->isLogin();
        if(input("send")){
            $data['title']=input("title");
            $data['content']=input("con");
            if(count(input('img/a'))>1) $data['img']=json_encode(input("img/a"));
            $data['addtime']=time();
            $data['user_phone']=Session::get('tel');
            Db::name("bbs_ask")->insert($data);
            $this->redirect('Askanswer/myAsk');
        }
        return $this->fetch("ask");
    }

    //保存提问图片
    public function upload(){
        $file=request()->file('file');		//获取图片
        $info=$file->move(ROOT_PATH.'public'.DS.'static'.DS.'askupload');
        if($info){
            $sourcePath='/askupload/'.$info->getSaveName();		//大图路径
            $img=\think\Image::open($info);
            $thumbPath=ROOT_PATH.'public'.DS.'static'.DS.'askupload/'.date('Ymd').'/240_'.$info->getFileName();	//缩略图路径
            $img->thumb(240,240)->save($thumbPath);
            $thumbPath='/askupload/'.date('Ymd').'/240_'.$info->getFileName();
            echo $imgPath=$sourcePath.'**'.$thumbPath;
        }else{
            echo $info->getError();
        }
    }

    //点赞或踩
    public function goodbad(){
        if(input("cid") && input("goodbad")){
            $map['com_id']=input("cid");
            $map['type']=1;
            $map['user_phone']=Session::get("tel");
            $res=Db::name("bbs_like")->where($map)->find();
            //$sql=Db::name('bbs_like')->getLastSql();
            if(!empty($res)) return "no";
            $data['com_id']=input("cid");
            $data['goodbad']=input("goodbad");      //1是点赞，2是踩
            $data['addtime']=time();
            $data['type']=1;        //1是问答
            $data['user_phone']=Session::get("tel");
            Db::name("bbs_like")->insert($data);
            if($data['goodbad']==1){
                Db::name("bbs_answer")->where("id","=",input("cid"))->setInc("praise");
            }elseif ($data['goodbad']==2){
                Db::name("bbs_answer")->where("id","=",input("cid"))->setInc("bad");
            }
            return "yes";
        }
    }

    //test
//    public  function updateBaike(){
//        $res=Db::name("baike")->field("article_id,article_img")->select();
//        foreach ($res as $k=>$v){
//            $str=substr($v['article_img'],13);
//            echo $str;
//            $data['article_img']=$str;
//            //Db::name("baike")->where("article_id","=",$v['article_id'])->update($data);
//        }
//    }

}
