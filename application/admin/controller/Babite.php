<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
Vendor ("phpQuery.phpQuery");

class Babite extends Grab{

    //根据模块获取8比特网站数据
    public function grabBlock8bt($path,$sitename){
        switch($path){
            case "":
                $this->indexParam($sitename);
                break;
            case "/blockchain":
                $this->blockchain($sitename);
                break;
            case "/vc":
                $this->vc($sitename);
                break;
            case "/byb":
                $this->byb($sitename);
                break;
            case "/week":
                $this->week($sitename);
                break;
            case "/topic":
                $this->topic($sitename);
                break;
            case "/debate":
                $this->debate($sitename);
                break;
        }
    }

    //首页
    function indexParam($sitename){
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
                $arr[$k]['sitename'] = $sitename;
            }
        }
        var_dump($arr);
    }
//blockchain模块
    function blockchain($sitename){
        $artlist = pq(".item");
        $arr=array();
        foreach($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            if($k<=11) {
                $href = pq($li)->find("div")->eq(0)->find("a")->attr("href");
                $pic = pq($li)->find("div")->eq(0)->find("a")->find("img")->attr("data-original");
                $text = pq($li)->find('h2')->find("a")->text();
                $info = pq($li)->find("p")->html();
                $time = pq($li)->find("span")->html();
                preg_match_all("/(\d)/", $time, $match);      //匹配数字
                $num = "";
                foreach ($match[0] as $v) {
                    $num .= $v;
                }
                $str = str_replace($num, "", $time);        //去除数字
                switch ($str) {
                    case "分钟前":
                        $time = time() - $num * 60;
                        break;
                    case "小时前":
                        $time = time() - $num * 3600;
                        break;
                    case "天前":
                        $time = time() - $num * 3600 * 24;
                        break;
                }
                $info = trim($info);
                $arr[$k]['title'] = $text;
                $arr[$k]['href'] = $href;
                $arr[$k]['pic'] = $pic;
                $arr[$k]['info'] = $info;
                $arr[$k]['time'] = date("Y-m-d H:i:s", $time);

                \phpQuery::newDocumentFile($href);
                $author = pq(".single-crumbs")->find("a")->eq(0)->text();      //作者
                $arr[$k]['author'] = $author;
                $arr[$k]['sitename'] = $sitename;
            }
        }
        var_dump($arr);
    }

    function vc($sitename){
        $artlist = pq(".col-md-6");
        $arr=array();
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            if($k<=11) {
                $href = pq($li)->find("div")->find("div")->eq(0)->find("div")->eq(0)->find("a")->attr("href");
                $pic = pq($li)->find("div")->find("div")->eq(0)->find("div")->eq(0)->find("a")->find("img")->attr("src");
                $title=pq($li)->find(">div")->find(">div")->eq(0)->find(">div")->eq(1)->find("a")->attr("title");
                $info = trim(pq($li)->find(">div")->eq(0)->find(">div")->eq(1)->text());
                //$time = pq($li)->find("div")->eq(0)->find("div")->eq(5)->find("span")->eq(0)->text();
                $text=pq($li)->find(">div")->eq(0)->find(">div")->eq(2)->find(">span")->eq(0)->text();
                $time = mb_substr($text, -16, 16, "utf-8");
                $author = mb_substr($text, 0, -17, "utf-8");
                $arr[$k]['href'] = $href;
                $arr[$k]['pic'] = $pic;
                $arr[$k]['title'] = $title;
                $arr[$k]['info'] = $info;
                $arr[$k]['time'] = $time;
                $arr[$k]['author'] = $author;
                $arr[$k]['sitename'] = $sitename;
            }
        }
        var_dump($arr);
    }
//该模块更新周期较长，半个月至若干个月不等
    function byb($sitename){
        $artlist = pq(".col-md-4");
        $arr=array();
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            if($k<=11) {
                $href = pq($li)->find("div")->eq(0)->find("div")->eq(0)->find("div")->eq(0)->find("a")->attr("href");
                $pic = pq($li)->find("div")->eq(0)->find("div")->eq(0)->find("div")->eq(0)->find("img")->attr("src");
                $title = pq($li)->find("div")->eq(0)->find("div")->eq(0)->find("div")->eq(0)->find("img")->attr("alt");
                $info = trim(pq($li)->find(">div")->find(">div")->eq(1)->text());
                $text = pq($li)->find(">div")->find(">div")->eq(2)->find("span")->eq(0)->text();
                $time = mb_substr($text, -16, 16, "utf-8");
                $author = mb_substr($text, 0, -17, "utf-8");
                $arr[$k]['href'] = $href;
                $arr[$k]['pic'] = $pic;
                $arr[$k]['title'] = $title;
                $arr[$k]['info'] = $info;
                $arr[$k]['time'] = $time;
                $arr[$k]['author'] = $author;
                $arr[$k]['sitename'] = $sitename;
            }
        }
        var_dump($arr);
    }
//该板块每周更新一次
    function week($sitename){
        $artlist = pq(".week-before");
        $arr=array();
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            if($k<=11) {
                $href = pq($li)->find(">a")->attr("href");
                $pic = pq($li)->find(">a")->find(">img")->attr("src");
                $title = pq($li)->find(">div")->eq(0)->find("a")->text();
                $info = trim(pq($li)->find(">div")->eq(1)->text());
                $text = pq($li)->find(">div")->eq(2)->find("p")->text();
                $arrText = explode("·", $text);
                $arrText[1] = trim($arrText[1]);
                $arrText[1] = substr($arrText[1], 0, -1);
                $arr[$k]['href'] = $href;
                $arr[$k]['pic'] = $pic;
                $arr[$k]['title'] = $title;
                $arr[$k]['info'] = $info;
                $arr[$k]['time'] = trim($arrText[1]);
                $arr[$k]['author'] = trim($arrText[0]);
                $arr[$k]['sitename'] = $sitename;
            }
        }
        var_dump($arr);
    }

    function topic($sitename){
        $artlist=pq(".article-list");
        $arr=array();
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            if($k<=11) {
                $imgUrl=pq($li)->find(">div")->find(">a")->find("div")->attr("style");
                preg_match('/(?<=url\()[^)]+/sim', $imgUrl, $match);
                $href=pq($li)->find(">div")->find(">div")->eq(1)->find(">p")->eq(0)->find("a")->attr("href");
                $href="http://www.8btc.com".$href;
                $title=pq($li)->find(">div")->find(">div")->eq(1)->find(">p")->eq(0)->find("a")->text();
                $info=pq($li)->find(">div")->find(">div")->eq(1)->find(">p")->eq(2)->text();
                $author=pq($li)->find(">div")->find(">div")->eq(1)->find(">p")->eq(1)->find(">span")->eq(1)->text();
                $time=pq($li)->find(">div")->find(">div")->eq(1)->find(">p")->eq(1)->find(">span")->eq(2)->text();
                $arr[$k]['pic']=$match[0];
                $arr[$k]['href']=$href;
                $arr[$k]['title']=$title;
                $arr[$k]['info']=mb_substr(trim($info),0,40,"utf-8")."...";
                $arr[$k]['author']=$author;
                $arr[$k]['time']=substr($time,0,-3);
            }
        }
        var_dump($arr);
    }

//周期较长，若干个月更新一次
    function debate($sitename){
        $artlist=pq(".topic-before");
        $arr=array();
        //echo $artlist;
        foreach ($artlist as $k=>$li){
            //轮询方法抓取，每隔若干分钟抓取一次页面显示的12个即可
            if($k<=11) {
                $href=pq($li)->find(">a")->attr("href");
                $pic=pq($li)->find(">a")->find("img")->attr("src");
                $title=pq($li)->find(">div")->eq(0)->find("a")->text();
                $info=pq($li)->find(">div")->eq(1)->text();
                $text=trim(pq($li)->find(">div")->eq(2)->find('>p')->text());
                $num=pq($li)->find(">div")->eq(2)->find('>p')->find(">span")->text();
                $len=strlen(trim($num));
                $arrText=explode("·",$text);
                $arr[$k]['pic']=$pic;
                $arr[$k]['href']=$href;
                $arr[$k]['title']=$title;
                $arr[$k]['info']=trim($info);
                $arr[$k]['author']=$arrText[0];
                $arr[$k]['time']=trim(substr($arrText[1],0,-$len));
            }
        }
        var_dump($arr);
    }
}

