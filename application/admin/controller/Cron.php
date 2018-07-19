<?php
namespace app\admin\controller;
use think\Controller;
use app\index\controller\grab;

class Cron extends Controller{
    
    public function cron(){
		$grab=new \app\index\controller\Grab;
		$grab->babit_indexParam();
//		$grab->huoqiu_index();
		$grab->liandede_index();
		$grab->btc123_index();
		$grab->lianshijie_index();
		$grab->biyuan_index();
		$grab->qukuailianzww_index();
		$grab->lianhu_index();
		$grab->weilai_index();
		$grab->lianbao_index();
		$grab->bibite_index();
		$grab->buluoke_index();
		$grab->bitoutiao_index();
		$grab->haitun_index();
		
    }


}
