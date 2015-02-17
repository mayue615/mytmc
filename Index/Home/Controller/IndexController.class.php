<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->ut();

    }
	public function ut(){
	
        $club=D('club','Api');
		$club->ut();	
        //$user=D('user','Api');
		//$user->ut();
	}
}