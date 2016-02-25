<?php
namespace Home\Controller;
use Think\Controller;
class WechatbookController extends Controller {


	public function club_meeting(){
		$club_id=I('get.club_id',0);
		$m_id=I('get.m_id',0);		
 		$current_date = date('Y-m-d',time());		
		$club=D('club','Api');
		$meeting=D('Meeting','Api');		
		$dates=$club->get_meetings_date($club_id,"future");	
		//dump($dates);
		$this->assign('data',$dates);
		$this->assign('club_id',$club_id);		
		$this->display('Wechatbook/club_meeting');
	}
	public function book_role(){
		$m_id=I('get.m_id',0);
		$meeting=D('Meeting','Api');		
		$data=$meeting->get_visual_meeting_table($m_id);	
		$this->assign('data',$data);		
		$this->display('Wechatbook/book_role');		
	}
	public function check_phone_number_ajax(){
		
		
	}
	public function book_role_deal(){
		echo("fuction is developing...");
		
	}

}
?>