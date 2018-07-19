<?php
namespace app\mobile\controller;
use think\Db;
use think\Session;
use app\mobile\controller\Common;

class Wenda extends Common{
	public function index(){
		return $this->fetch();
	}
	
}
