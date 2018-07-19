<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use QL\QueryList;

Vendor ("phpQuery.phpQuery");

//运行条件
//1.windows下的PHP，只需要到php.ini中把extension=php_openssl.dll前面的;删掉，重启服务就可以了。
//2.linux下的PHP，就必须安装openssl模块，安装好了以后就可以访问了。
//3.php.ini里面设置max_execution_time=3000;
class Grab extends Controller{

    public function index(){
        //$this->babit_indexParam();
        //$this->huoqiu_index();
        $this->liandede_index();
        $this->btc123_index();
        $this->lianshijie_index();
        $this->biyuan_index();
        $this->qukuailianzww_index();
        $this->lianhu_index();
        $this->weilai_index();
        $this->lianbao_index();
        $this->bibite_index();
        $this->buluoke_index();
        $this->bitoutiao_index();
        $this->haitun_index();
    }

    //首页
    //实际只需抓取首页新闻即可;首页新闻已包含其他模块新闻
    function babit_indexParam(){
        $url="http://www.8btc.com";
        \phpQuery::newDocumentFile($url);
        $artlist=pq(".article ");

        $arr=array();
        //全部循环，部分内容被隐藏可能无法抓取，每隔几分钟轮询，只需抓取前5条，则不会出现无法抓取
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的5个即可
            if($k<=4) {
                $href = pq($li)->find(">div")->eq(0)->find("a")->attr("href");
                $pic = pq($li)->find(">div")->eq(0)->find("img")->attr("src");
                $title = pq($li)->find(">div")->eq(1)->find(">div")->eq(1)->find("a")->attr("title");
                $time = pq($li)->find(">div")->eq(1)->find(">div")->eq(4)->find("span")->eq(0)->text();
                $arr[$k]['href'] = $href;
                $arr[$k]['pic'] = $pic;
                $arr[$k]['title'] = $title;
                $arr[$k]['time'] = $time;
                \phpQuery::newDocumentFile($href);
                $author = pq(".single-crumbs")->find("a")->eq(0)->text();      //作者
                $arr[$k]['author'] = $author;
                $arr[$k]['sitename'] = '巴比特';
            }
        }
        $this->insertData($arr);
    }

    //币乎模块开始,无法抓取
    function bihu_index(){
        $url="https://bihu.com/";
        $reg=[
            "pic"=>['a>img',"src"],
            "href"=>['a',"href","",function($content){
                return "http://www.chaindd.com/".$content;
            }],
            "title"=>["div>h3","text"],
            "author"=>['div.info>span>a','text'],
            "time"=>['div.info>span.author','text','-a -span',function($content){
                $arr_time = preg_split("/([0-9]+)/", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                switch ($arr_time[1]){
                    case "小时以前":
                        $time=time()-$arr_time[0]*60*60;
                        break;
                    case "昨天":
                        $time=time()-3600*24;
                        break;
                }
                return $time;
            }],
            "info"=>['div.cont>p','text'],
            "sitename"=>["","","",function($content){
                return "币乎";
            }],
        ];
        $rang=".post_part";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
        
    }

    //火球财经模块开始
    //首页模块内容已包含其余模块
    function huoqiu_index(){
        $url="https://www.ihuoqiu.com";
        \phpQuery::newDocumentFile($url);
        $artlist=pq("#panel1")->find(">a");
        $arr=array();
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            if($k<=23) {
                $href='https://www.ihuoqiu.com'.pq($li)->attr("href");
                $pic=pq($li)->find(">div")->find(">div")->find("img")->attr("src");
                $title=pq($li)->find(">div")->find(">div")->eq(1)->find(">div")->eq(0)->find(">h3")->text();
                $info=pq($li)->find(">div")->find(">div")->eq(1)->find(">div")->eq(0)->find(">p")->text();
                $author=pq($li)->find(">div")->find(">div")->eq(1)->find(">div")->eq(1)->find(">span")->eq(0)->text();
                $timeText=pq($li)->find(">div")->find(">div")->eq(1)->find(">div")->eq(1)->find(">span")->eq(3)->text();
                $arr_time = preg_split("/([0-9]+)/", $timeText, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                $time="";
                switch ($arr_time[1]){
                    case "分前":
                        $time=time()-$arr_time[0]*60;
                        break;
                    case "小时前":
                        $time=time()-$arr_time[0]*60*60;
                        break;
                    case "天前":
                        $time=time()-$arr_time[0]*3600*24;
                        break;
                }
                $time=intval($time);
                $arr[$k]['time_num']=$time;
                $time=date("Y-m-d H:i:s",$time);
                $arr[$k]['pic']=$pic;
                $arr[$k]['href']=$href;
                $arr[$k]['title']=$title;
                $arr[$k]['info']=$info;
                $arr[$k]['author']=$author;
                $arr[$k]['time']=$time;

                $att[$k]['sitename']='火球财经';
            }
        }
        $this->insertData($arr);
    }

    //链得得模块开始
    function liandede_index($sitename="链得得"){
        $url="http://www.chaindd.com/";
        $reg=[
            "pic"=>['a>img',"src"],
            "href"=>['a',"href","",function($content){
                return "http://www.chaindd.com/".$content;
            }],
            "title"=>["div>h3","text"],
            "author"=>['div.info>span>a','text'],
            "time"=>['div.info>span.author','text','-a -span',function($content){
                $arr_time = preg_split("/([0-9]+)/", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                switch ($arr_time[1]){
                    case "分钟前":
                        $time=time()-$arr_time[0]*60;
                        break;
                    case "小时以前":
                        $time=time()-$arr_time[0]*60*60;
                        break;
                    case "昨天":
                        $time=time()-3600*24;
                        break;
                    default :
                        $time=time();
                }
                return date('Y-m-d H:i:s',$time);
            }],
            "info"=>['div.cont>p','text'],
            "sitename"=>["","","",function($content){
                return "链得得";
            }],
        ];
        $rang=".post_part";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }

    //野马财经--无法抓取
    public  function yema_index(){
        $url="https://www.yemacaijing.com/";

    }

    //深链财经--无法抓取
    public  function shenlian_index(){
        $url="https://www.shenliancaijing.com/";
        $reg=[
        ];
        $rang="#article-col";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        print_r($data);
    }

    //36氪--无法抓取
    public  function kr_index(){
        $url="http://36kr.com/";
        $reg=[
            "pic"=>['li>div>div.info>div.info-list',"text"],
//            "href"=>['a',"href","",function($content){
//                return 'http://www.chaindd.com'.$content;
//            }],
//            "title"=>["div>h3","text"],
//            "author"=>['div.info>span>a','text'],
//            "time"=>['div.info>span.author','text','-a -span',function($content){
//                $arr_time = preg_split("/([0-9]+)/", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
//                switch ($arr_time[1]){
//                    case "小时以前":
//                        $time=time()-$arr_time[0]*60*60;
//                        break;
//                    case "昨天":
//                        $time=time()-3600*24;
//                        break;
//                }
//                return $time;
//            }],
//            "info"=>['div.cont>p','text']
        ];
        $rang=".feed_ul";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        print_r($data);
    }

    //btc123
    public  function btc123_index(){
        $url="http://news.btc123.com/news";
        $reg=[
            "pic"=>['.n_newspic>img',"src"],
            "href"=>['.n_newscontent>.n_newstitle>a',"href","",function($content){
                return "http://news.btc123.com/news".$content;
            }],
            "title"=>[".n_newscontent>.n_newstitle>a","title"],
            "time"=>['.n_newscontent>.n_newsicon>.n_newsdate','text','',function($content){
                return substr($content,0,-1);
            }],
            "author"=>['.n_newscontent>.n_newsicon>.slogo>a','text'],
            "info"=>['.n_newscontent>.n_newsnote','text'],
            "sitename"=>["","","",function($content){
                return "BTC123";
            }],
        ];
        $rang="#ershouli>ul>li";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }

    //链世界
    public  function lianshijie_index(){
        $url="https://www.7234.cn";
        $reg=[
            "pic"=>['a>img',"src"],
            "href"=>['a',"href","",function($content){
                return "https://www.7234.cn".$content;
            }],
            "title"=>[".item-right>.right-bd>h3","text"],
            "time"=>['.item-right>.item-footer>span','text'],
            "author"=>['.item-right>.item-footer>a:eq(1)','text','',function($content){
                return mb_substr($content,0,-2);
            }],
            "info"=>['.item-right>.right-bd>.a-list-desc','text'],
            "sitename"=>["","","",function($content){
                return "链世界";
            }],
        ];
        $rang=".article-item";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }


    //币源
    public  function biyuan_index(){
        $url="https://www.coingogo.com";
        $reg=[
            "pic"=>['a>img',"src",'',function($content){
                return "https://www.coingogo.com".$content;
            }],
            "href"=>['a',"href","",function($content){
                return "https://www.coingogo.com".$content;
            }],
            "title"=>[".news-content-text>a","text"],
            "time"=>['.news-content-text1 .news-content-text-right-time','text','',function($content){
                $arr_time = preg_split("/([0-9]+)/", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                switch ($arr_time[1]){
                    case "分钟前":
                        $time=time()-$arr_time[0]*60;
                        break;
                    case "小时前":
                        $time=time()-3600*$arr_time[0];
                        break;
                    case "天前":
                        $time=time()-3600*24*$arr_time[0];
                        break;
                }
                return date('Y-m-d H:i:s',$time);
            }],
            "author"=>['.news-content-text1 .news-content-text-right-name','text'],
            "info"=>"",
            "sitename"=>["","","",function($content){
                return "币源";
            }],
        ];
        $rang=".news-comment:eq(0)>ul>li";
        if(QueryList::get($url)->rules($reg)->range($rang)->query()->getData()){
            $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
            $this->insertData($data);
        }

    }


    //区块链中文网
    public  function qukuailianzww_index(){
        $url="http://www.qukuainews.cn";
        $reg=[
            "pic"=>['table tr div.J_articlePhotoBox a img',"src"],
            "href"=>['table tr div.J_articlePhotoBox a',"href","",function($content){
                return "http://www.qukuainews.cn/".$content;
            }],
            "title"=>['',"newsname",'',function($content){
                return iconv("UTF-8","ISO-8859-1",$content);
            }],
            "time"=>['table tr div.mixNewsStyleTitleContainer>span','text'],
            "author"=>["","","",function($content){
                return "区块链中文网";
            }],
            "info"=>["table tr p",'text','',function($content){
                return iconv("UTF-8","ISO-8859-1",$content);
            }],
            "sitename"=>["","","",function($content){
                return "区块链中文网";
            }],
        ];
        $rang="#newsList319>div.J_newsListLine ";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }

    //链虎财经
    public  function lianhu_index(){
        $url="https://www.chainhoo.com/";
        $reg=[
            "pic"=>['div.item-img>a:eq(0) img',"data-original"],
            "href"=>['a',"href"],
            "title"=>["div.item-img>a:eq(0) img","alt"],
            "time"=>['.item-content>.item-meta>span:eq(0)','text','',function($content){
                $arr_time = preg_split("/([0-9]+)/", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                switch ($arr_time[1]){
                    case "分钟前":
                        $time=time()-$arr_time[0]*60;
                        break;
                    case "小时前":
                        $time=time()-3600*$arr_time[0];
                        break;
                    case "天前":
                        $time=time()-3600*24*$arr_time[0];
                        break;
                }
                return date('Y-m-d H:i:s',$time);
            }],
            "author"=>['a',"href",'',function($content){
                if(!empty($content)){
                    \phpQuery::newDocumentFileHTML($content);
                    $artlist=pq(".entry-info")->find("a")->eq(0)->text();
                    return $artlist;
                }
            }],
            "info"=>[".item-content>.item-excerpt>p",'text'],
            "sitename"=>["","","",function($content){
                return "链虎";
            }],
        ];
        $rang=".item";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        for ($i=0;$i<=19;$i++){
            $data2[$i]=$data[$i];
        }
        $this->insertData($data2);
    }


    //未来财经
    public  function weilai_index(){
        $url="http://www.weilaicaijing.com";

        $reg=[
            "pic"=>['.item>a',"style",'',function($content){

                preg_match('/(?<=url\()[^)]+/sim', $content, $match);
                $match[0]=substr($match[0],1,-1);
                return $match[0];
            }],
            "href"=>['.item>a',"href","",function($content){
                return "http://www.weilaicaijing.com".$content;
            }],
            "title"=>['.item>.item-right>a',"title"],
            "time"=>['.item>.item-right>.item-information>.itemlook:eq(1)','text','',function($content){
                $arr_time = preg_split("/([0-9]+)/", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                switch ($arr_time[1]){
                    case "分钟前":
                        $time=time()-$arr_time[0]*60;
                        $time=date('Y-m-d H:i:s',$time);
                        break;
                    case "小时前":
                        $time=time()-3600*$arr_time[0];
                        $time=date('Y-m-d H:i:s',$time);
                        break;
                    default :
                        $time=$content." 00:00:00";
                        break;
                }
                return $time;
            }],
            "author"=>[".item>.item-right>.item-information>a","text"],
            "info"=>[".item>.item-right>p",'text'],
            "sitename"=>["","","",function($content){
                return "未来财经";
            }],
        ];
        $rang=".content-left-content>ul>li";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }

    //链豹财经--无法抓取
    public  function lianbao_index(){
        $url="http://www.chainpow.com";
        \phpQuery::newDocumentFile($url);
        echo $artlist=pq(".main-content")->find(".content1")->find("li");
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            //echo pq($li)->attr("data-text");
            if($k<=10) {
                // echo $li;
//
            }
        }
        $arr=array();

        //var_dump($arr);
    }

    //比特币之家
    public  function bibite_index(){
        $url="http://www.btc798.com";
        $reg=[
            "pic"=>['a img',"src"],
            "href"=>['a',"href","",function($content){
                return "http://www.btc798.com".$content;
            }],
            "title"=>['.home-news-item__main>a:eq(0)',"text"],
            "author"=>['.home-news-item__main>.home-news-item__main__meta>.home-news-item__main__meta__left a:eq(1)','text'],
            "time"=>[".home-news-item__main>.home-news-item__main__meta>.home-news-item__main__meta__left span:eq(0)","text"],
            "info"=>[".home-news-item__main>a:eq(1)",'text'],
            "sitename"=>["","","",function($content){
                return "比特币之家";
            }],
        ];
        $rang=".home-news-item";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }


    //布洛克财经
    public  function buluoke_index(){
        $url="http://www.youjiatuanjian.com";
        $reg=[
            "pic"=>['>a>div:eq(0)>img',"src",'',function($content){
                return "http://www.youjiatuanjian.com".$content;
            }],
            "href"=>['>a',"href","",function($content){
                return "http://www.youjiatuanjian.com".$content;
            }],
            "title"=>['>a>.wz_box>h3',"text"],
            "time"=>['>a>.wz_box>div:eq(1)>div:eq(0)>span','text','',function($content){
                $arr_time = preg_split("/([0-9]+)/", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                switch ($arr_time[1]){
                    case "分钟前":
                        $time=time()-$arr_time[0]*60;
                        break;
                    case "小时前":
                        $time=time()-3600*$arr_time[0];
                        break;
                    case "天前":
                        $time=time()-3600*24*$arr_time[0];
                        break;
                }
                return date('Y-m-d H:i:s',$time);
            }],
            "author"=>[">a>.wz_box>div:eq(1)>div:eq(1)>span","text"],
            "info"=>[">a>.wz_box>div:eq(0)",'text'],
            "sitename"=>["","","",function($content){
                return "布洛克财经";
            }],
        ];
        $rang=".news_list";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }

    //币头条
    public  function bitoutiao_index(){
        $url="http://www.tokenpapa.com/topic.html";

    }

    //海豚区块链
    public  function haitun_index(){
        $url="http://www.haitunbc.com";
        $reg=[
            "pic"=>['>div:eq(0)>a>img',"data-original"],
            "href"=>['>div:eq(0)>a',"href",'',function($content){
                return trim($content);
            }],
            "title"=>['>div:eq(0)>a>img',"alt"],
            "time"=>['>div:eq(1)>p:eq(1)>span','text'],
            "author"=>[">div:eq(0)>a","href","",function($content){
                \phpQuery::newDocumentFileHTML(trim($content));
                $artlist=pq(".aut_txt_span")->text();
                return mb_substr($artlist,3);
            }],
            "info"=>[">div:eq(1)>p:eq(2)",'text'],
            "sitename"=>["","","",function($content){
                return "海豚区块链";
            }],
        ];
        $rang=".article_list-layerD5D05EDA069189EF54DD02DD3A464BBC>ul>.wpart-border-line";
        $data=QueryList::get($url)->rules($reg)->range($rang)->query()->getData();
        $this->insertData($data);
    }

    //链向财经
    public  function lianxiang_index(){
        $url="https://www.chainfor.com/";


    }

    //存入数据
    public function  insertData($data){
        foreach ($data as $k=>$v){
            $map['title']=$v['title'];
            $id=Db::name("bbk_news_api")->where($map)->find();
            if(!$id){
                $addData[$k]=[
                    'title'=>$v['title'],
                    'summary'=>$v['info'],
                    'published_time'=>$v['time'],
                    'time_num'=>strtotime($v['time']) ,
                    'resource'=>$v['sitename'],
                    'url'=>$v['href'],
                    'author'=>$v['author'],
                    'thumbnail'=>$v['pic'],
                ];
                //如果是1970年1-1日的时间戳，转为当日的;
                if($addData[$k]['time_num']==0){
                    $addData[$k]['time_num']=time();
                }
            }
        }
        print_r($addData);
        if(!empty($addData)) Db::name('bbk_news_api')->insertAll($addData);
    }


}

