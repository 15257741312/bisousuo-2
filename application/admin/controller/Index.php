<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use think\Db;
use think\Paginator;

class Index extends Controller{
    
    /*
    *登陆页面
    */
    public function login(){
    	return $this->fetch();
    }

    /*
    *后台首页
    */
    public function index(){
    	return $this->fetch();
    }

    /*
    *词条列表页面
    */
    public function wordsList(){
        //查询条件
        $where = "bk.column_id = col.id and bk.delete_mark = 0";
        if(!empty(input('get.selTitle'))){
            $where .= " and bk.article_title like '%".input('get.selTitle')."%'"; 
        }
        if(!empty(input('get.selAuthor'))){
            $where .= " and bk.article_author like '%".input('get.selAuthor')."%'"; 
        }
        if(input('get.confirmType') != 0){
            $where .= " and examine_type = ".input('get.confirmType');
        }
        if(input('get.contType') != 0){
            $where .= " and cont_type = ".input('get.contType');
        }
        if(input('get.logoType') != 0){
            $where .= " and article_img = ''";
        }

        //查询数据
        $allarticle=Db::table('baike bk,bbk_column col')
                        ->where($where)
                        ->field('bk.article_id,bk.article_title,bk.article_time,bk.article_author,bk.examine_type,col.column_name,bk.cont_type')
                        ->order('bk.article_id desc')
                        ->paginate(15,false,[
                            'query' => [
                                'selTitle' => input('get.selTitle'),
                                'selAuthor' => input('get.selAuthor'),
                                'confirmType' => input('get.confirmType'),
                                'contType' => input('get.contType'),
                                'logoType' => input('get.logoType'),
                                ],
                            ]);

        $this->assign('selTitle',input('get.selTitle'));
        $this->assign('selAuthor',input('get.selAuthor'));
        $this->assign('confirmType',input('get.confirmType'));
        $this->assign('contType',input('get.contType'));
        $this->assign('logoType',input('get.logoType'));
	    $this->assign('allarticle',$allarticle);

    	return $this->fetch('words_list');
    }

    /*
    *添加内容页面
    */
    public function addContent(){
        $column=Db::table('bbk_column')->select();
        $this->assign('column',$column);
        return $this->fetch('add_content');
    }

    /*
    *编辑内容页面
    */
    public function editContent(){
        $where['article_id'] = input('get.id');
        $conInfo = Db::table('baike')->where($where)->find();
        $column=Db::table('bbk_column')->select();
        
        $this->assign('id',$where['article_id']);
        $this->assign('column',$column);
        $this->assign('conInfo',$conInfo);
        return $this->fetch('edit_content');
    }

    /*
    *预览页面
    */
    public function previewCont(){
        $where['id'] = input('get.id');
        $conInfo = Db::table('baike_pre') -> where($where) -> find();

        $this->assign('conInfo',$conInfo);
        return $this->fetch('preview_cont');
    }

    /*
    *审核页面
    */
    public function confirmCont(){
        $where['article_id'] = input('get.id');
        $conInfo = Db::table('baike') -> where($where) -> find();

        $this->assign('id',$where['article_id']);
        $this->assign('conInfo',$conInfo);
        return $this->fetch('confirm_cont');
    }

    /*
    *新闻列表页
    */
    public function newsList(){
        //条件判断
        if(!empty(input('get.selTitle'))){
            $listWhere['title'] = ['like',"%".input('get.selTitle')."%"];
        }
        if(!empty(input('get.startTime')) && !empty(input('get.endTime'))){
            $listWhere['published_time'] = array('between',array(input('get.startTime'),input('get.endTime')));
        }elseif (!empty(input('get.startTime')) && empty(input('get.endTime'))) {
            $listWhere['published_time'] = array('gt',input('get.startTime'));
        }elseif (empty(input('get.startTime')) && !empty(input('get.endTime'))) {
            $listWhere['published_time'] = array('lt',input('get.endTime'));
        }
        if(input('newsType') != 0){
            $listWhere['is_delete'] = input('newsType');
        }

        //查询数据
        if(empty($listWhere)){
            $newsList = Db::table('bbk_news_api')  -> order('published_time desc') -> paginate(10);
        }else{
            $newsList = Db::table('bbk_news_api') 
                            -> where($listWhere)  
                            -> order('published_time desc') 
                            -> paginate(10,false,[
                                'query' => [
                                    'selTitle' => input('get.selTitle'),
                                    'startTime' => input('get.startTime'),
                                    'endTime' => input('get.endTime'),
                                    'newsType' => input('get.newsType'),
                                    ],
                                ]);
        }

        $this->assign('newsList',$newsList);
        $this->assign('selTitle',input('get.selTitle'));
        $this->assign('startTime',input('get.startTime'));
        $this->assign('endTime',input('get.endTime'));
        $this->assign('newsType',input('newsType'));
        return $this -> fetch('news_list');
    }

    /*
    *轮播图管理
    */
    public function broadCastImg(){
        $broadCastImg = Db::table('broad_cast')->order('order')->select();

        $this->assign('broad_cast',$broadCastImg);
        return $this->fetch('broad_cast');
    }

    /*
    *登陆AJAX
    */
    public function loginAjax(){
    	//判断是否AJAX提交
    	if(!$this->request->isAjax()){
            return '非AJAX提交';
    	}

        //判断验证码
        $captcha = new Captcha();
        if(!$captcha->check(input('post.verify'))){
            return '验证码错误';
        }

        return '登陆成功';

        $user=Db('usertemp')->where(array('username'=>input('post.username')))->find();
        if(!$user || $user['password']!=input('post.password')){
            return '验证码账号或密码错误错误';
        }
        /*if ($user['`lock`']);
            {
            $this->error('用户被锁定');
            }*/
        //dump ($user);
        session('uid',$user['id']);
        session('username',$user['username']);
        session('logintime',date('Y-m-d H:i:s',$user['logintime']));
        session('loginip',$user['loginip']);
        setcookie("username","$username",time()+3600);

        return '登陆成功';
    }

    

    /*
    *词条添加AJAX
    */
    public function addContentAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }
        //数据库
        $data['column_id'] = input('post.column');
    	$data['article_title']= input('post.title');
        $data['title_min'] = input('post.title_min');
        $data['special_subject'] = input('post.special');
    	$data['article_description']= input('post.abstract');
    	$data['article_content']= input('post.editor');
        $data['article_author'] = input('post.author');
        $data['article_img'] = input('post.article_img');
        $data['tag'] = input('post.tag');
        $data['source'] = input('post.source');
        $data['source_addr'] = input('post.source_addr');
        $data['ordi_vip'] = input('post.ordi_vip');
        $data['seni_vip'] = input('post.seni_vip');
        $data['cont_type'] = input('post.cont_type');
        $data['transaction'] = input('post.transaction');
    	$data['article_time']=time();
    	$data['modify_time']=time();
    	$data['article_url']="www.bbk.com";
    	$data['article_reference']="www.bbk.com";
    	$data['article_dajiashuo']="www.bbk.com";
    	$data['editor_id']="1234";
        $data['examine_type'] = 1;

        //判断是否存在同样的内容
        $where['article_title'] = $data['article_title'];
        $judInfo = Db::table('baike') -> where($where) -> find();
        if($judInfo){
            return '新增失败';
        }

    	$result=Db::table('baike')->insert($data);
        if (!$result) {
            return '网络繁忙，请稍后再试';
        }
        return '新增成功';
    }

    /*
    *词条修改AJAX
    */
    public function editContentAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }
        
        //数据库
        $where['article_id'] = input('post.id');
        $data['column_id'] = input('post.column');
        $data['article_title']= input('post.title');
        $data['title_min'] = input('post.title_min');
        $data['special_subject'] = input('post.special');
        $data['article_description']= input('post.abstract');
        $data['article_content']= input('post.editor');
        $data['article_author'] = input('post.author');
        $data['article_img'] = input('post.article_img');
        $data['tag'] = input('post.tag');
        $data['source'] = input('post.source');
        $data['source_addr'] = input('post.source_addr');
        $data['ordi_vip'] = input('post.ordi_vip');
        $data['seni_vip'] = input('post.seni_vip');
        $data['cont_type'] = input('post.cont_type');
        $data['transaction'] = input('post.transaction');
        $data['modify_time']=time();
        $data['article_url']="www.bbk.com";
        $data['article_reference']="www.bbk.com";
        $data['article_dajiashuo']="www.bbk.com";
        $data['editor_id']="1234";
        $data['examine_type'] = 1;
        $result=Db::table('baike')->where($where)->update($data);
        if(!$result){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *词条预览AJAX
    */
    public function previewContAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }
        $data['column_id'] = input('post.column');
        $data['article_title']= input('post.title');
        $data['title_min'] = input('post.title_min');
        $data['special_subject'] = input('post.special');
        $data['article_description']= input('post.abstract');
        $data['article_content']= input('post.editor');
        $data['article_author'] = input('post.author');
        $data['tag'] = input('post.tag');
        $data['source'] = input('post.source');
        $data['source_addr'] = input('post.source_addr');
        $data['ordi_vip'] = input('post.ordi_vip');
        $data['seni_vip'] = input('post.seni_vip');
        $data['cont_type'] = input('post.cont_type');
        $data['article_time']=time();
        $data['modify_time']=time();
        $data['article_url']="www.bbk.com";
        $data['article_reference']="www.bbk.com";
        $data['article_dajiashuo']="www.bbk.com";
        $data['editor_id']="1234";
        $data['examine_type'] = 1;
        if (!input('post.id')) {
            $data['article_id'] = 0;
        }else{
            $data['article_id'] = input('post.id');
        }
        $addInfo = Db::table('baike_pre') -> insertGetId($data);
        if(!$addInfo){
            return '网络繁忙，请稍后再试';
        }
        return $addInfo;
    }

    /*
    *词条删除AJAX
    */
    public function delArtAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['article_id'] = input('post.id');
        $data['delete_mark'] = 1;
        $delArt = Db::table('baike')-> where($where) -> update($data);
        if(!$delArt){
            return '网络繁忙，请稍后再试';
        }
        return '删除成功';
    }

    /*
    *词条审核AJAX
    */
    public function confirmContAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['article_id'] = input('post.id');
        $data['examine_type'] = input('post.type');
        
        $updCont = Db::table('baike') -> where($where) -> update($data);
        if(!$updCont){
            return '网络繁忙，请稍后再试';
        }
        return '操作成功';
    }

    /*
    *新闻隐藏AJAX
    */
    public function delNewsAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['news_id'] = input('post.id');
        $data['is_delete'] = input('post.type');
        $updNews = Db::table('bbk_news_api') -> where($where) -> update($data);
        if(!$updNews){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *轮播图上传
    */
    public function broadCastAjax(){
        // 获取上传文件 
        $file = request() -> file('myfile'); 
        // 验证图片,并移动图片到框架目录下。 
        $info = $file 
                -> validate(['ext' => 'jpg,png,jpeg','type' => 'image/jpg,image/jpeg,image/png'])
                -> rule('broad_cast')
                -> move(ROOT_PATH.'public'.DS.'broadcast',true,false); 
        if($info){ 
            $imgName = $str = str_replace(DS,'/',$info -> getSaveName());
            $data['img_url'] = $imgName;
            $data['create_time'] = time();
            $data['order'] = 0;
            $addBoardCast = Db::table('broad_cast') -> insert($data);
            //返回图片地址
            return '添加成功';
        }else{ 
            // 文件上传失败后的错误信息 
            $mes = $file->getError(); 
            return $mes;
        }
    }

    /*
    *轮播图删除Ajax
    */
    public function broadCastDelAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }
        $delInfo = Db::table('broad_cast') -> delete(input('post.id'));
        if(!$delInfo){
            return '网络繁忙，请稍后再试';
        }
        return '删除成功';
    }

    /*
    *轮播图修改顺序Ajax
    */
    public function updImgOrderAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['id'] = input('post.id');
        $data['order'] = input('post.order');
        $updInfo = Db::table('broad_cast') -> where($where) -> update($data);

        return '修改成功';
    }

    /*
    *logo上传
    */
    public function logoUploadAjax(){
        // 获取上传文件 
        $file = request() -> file('myfile'); 
        // 验证图片,并移动图片到框架目录下。 
        $info = $file 
                -> validate(['ext' => 'jpg,png,jpeg','type' => 'image/jpg,image/jpeg,image/png'])
                -> rule('board')
                -> move(ROOT_PATH.'public'.DS.'upload',true,false); 
        if($info){ 
            $imgName = $str = str_replace(DS,'/',$info -> getSaveName());
            //返回图片地址
            return $imgName;
        }else{ 
            // 文件上传失败后的错误信息 
            $mes = $file->getError(); 
            return $mes;
        }
    }

    /*
    *验证码生成
    */
    public function verify(){
        $captcha = new Captcha();
        return $captcha->entry();
    }

}
