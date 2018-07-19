<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Bbs extends Controller{
    /*
    *币吧列表页
    */
    public function boardList(){
        //条件判断
        if(!empty(input('get.selTitle'))){
            $where['smbo_title'] = input('get.selTitle');
        }
        if(input('get.examineType') != 0){
            $where['examine_type'] = input('get.examineType');
        }
        if(input('get.isLock') != 0){
            $where['is_lock'] = input('get.isLock');
        }
        if(input('isDelete') != 0){
            $where['is_delete'] = input('isDelete');
        }

        //数据查询
        if(empty($where)){
            $boardList = Db::table('bbs_small_board') -> order('id desc') -> paginate(10);
        }else{
            $boardList = Db::table('bbs_small_board') 
                            -> order('id desc') 
                            -> where($where) 
                            -> paginate(10,false,[
                                    'query' => [
                                        'selTitle' => input('get.selTitle'),
                                        'examineType' => input('get.examineType'),
                                        'isLock' => input('get.isLock'),
                                        'isDelete' => input('get.isDelete'),
                                    ],
                                ]);
        }

        $this->assign('selTitle',input('get.selTitle'));
        $this->assign('examineType',input('get.examineType'));
        $this->assign('isLock',input('get.isLock'));
        $this->assign('isDelete',input('isDelete'));
        $this->assign('boardList',$boardList);
        return $this->fetch('board_list');
    }

    /*
    *币吧信息编辑页
    */
    public function editBoard(){
        $where['id'] = input('get.id');
        $boardInfo = Db::table('bbs_small_board') -> where($where) -> find();

        $this->assign('id',$where['id']);
        $this->assign('boardInfo',$boardInfo);
        return $this->fetch('edit_board');
    }

    /*
    *帖子列表页
    */
    public function postList(){
        //条件判断
        $where = "post_smbo_id = ".input('get.id');
        if(!empty(input('get.selTitle'))){
            $where .= " and post_title like '%".input('get.selTitle')."%'"; 
        }
        if(input('get.isLock') != 0){
            $where .= " and post_islock = ".input('get.isLock');
        }
        if(input('get.isDelete') != 0){
            $where .= " and post_delete = ".input('get.isDelete');
        }
        if(input('get.topType') != 0){
            if(input('get.topType') == 1){
                $where .= " and small_top = 2";
            }else{
                $where .= " and big_top = 2";
            }
        }

        $postList = Db::table('bbs_post') 
                        -> where($where) 
                        -> order('post_create_time desc') 
                        -> paginate(10,false,[
                                'query' => [
                                    'id' => input('get.id'),
                                    'selTitle' => input('get.selTitle'),
                                    'isDelete' => input('get.isDelete'),
                                    'isLock' => input('get.isLock'),
                                    'topType' => input('get.topType'),
                                ],
                            ]);

        $this->assign('id',input('get.id'));
        $this->assign('boardId',input('get.boardId'));
        $this->assign('selTitle',input('get.selTitle'));
        $this->assign('isLock',input('get.isLock'));
        $this->assign('isDelete',input('get.isDelete'));
        $this->assign('topType',input('get.topType'));
        $this->assign('postList',$postList);
        return $this->fetch('post_list');
    }

    /*
    *帖子置顶设置页
    */
    public function postTop(){
        $where['post_id'] = input('get.id');

        $postInfo = Db::table('bbs_post') -> where($where) -> find();
        $this->assign('id',$where['post_id']);
        $this->assign('boardId',input('get.boardId'));
        $this->assign('postInfo',$postInfo);
        return $this->fetch('post_top');
    }

    /*
    *评论列表页
    */
    public function replyList(){
        //条件判断
        $where = "reply_post_id = ".input('get.id');
         if(!empty(input('get.selTitle'))){
            $where .= " and reply_content like '%".input('get.selTitle')."%'"; 
        }
        if(input('isDelete') != 0){
            $where .= " and is_delete = ".input('isDelete');
        }
        //数据查询
        $replyList = Db::table('bbs_reply')
                        -> where($where)
                        -> order('reply_create_time desc')
                        -> paginate(10,false,[
                                'query' => [
                                    'id' => input('get.id'),
                                    'selTitle' => input('get.selTitle'),
                                    'isDelete' => input('get.isDelete'),
                                ],
                            ]);

        $this->assign('id',input('get.id'));
        $this->assign('selTitle',input('get.selTitle'));
        $this->assign('isDelete',input('isDelete'));
        $this->assign('replyList',$replyList);
        return $this->fetch('reply_list');
    }

    /*
    *提问页面
    */
    public function ask(){
        if(input("selTitle")){
            $map['a.title']=['like',"%".input("selTitle")."%"];
            $this->assign("selTitle",input("selTitle"));
        }
        if(input("selAuthor")){
            $map['u.username']=['like',"%".input("selAuthor")."%"];
            $this->assign("selAuthor",input("selAuthor"));
        }
        if(input('newsType')==1){
            $map['a.is_delete']=1;
        }elseif (input('newsType')==2){
            $map['a.is_delete']=2;
        }

        $this->assign('newsType',input('newsType'));

        $arr=Db::table("bbs_ask")->alias("a")->where($map)->join("user u","a.user_id=u.id","left")->field("a.*,u.username")->order("a.id desc")->paginate(10);
        $this->assign("arr",$arr);
        return $this->fetch("ask_list");
    }

    /*
    *显示或者隐藏提问
    */
     public function hideAsk(){
         $map['id']=input("id");
         $data="";

         if(input("type")==1){
             $data['is_delete']=1;
         }elseif(input("type")==2){
             $data['is_delete']=2;
         }
         Db::name("bbs_ask")->where($map)->update($data);
         $msg['msg']="修改成功!";
         echo json_encode($msg);
     }

     /*
     *删除提问
     */
    public function delAsk(){
        $map['id']=input("id");
        Db::name("bbs_ask")->where($map)->delete();
        $msg['msg']="删除成功!";
        echo json_encode($msg);
    }

    /*
     *编辑提问
     */
    public  function editAsk(){
        if(input('edit_id')){
            $map['id']=input('edit_id');
            $data['title']=input('title');
            $data['content']=input('editor');
            Db::name("bbs_ask")->where($map)->update($data);
            $msg['msg']="删除成功!";
            return json_encode($msg);
        }
        $map['a.id']=input("id");
        $oneData=Db::name("bbs_ask")->alias("a")->where($map)->join("user u",'a.user_id=u.id')->find();
        $this->assign("oneData",$oneData);
        return $this->fetch("ask_edit_content");
    }

    /*
     *预览提问
     */
    public  function previewAskEdit(){
        $map['id']=input("id");
        $data['title']=input("title");
        $data['user_id']=input("user_id");
        $data['commend_num']=input("commend_num");
        $data['addtime']=input("addtime");
        $data['is_delete']=input("is_delete");
        $data['content']=input("editor");
        $id=Db::name("bbs_ask_pre")->insertGetId($data);
        $msg['id']=$id;
        echo json_encode($msg);
    }

    /*
     *显示提问预览内容
     */
    public  function previewAsk(){
        $map['a.id']=input("id");
        $oneData=Db::name("bbs_ask_pre")->alias("a")->where($map)->join("user u",'a.user_id=u.id')->find();
        $this->assign("oneData",$oneData);
        return $this->fetch("preview_ask");
    }

    /*
     *显示回答页面
     */
    public function  answer(){

        if(input("selContent")){
            $map['an.content']=['like',"%".input("selContent")."%"];
            $this->assign("selContent",input("selContent"));
        }
        if(input("selTitle")){
            $map['a.title']=['like',"%".input("selTitle")."%"];
            $this->assign("selTitle",input("selTitle"));
        }
        if(input("selAuthor")){
            $map['u.username']=['like',"%".input("selAuthor")."%"];
            $this->assign("selAuthor",input("selAuthor"));
        }
        if(input('newsType')==1){
            $map['an.is_delete']=1;
        }elseif (input('newsType')==2){
            $map['an.is_delete']=2;
        }
        $this->assign('newsType',input('newsType'));

        $arr=Db::table("bbs_answer")->alias("an")->where($map)->join("user u","an.user_id=u.id")->join("bbs_ask a","an.ask_id=a.id")->field("an.*,u.username,a.title ask_title,a.id ask_id")->order("an.id desc")->paginate(10);
        $this->assign("arr",$arr);
        return $this->fetch("answer_list");
    }

    /*
    *敏感词列表页
    */
    public function SensWordsList(){
        $sensWords = Db::table('sensitive_words') -> order('id desc') -> paginate(10);
        $this->assign('sensWords',$sensWords);
        return $this->fetch('sensitive_words');
    }

    /*
    *显示或者隐藏回答
    */
    public function hideAnswer(){
        $map['id']=input("id");
        $data="";

        if(input("type")==1){
            $data['is_delete']=1;
        }elseif(input("type")==2){
            $data['is_delete']=2;
        }
        Db::name("bbs_answer")->where($map)->update($data);
        $msg['msg']="修改成功!";
        echo json_encode($msg);
    }

    /*
    *删除回答
    */
    public function delAnswer(){
        $map['id']=input("id");
        Db::name("bbs_answer")->where($map)->delete();
        $msg['msg']="删除成功!";
        echo json_encode($msg);
    }

    /*
    *编辑回答
    */
    public  function editAnswer(){
        if(input('updateid')){
            $map['id']=input("updateid");
            $data['content']=input("con");
            Db::name("bbs_answer")->where($map)->update($data);
            $msg['msg']="修改成功!";
            echo json_encode($msg);
            return ;
        }
        $map['an.id']=input("id");
        $arr=Db::table("bbs_answer")->alias("an")->where($map)->join("user u","an.user_id=u.id")->join("bbs_ask a","an.ask_id=a.id")->field("an.*,u.username,a.title ask_title,a.id ask_id")->order("an.id desc")->find();
        $this->assign("oneData",$arr);
        return $this->fetch("answer_edit_content");
    }

    /*
    *币吧锁定AJAX
    */
    public function lockBoardAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['id'] = input('post.id');
        $data['is_lock'] = input('post.type');
        $updNews = Db::table('bbs_small_board') -> where($where) -> update($data);
        if(!$updNews){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *币吧隐藏AJAX
    */
    public function delBoardAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['id'] = input('post.id');
        $data['is_delete'] = input('post.type');
        $updNews = Db::table('bbs_small_board') -> where($where) -> update($data);
        if(!$updNews){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *币吧编辑AJAX
    */
    public function editBoardAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['id'] = input('post.id');
        $data['smbo_title'] = input('post.title');
        $data['smbo_description'] = input('post.desc');
        $data['smbo_admin'] = input('post.admin');
        $data['smbo_logo'] = input('post.logo');

        $updBoardInfo = Db::table('bbs_small_board')  -> where($where) -> update($data);
        if(!$updBoardInfo){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *帖子锁定AJAX
    */
    public function lockPostAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['post_id'] = input('post.id');
        $data['post_islock'] = input('post.type');
        $updNews = Db::table('bbs_post') -> where($where) -> update($data);
        if(!$updNews){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *帖子隐藏AJAX
    */
    public function delPostAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['post_id'] = input('post.id');
        $data['post_delete'] = input('post.type');
        $updNews = Db::table('bbs_post') -> where($where) -> update($data);
        if(!$updNews){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *回复隐藏AJAX
    */
    public function delReplyAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['id'] = input('post.id');
        $data['is_delete'] = input('post.type');
        $updNews = Db::table('bbs_reply') -> where($where) -> update($data);
        if(!$updNews){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *设置帖子置顶AJAX
    */
    public function setTopAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }

        $where['post_id'] = input('post.id');
        if(input('post.top_type') == 1){
            $data['small_top'] = input('post.type');
        }else{
            $data['big_top'] = input('post.type');
        }

        $updPostInfo = Db::table('bbs_post') -> where($where) -> update($data);
        if(!$updPostInfo){
            return '网络繁忙，请稍后再试';
        }
        return '修改成功';
    }

    /*
    *新增敏感词AJAX
    */
    public function addSensWordsAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }
        $text = input('post.text');
        $text = str_replace('，',',',$text);
        $text = explode(',',$text);
        $num = 0;
        foreach ($text as $key => $value) {
            $data['text'] = $value;
            $judge = Db::table('sensitive_words') -> where($data) -> find();
            if(!$judge){
                Db::table('sensitive_words') -> insert($data);
                $num = $num + 1;
            }
        }

        return $num;
    }

    /*
    *删除敏感词AJAX
    */
    public function delSensWordsAjax(){
        //判断是否AJAX提交
        if(!$this->request->isAjax()){
            return '非AJAX提交';
        }
        $delInfo = Db::table('sensitive_words') -> delete(input('post.id'));
        if(!$delInfo){
            return '网络繁忙，请稍后再试';
        }
        return '删除成功';
    }
}
