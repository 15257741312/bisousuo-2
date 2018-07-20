<?php
namespace app\mobile\controller;
use think\Db;
use think\Session;
use app\mobile\controller\Common;

class My extends Common{
	public function index(){
		return $this->fetch();
	}

	public function setting(){
		return $this->fetch();
	}
	
}
