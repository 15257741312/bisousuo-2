<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
Vendor('phpQuery.phpQuery');

class Match extends Controller{

    //所有词条匹配
    public function matchWordsList(){

        //查出所有数据
        $arr=Db::table("baike")->field("article_id,article_title,article_content,article_url")->order("article_id desc")->select();
        foreach ($arr as $k => $v) {
            $arrKeyWords[$k]['words'] = $v['article_title'];
            $arrKeyWords[$k]['url'] = $v['article_url'];
            $arrKeyWords[$k]['len']=mb_strlen($v['article_title'],"utf-8");
        }

        //将待匹配词条按长度降序排序
        for ($i=0;$i<count($arrKeyWords)-1;$i++){
            for($j=0;$j<count($arrKeyWords)-1-$i;$j++){
                if($arrKeyWords[$j]['len']<$arrKeyWords[$j+1]['len']){
                    $temp=$arrKeyWords[$j];
                    $arrKeyWords[$j]=$arrKeyWords[$j+1];
                    $arrKeyWords[$j+1]=$temp;
                }
            }
        }

        //提取每一个词条
        foreach ($arr as $key=>$val){
            if($key<=50000){         //测试时，取前10个数据测试，项目上线后可删除该代码即可
                $doc = \phpQuery::newDocumentXHTML($val['article_content']);
                //将所有词条名称与id存入数组
                $artlist = pq(">p");
                foreach ($artlist as $k=>$li){
                    $text=pq($li)->text();      //提取每一段的文本;

                    //循环每个词条,若存在,则存入数组,后将该数组内有被包含关系的词条删出此数组
                    $arrTemp=array();
                    foreach ($arrKeyWords as $k2=>$v2){
                        if(strstr($text,$v2['words'])){
                            $arrTemp[]=$v2;
                        }
                    }

                    $count=count($arrTemp);

                    $innerArr=array();
                    foreach ($arrTemp as $k3 => $v3) {
                        for ($i = $k3+1; $i < $count; $i++) {
                            if (strstr($v3['words'], $arrTemp[$i]['words'])) {
                                $innerArr[$i]=$arrTemp[$i];     //被包含的字符存入数组
                            }
                        }
                    }
                    $arrNeed=array_diff_key($arrTemp,$innerArr);    //临时数组中删除被包含数组
                    foreach ($arrNeed as $k4=>$v4){
                        if(strstr($text,$v4['words'])){
                            $replaceWords="<a href='".$v4['url']."'>".$v4['words']."</a>";
                            $text= str_replace_limit($v4['words'], $replaceWords, $text, 1);
                        }
                    }
                    pq($li)->html($text);
                }

                $map['article_id']=$val['article_id'];
                $data['article_content']=$artlist;
                Db::table("baike")->where($map)->update($data);
                \phpQuery::$documents=array();
            }
        }
        return;
    }


    //单个词条匹配
    //$id : 词条id
    //项目部署后，先将全局匹配一次，后可随意调用该方法
    public function matchWordsOne($id=5){
        $oneWords=Db::table("baike")->field("article_id,article_title,article_content,article_url")->where("article_id","=",$id)->find();
        $arr=Db::table("baike")->field("article_id,article_title,article_content,article_url")->order("article_id desc")->select();

        //将该词条的内容与之前所有词条匹配
        foreach ($arr as $k => $v) {
            $arrKeyWords[$k]['words'] = $v['article_title'];
            $arrKeyWords[$k]['url'] = $v['article_url'];
            $arrKeyWords[$k]['len']=mb_strlen($v['article_title'],"utf-8");
        }
        $doc = \phpQuery::newDocumentXHTML($oneWords['article_content']);
        //将所有词条名称与id存入数组
        $artlist = pq(">p");
        foreach ($artlist as $k=>$li){
            echo $text=pq($li)->text();      //提取每一段的文本;
            echo "<hr>";
            //循环每个词条,若存在,则存入数组,后将该数组内有被包含关系的词条删出此数组
            $arrTemp=array();
            foreach ($arrKeyWords as $k2=>$v2){
                if(strstr($text,$v2['words'])){
                    $arrTemp[]=$v2;
                }
            }

            $count=count($arrTemp);

            $innerArr=array();
            foreach ($arrTemp as $k3 => $v3) {
                for ($i = $k3+1; $i < $count; $i++) {
                    if (strstr($v3['words'], $arrTemp[$i]['words'])) {
                        $innerArr[$i]=$arrTemp[$i];     //被包含的字符存入数组
                    }
                }
            }
            $arrNeed=array_diff_key($arrTemp,$innerArr);    //临时数组中删除被包含数组
            foreach ($arrNeed as $k4=>$v4){
                if(strstr($text,$v4['words'])){
                    $replaceWords="<a href='".$v4['url']."'>".$v4['words']."</a>";
                    $text= str_replace_limit($v4['words'], $replaceWords, $text, 1);
                }
            }
            echo $text."<hr>";
            pq($li)->html($text);
        }
        $map['article_id']=$oneWords['article_id'];
        $data['article_content']=$artlist;
        Db::table("baike")->where($map)->update($data);
        \phpQuery::$documents=array();


        //将之前的所有词条与该新增词条匹配


        //提取每一个词条

        foreach ($arr as $key=>$val){
            $arrTemp=array();
            if(strstr($val['article_title'],$oneWords['article_title'])){
                $arrTemp[]=$val['article_title'];
            }
            print_r($arrTemp);
            $doc = \phpQuery::newDocumentXHTML($val['article_content']);
            $artlist = pq(">p");
            foreach ($artlist as $k => $li) {
                $content = pq($li)->html();      //提取每一段的文本;
                echo $content."<hr>";
                //首先判断之前的词条是否包含该词条
                if(!empty($arrTemp)){
                    $flag=true;
                    //如果包含
                    foreach ($arrTemp as $k2=>$v2){
                        //判断该文本是否包含查询到的词条
                        if(strstr($content,$v2)){
                           $flag=false;
                        }
                    }
                    if($flag){
                        //如果文本没有包含查询到的词条,匹配该词条
                        $replaceWords = "<a href='" . $oneWords['article_url'] . "'>" . $oneWords['article_title'] . "</a>";
                        $content = str_replace_limit($oneWords['article_title'], $replaceWords, $content, 1);
                    }
                }else{
                    //如果没有包含
                    $replaceWords = "<a href='" . $oneWords['article_url'] . "'>" . $oneWords['article_title'] . "</a>";
                    $content = str_replace_limit($oneWords['article_title'], $replaceWords, $content, 1);
                }
                echo  $content.'<hr/>';
                pq($li)->html($content);
            }
            $map['article_id'] = $val['article_id'];
            $data['article_content'] = $artlist;
            Db::table("baike")->where($map)->update($data);
            //释放内存
            \phpQuery::$documents=array();
        }
    }

}
