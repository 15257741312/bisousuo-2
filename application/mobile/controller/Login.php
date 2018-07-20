<?php
namespace app\mobile\controller;
use app\index\controller\Common;
use think\Db;
use think\Request;
use think\Validate;
use think\Session;
use SignatureHelper;
use think\Cookie;

class Login extends Common{
	/*
	*页内登录页面
	*/
	public function pagelogin(){
	    if(!$this->request->isAjax()){
        	return input();
		
		//return $this->fetch('login');
	    }
	}
	/*
	*独立登录页面
	*/
	public function login(){
	    if(input("tel")){
            $map['phone']=input("tel");
            $map['password']=md5(input("pass"));
	        $res=Db::name("user")->where($map)->find();
	        if(empty($res)){
	            return 1;     //用户名或密码错误
            }
            $data['token']=rand(0,999999999).'_'.$_SERVER['REMOTE_ADDR'];
	        Session::set("tel",input("tel"));
	        Session::set("nickname",$res['nickname']);
	        Session::set('token',$data['token']);
	        Db::name('user')->where("id",'=',$res['id'])->update($data);
	        return  2;
        }

	    if(Session::get('tel')){
	        $this->redirect("Index/index");
        }else{
            return $this->fetch('login');
        }
	}
	/*
	/*
	*注册页面
	*/
	public function registe(){

        if(input("tel") && input("pass")){
            $where['phone'] = input('tel');
            $judInfo = Db::table('user')->where($where)->find();
            if($judInfo){
                return '1';
            }

            $code=Cookie::get('code');
            if($code != input('code')){
                return '2';
            }

            //添加账号
            $data['phone'] = input('tel');
            $data['password'] = md5(input('pass'));
            $addInfo = Db::table('user')->insert($data);
            if(!$addInfo){
                return '3';
            }
            return "4";
        }
        
		return $this->fetch('registe');
	}

	/*
	*忘记密码页面1
	*/
	public function forgetPwd1(){
		return $this->fetch('forget_password1');
	}

	/*
	*忘记密码页面2
	*/
	public function forgetPwd2(){
		$this->assign('phone',input('get.phone'));
		return $this->fetch('forget_password2');
	}

	/*
	*忘记密码页面3
	*/
	public function forgetPwd3(){
		return $this->fetch('forget_password3');
	}

	/*
	*账号注册AJAX
	*/
	public function registAjax(){
	    //判断是否AJAX提交
        if(!$this->request->isAjax()){
        	return '非AJAX提交';
        }

        $where['phone'] = input('post.phone');
        $judInfo = Db::table('user')->where($where)->find();
        if($judInfo){
            return '该手机号已被注册，如有疑问请联系网站管理员';
        }

        $res=$this->validate(['captcha'=>input('code')],['captcha|验证码'=>'require|captcha']);
        if($res!=1){
            return '图形验证码错误';
        }

        $code=Cookie::get('code');
        if($code != input('post.vcode')){
        	return '验证码错误，请输入正确的验证码';
        }

        //添加账号
        $data['phone'] = input('post.phone');
        $data['password'] = md5(input('post.pwd1'));
        $addInfo = Db::table('user')->insert($data);
        if(!$addInfo){
        	return '网络繁忙，请稍后再试。';
        }
        return '注册成功';
	}

	public function sendSms(){

        $user = Db::table('user')->where("phone","=",input("tel"))->find();
	    if(input("type")=="registe"){
	        //注册的时候判断是否已注册
            if(!empty($user)) return "no";
        }elseif (input("type")=="forget"){
	        //忘记密码的时候判断是否已注册
            if(empty($user)) return "no";
        }

        $params = array ();
        $str='';
        for ($i=0;$i<6;$i++){
            $str.=rand(0,9);
        }

        // *** 需用户填写部分 ***

        // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
        $accessKeyId = "LTAIa85Wfrg86vyf";
        $accessKeySecret = "n1MC0FBkfrbZBdSCOnDMUjfbRjqHCE";

        // fixme 必填: 短信接收号码
        $params["PhoneNumbers"] = input("tel");

        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $params["SignName"] = "点对点网络";

        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = "SMS_138495299";

        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
        $params['TemplateParam'] = Array (
            "code" => $str,
            //"product" => "阿里通信"
        );

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";

        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        // fixme 选填: 启用https
        // ,true
        );
        Cookie::set("code",$str,60*5);
        return "yes";
        //echo $str;
        //return $content;
    }

	/*
	*忘记密码1AJAX
	*/
	public function forgetPwd1Ajax(){
		//判断是否AJAX提交
        if(!$this->request->isAjax()){
        	return '非AJAX提交';
        }

        $res=$this->validate(['captcha'=>input('code')],['captcha|验证码'=>'require|captcha']);
        if($res!=1){
            return '图形验证码错误';
        }

        $code = Cookie::get("code");
        if($code != input('post.vcode')){
        	return '验证码错误，请输入正确的验证码';
        }
        $where['phone'] = input('post.phone');
        $judInfo = Db::table('user')->where($where)->find();
        if(!$judInfo){
        	return '该手机号无注册信息，快去注册吧';
        }

        //数据传递
        $msg['info'] = '成功';
        $msg['data'] = input('post.phone');
        return $msg;
	}

	/*
	*忘记密码2AJAX
	*/
	public function forgetPwd2Ajax(){
		//判断是否AJAX提交
        if(!$this->request->isAjax()){
        	return '非AJAX提交';
        }
        //数据验证
        if(!input('post.phone') || !is_numeric(input('post.phone')) || input('post.pwd1') != input('post.pwd2')){
            return '网络繁忙，请稍后再试。';
        }
        $where['phone'] = input('post.phone');
        $judInfo = Db::table('user')->where($where)->find();
        if(!$judInfo){
        	return '网络繁忙，请稍后再试。';
        }
        if($judInfo['password'] == md5(input('post.pwd1'))){
        	return '修改的密码与原密码相同';
        }
        
        //保存数据
        $data['password'] = md5(input('post.pwd1'));
        $updInfo = Db::table('user')->where($where)->update($data);
        if(!$updInfo){
        	return '网络繁忙，请稍后再试。';
        }

        return '成功';
	}

	/*
	*新闻
	*/
	public function newsAjax(){
		$newsList = Db::table('bbk_news_api')-> order('published_time desc') -> limit(10) -> select();
		return json_encode($newsList);
	}

	/*
	*人物
	*/
	public function baikeAjax(){
        $baikeList = Db::table('baike')-> where('cont_type = 3') -> limit(10) -> select();
        return json_encode($baikeList);
	}

    //退出账号
	public  function loginout(){
	    Session::clear();
	    $this->redirect(url("Index/index"));
    }

    //切换账号
    public function switchLogin(){
        Session::clear();
        $this->redirect("Login/login");
    }

    //微信登录
    public function wxIndex(){
        //--微信登录-----生成唯一随机串防CSRF攻击
        $state  = md5(uniqid(rand(), TRUE));
        $_SESSION["wx_state"]    =   $state; //存到SESSION
        $callback = urlencode($this->callBackUrl);
        'https://open.weixin.qq.com/connect/qrconnect?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect';
        $wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid="
            .$this->appID."&redirect_uri="
            .$callback."&response_type=code&scope=snsapi_login&state="
            .$state."#wechat_redirect";
        header("Location: $wxurl");
    }

    public function wxBack(){
        if($_GET['state']!=$_SESSION["wx_state"]){
            echo 'sorry,网络请求失败...';
            exit("5001");
        }
        $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appID.'&secret='.$this->appSecret.'&code='.$_GET['code'].'&grant_type=authorization_code';
        $arr = curl_get_contents($url);
        //得到 access_token 与 openid
        $url='https://api.weixin.qq.com/sns/userinfo?access_token='.$arr['access_token'].'&openid='.$arr['openid'].'&lang=zh_CN';
        $user_info = curl_get_contents($url);
        $this->dealWithWxLogin($user_info);
    }

    /**
     * 根据微信授权用户的信息 进行下一步的梳理
     * @param $user_info
     */
    public function dealWithWxLogin($user_info){
        //TODO 数据处理
        var_dump($user_info);
        exit;
    }
}
