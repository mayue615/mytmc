<?php
namespace Home\Controller;
use Think\Controller;

class AdminController extends CommonController {
	public function admin_introduce(){
		$this->display();	
	}
	public function modify_club(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');	
		$club=D('Club','Api');
		$data=$club->get_club_info($club_id);
		$users=$club->get_club_users($club_id);
		//dump($data);
		//dump($users);
		$this->assign('data',$data);
		$this->assign('member',$users);		
		$this->display();	
	}
	public function modify_club_deal(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$club=D('Club','Api');
		$data=$club->create();		
		$club->save();
		$this->success();
	}	
	public function modify_member(){
		$this->display();	
	}
	public function modify_member_deal(){
		$this->success();	
	}	
	public function deal_message(){
		$this->display();	
	}	
	public function deal_message_deal(){
		$this->success();	
	}	
	public function modify_meeting(){
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');		
		$visual_meeting=D('visualMeeting','Api');
		$data=$visual_meeting->get_visual_meeting_table($club_id);
		$this->display();
	}
	public function modify_meeting_deal(){
		$this->success();	
	}	
	public function add_meeting(){
		$meeting=D('meeting','Api');
		$data['num']=1;			
		$data['owner_id']=1;			
		$data['type']=1;
		$data['language']=1;
		$data['note']=1;
		$data['room']=1;			
		$data['m_date']=1;	
		$data['time']=1;				
		$data['toast_id']=1;
		$data['joke_id']=1;
		$data['ge_id']=1;
		$data['gramm_id']=1;
		$data['timer_id']=1;
		$data['aha_id']=1;
		$data['table1_id']=1;	
		$data['table2_id']=1;
		$data['table1_ev_id']=1;
		$data['table2_ev_id']=1;
		$data['spk1_id']=1;
		$data['ev1_id']=1;
		$data['spk2_id']=1;
		$data['ev2_id']=1;
		$data['spk3_id']=1;
		$data['ev3_id']=1;
		$data['spk4_id']=1;
		$data['ev4_id']=1;
		$data['spk5_id']=1;
		$data['ev5_id']=1;
		$data['spk6_id']=1;
		$data['ev6_id']=1;
		$data['spk7_id']=1;
		$data['ev7_id']=1;
		$data['spk8_id']=1;
		$data['ev8_id']=1;	
		$data['spk9_id']=1;
		$data['ev9_id']=1;			
		//$meeting->add();
		$this->display();		
	}
	public function add_meeting_deal(){
		$this->success();
	}
}
?>