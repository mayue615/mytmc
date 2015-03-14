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
		$club_id = cookie('club_id');
		$user_id=cookie('user_id');
		$club=D('club','Api');
		$arr=$club->get_users_info($club_id);
		//dump($arr);
		$this->assign('data',$arr);
		$this->display();	
	}
	public function modify_single_member(){
		$member_id=I('get.member_id');
		$user=D('user','Api');
		$arr=$user->get_user_info_by_id($member_id);
		$authority_type=array('admin','member','guest');
		$this->assign('authority_type',$authority_type);		
		$this->assign('data',$arr);
		$this->display();		
	}	
	public function modify_single_member_deal(){
		$user=D('user','Api');
		$data=$user->create();		
		$user->save();
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
		$this->assign('data',$data);
		$this->display();
	}
	public function modify_single_meeting(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$m=M('meeting_language');
		$language=$m->select();
		$this->assign('language',$language);
		$m=M('meeting_type');
		$type=$m->select();
		$this->assign('type',$type);		
 		$current_date = date('Y-m-d',time());
		$m_id=I('get.m_id');		
		$meeting=D('Meeting','Api');
		$data=$meeting->get_visual_meeting_table($m_id);
		$club=D('Club','Api');
		$users=$club->get_club_users($club_id);
		$clubs=$club->get_other_clubs($club_id);		
		$this->assign('clubs',$clubs);		
		$this->assign('data',$data);
		$this->assign('member',$users);
		//dump($data);
		$this->display();
	}	
	public function modify_single_meeting_deal(){
		$club_id = cookie('club_id');	
		$meeting=D('meeting','Api');
		$visual_meeting=D('visualMeeting','Api');
		$data=$meeting->create();
		$m_id=$data['Id'];
		$meeting->save();
		$roles=array('toast_id','joke_id','ge_id','gramm_id','timer_id','aha_id','table1_id','table2_id','table1_ev_id','table2_ev_id',
					'spk1_id','ev1_id','spk2_id','ev2_id','spk3_id','ev3_id','spk4_id','ev4_id','spk5_id','ev5_id',
					'spk6_id','ev6_id','spk7_id','ev7_id','spk8_id','ev8_id','spk9_id','ev9_id');
		foreach($roles as $role_id){
			$temp='post.'.$role_id;
			$user_id=I($temp);
			//dump($value);
			//echo("$m_id,$role_id,$user_id<br>");
     		if($user_id!=""){
				$result=$visual_meeting->set_visualmeeting_role($m_id,$role_id,$user_id);			
			}
			elseif($user_id==""){
				$result=$visual_meeting->delete_visualmeeting_role($m_id,$role_id);			

			}			
		}
		$club=D('club','Api');
		$club->set_meetings_num($club_id);
		$this->success();			
	}	
	public function get_clubs_ajax(){
		$club=D('club','Api');
		$data=$club->get_clubs();
		$this->ajaxReturn($data);	
	}
	public function get_users(){
			$club_id=I('get.club_id');
			//$club1=new ClubController();
			//$members=$club_id;
			//$members=$club1->get_user_info($club_id);			
			$this->ajaxReturn($club_id);		
	}	
	public function add_meeting(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');			
		$club=D('club','Api');
		$data=$club->get_other_clubs($club_id);		
		$this->assign('clubs',$data);
		$this->display();		
	}
	public function add_meeting_deal(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');	
		$meeting=D('meeting','Api');
		$data=$meeting->create();
		$data['owner_id']=$user_id;
		//dump($data);
		$new_meeting_id=$meeting->add($data);
		//dump($new_meeting);
		$meeting->add_meeting_club($new_meeting_id,$club_id);
		if($data['type']=="Union"){
			$union_club_id=I('post.club');
			dump($union_club_id);
			$meeting->add_meeting_club($new_meeting_id,$union_club_id);		
		}
		$club=D('club','Api');
		$club->set_meetings_num($club_id);		
		$this->success();
	}
}
?>