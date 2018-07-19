<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\paginator;

class Spit extends Controller{

    /*
    *吐槽模块
    */
    public function index(){
        $map['s.id']=['>',0];
        if(input("selTitle")){
            $map['s.content']=['like',"%".input("selTitle")."%"];
            $this->assign("selTitle",input("selTitle"));
        }

        if(input('startTime')){
            $startTime=strtotime(input('startTime'));
            if($startTime) {
                $str1 = ' s.addtime >' . $startTime;
            }
            $this->assign('startTime', input('startTime'));

        }
        if(input('endTime')){
            $endTime=strtotime(input('endTime'));
            if($endTime) {
                $str2 = ' AND s.addtime <' . $endTime;
            }
            $this->assign('endTime', input('endTime'));

        }
        if(input('newsType')==1){
            $map['s.is_delete']=1;
        }elseif (input('newsType')==2){
            $map['s.is_delete']=2;
        }
        $this->assign('newsType',input('newsType'));

        $arr=Db::table("bbs_spit")->alias("s")->where($map)->where($str1.$str2)->join("user u","s.user_name=u.id","left")->field("s.*,u.username")->order("s.id desc")->paginate(10);
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    /*
    *隐藏吐槽
    */
    public function  delSpit(){
        $map['id']=input("id");
        $data="";

        if(input("type")==1){
            $data['is_delete']=1;
        }elseif(input("type")==2){
            $data['is_delete']=2;
        }
        Db::name("bbs_spit")->where($map)->update($data);
        $msg['msg']="修改成功!";
        echo json_encode($msg);
    }

}

