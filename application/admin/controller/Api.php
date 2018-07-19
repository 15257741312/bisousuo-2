<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Api extends Controller{
    
    /*
    *金色财经新闻API
    */
    public function jinseNewsAPI(){
        $accessKey = '848483177084896fedf92774cbafa039';
        $secretKey = '5d26f9132ff3ee43';
        
        $httpParams = array(
            'access_key' => $accessKey,
            'date' => time()
        );
        
        $signParams = array_merge($httpParams, array('secret_key' => $secretKey));
        
        ksort($signParams);
        $signString = http_build_query($signParams);

        $httpParams['sign'] = strtolower(md5($signString));
        
        $url = 'http://api.jinse.com/topic/list?'.http_build_query($httpParams);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $curlRes = curl_exec($ch);
        curl_close($ch);
        
        $json = json_decode($curlRes, true);

        //判断新闻是否存在，不存在就添加，存在就更新距今时间
        foreach (array_reverse($json) as $key => $value) {
            $where['news_id'] = $value['id'];
            $judInfo = Db::table('bbk_news_api') -> where($where) -> find();
            if(!$judInfo){
                $insInfo['news_id'] = $value['id'];
                $insInfo['url'] = $value['url'];
                $insInfo['title'] = $value['title'];
                $insInfo['summary'] = $value['summary'];
                $insInfo['content'] = $value['content'];
                $insInfo['published_at'] = $value['published_at'];
                $insInfo['published_time'] = $value['published_time'];
                $insInfo['resource'] = $value['resource'];
                $insInfo['resource_url'] = $value['resource_url'];
                $insInfo['author'] = $value['author'];
                $insInfo['thumbnail'] = $value['thumbnail'];
                $addNewNews = Db::table('bbk_news_api') -> insert($insInfo);
            }
        }
        
        return $json;
    }

    /*
    *OKCoin行情API
    *类型:btc_cny:比特币
            ltc_cny :莱特币
            eth_cny :以太坊
            etc_cny :以太经典
            bch_cny :比特现金 
    *return:date: 返回数据时服务器时间
            buy: 买一价
            high: 最高价
            last: 最新成交价
            low: 最低价
            sell: 卖一价
            vol: 成交量(最近的24小时)
    */
    public function OKCoinAPI(){
        $url = "https://www.okcoin.cn/api/v1/ticker.do?symbol=btc_cny";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curlRes = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($curlRes,true);
        return $json;
    }

    
    /*
    *敏感词替换
    */
    public function SensitiveWords($text){
        $sensWords = Db::table('sensitive_words') -> select();
        foreach ($sensWords as $key => $value) {
            //判断敏感词长度
            $lens = str_repeat('*',mb_strlen($value['text'],'UTF-8'));
            //替换敏感词
            $text = str_ireplace($value['text'],$lens,$text);
        }
        return $text;
    }

}
