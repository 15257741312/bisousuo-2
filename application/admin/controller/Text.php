<?php
namespace app\admin\controller;
use think\Controller;
use QL\QueryList;


class Text extends Controller{

    public function index(){
	$data = QueryList::get('https://www.jinse.com/news/blockchain/208750.html')->find('img')->attrs('src');
       //打印结果
       print_r($data->all());
    }

}
