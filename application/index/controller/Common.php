<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use think\Db;

class Common extends Controller {
	public function _initialize(){



	    //判断是否异地登录
        if(Session::get('tel')){
            $map['phone']=Session::get("tel");
            $token=Db::name("user")->where($map)->value('token');
            if($token!=Session::get('token')){
                Session::clear();
                exit("<script>alert('您的账号已在其他地方登录,请重新登录');top.location.href='".url('Login/login')."';</script>");
            }
        }
	}

	//判断是否登录
	public function isLogin(){
        $tel=Session::get('tel');
        if(empty($tel)){
            $this->redirect(url("Login/login"));
        }
    }
}
