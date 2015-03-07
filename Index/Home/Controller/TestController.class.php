<?php
namespace Home\Controller;
use Think\Controller;

class TestController extends Controller {
	public function index(){
	$this->display('booking');
	}	
	public function booking_add_meeting_role_ajax(){

		$arr['Id']=1;
		$this->ajaxReturn($arr);	
		//echo("{\"Id\":1}");
		//echo("liguang");
	}
}
?>