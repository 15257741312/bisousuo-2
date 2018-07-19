<?php
namespace app\index\controller;
use app\index\controller\Common;
use think\Request;
use think\Session;
use think\Db;

class Info extends Common{

    public function __construct(Request $request = null){
        parent::__construct();
        $this->isLogin();
    }

    public function index(){
        $res=Db::name("User")->where('phone','=',Session::get('tel'))->field('qq,username,sex,headimgurl')->find();
        $this->assign('res',$res);
        return $this->fetch("info");
    }

    public function api(){
        $accessKey = 'fb9bc4f5910d707aeb2ae18dffb04d14';
        $secretKey = '84ac32fc52133c12';
        
        $httpParams = array(
            'access_key' => $accessKey,
            'date' => time()
        );
        
        $signParams = array_merge($httpParams, array('secret_key' => $secretKey));
        
        ksort($signParams);
        $signString = http_build_query($signParams);

        $httpParams['sign'] = strtolower(md5($signString));
        
        // $url = 'http://api.coindog.com/topic/list?'.http_build_query($httpParams);
        $url = 'http://api.coindog.com/api/v1/symbols';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $curlRes = curl_exec($ch);
        curl_close($ch);
        
        $json = json_decode($curlRes, true);
        
        halt($json);
    }

    public function updateInfo(){
        $img_path="";
        if(input('img')){
            $img_path=$this->uploadimg(input('img'));
            $data['headimgurl']=$img_path;
        }
        $where['username']=input('username');
        $info = Db::table('user')->where($where)->find();
        if ($info['username'] == input('username') && $info['phone'] != Session::get('tel')) {
            return '用户名已存在';
        }
        
        $data['username']=input('username');
        $data['sex']=input("sex");
        $data['qq']=input("qq");
        Db::name('User')->where('phone','=',Session::get('tel'))->update($data);
        Session::set('username',input('username'));
        echo $img_path;
    }

    public function uploadimg($img){
        $up_dir = ROOT_PATH . 'public' . DS .'static'.DS.'uploads/';//存放在当前目录的upload文件夹下
        $base64_img = trim($img);
        if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $result)){
            $type = $result[2];
            if(in_array($type,array('pjpeg','jpeg','jpg','gif','bmp','png'))){
                $new_file = $up_dir.time().'.'.$type;
                if(file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_img)))){
                    $img_path = str_replace('../../..', '', $new_file);
                    $arr=explode("/",$img_path);
                    $len=count($arr);
                    $imgName=$arr[$len-1];
                    return  $imgName;
                }else{
                    return '图片上传失败';
                }
            }else{
                //文件类型错误
                return '图片上传类型错误';
            }
        }
    }

    public function invite(){

    }

    public function myindex(){
        $this->getMemInfo();

        return $this->fetch("myindex");
    }

    public function mywd_ask(){
        $this->getMemInfo();
        return $this->fetch("mywd_ask");
    }

    public  function mywd_answer(){
        $this->getMemInfo();
        return $this->fetch("mywd_answer");
    }

    //获取用户信息,分配当前控制器
    public function getMemInfo(){
        $tel=Session::get("tel");
        $mem=Db::name("user")->where("phone","=",$tel)->find();
        $mem['age']=round((time()-$mem['addtime'])/365/24/3600,1);
        $mem['post']=Db::name("bbs_post")->where("user_phone","=",$tel)->count();
        $mem['ask_c']=Db::name("bbs_ask")->where("user_phone","=",$tel)->count();
        $mem['spit']=Db::name("bbs_spit")->where("user_phone","=",$tel)->count();
//        halt($mem);
        $request=Request::instance();
        $this->assign("action",$request->action());
        $this->assign("mem",$mem);
    }
}