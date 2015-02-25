<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->display('homepage');

    }
	public function ut(){
        $user=D('user','Api');
		$user->ut();	
        $club=D('club','Api');
		$club->ut();	

	}
}