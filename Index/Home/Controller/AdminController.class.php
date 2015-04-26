<?php
namespace Home\Controller;
use Think\Controller;

class AdminController extends CommonadminController {

	public function cl_report(){
		$club_id = cookie('club_id');	
		$club=D('club','Api');
		$data=$club->cl_report($club_id);
		//dump($data);
		$this->assign('roles',$data);
		$this->display();
	
	}

	public function modify_template(){
		$club_id = cookie('club_id');
		$t_id=I('get.t_id');
		if($t_id==""){
			$t_id=1;
		}
		$condition['Id']=$t_id;
		$template=D('agenda');
		$arr=$template->select();
		$this->assign('arr',$arr);		
		$data=$template->where($condition)->find();
		$this->assign('t_id',$t_id);						
		$this->assign('data',$data);
		//dump($data);
		$this->display();	
	}

	public function modify_template_deal(){
		$t_id=I('post.t_id');
		$template=D('agenda');
		$data=$template->create();
		$template->save($data);
		$this->success();	
	}
	public function add_template(){
		$this->display();		
	}	
	public function add_template_deal(){
		$template=D('agenda');
		$data=$template->create();	
		$t_id=$template->add($data);
		$this->redirect('modify_template',array('t_id'=>$t_id));		
	}
	
	public function delete_member(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');		
		$club=D('club','Api');
		$arr=$club->get_users_info($club_id);
		$this->assign('members',$arr);
	    $this->display('delete_member');
	}
	public function delete_member_deal(){
		$club_id=cookie('club_id');	
		$club=D('club','Api');
		$user_id=I('post.member');
		//dump($user_id);
		$is_active=0;
		$user=D('user','Api');	
		$user->delete_user_club($club_id,$user_id,$is_active);
		$this->redirect('modify_member');
	}
	public function admin_introduce(){
		$article1=new ArticleController();
		$article_id=3;
		$article=$article1->get_article($article_id);
		$article['body']=htmlspecialchars_decode($article['body']);
		$this->assign('article',$article);
		$this->display('article');		
	}
	public function checkin_port(){
		$checkin = new CheckinController();
		$checkin->feature_page();
	}	
	public function modify_club(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');	
		$club=D('Club','Api');
		$data=$club->get_club_info($club_id);
		$users=$club->get_club_users($club_id);
		$this->assign('data',$data);
		$this->assign('member',$users);
		$template=D('agenda');
		$arr=$template->select();
		$this->assign('template',$arr);		
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
	public function modify_future_meeting(){
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');		
		$visual_meeting=D('visualMeeting','Api');
		$data=$visual_meeting->get_visual_meeting_table($club_id,'future');		
		$this->assign('data',$data);
		$this->display();
	}	
	public function modify_history_meeting(){
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');		
		$visual_meeting=D('visualMeeting','Api');
		$data=$visual_meeting->get_visual_meeting_table($club_id,'past');		
		$this->assign('data',$data);
		$this->display('modify_history_meeting');
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
		$m_date=$data['m_date'];
 		$current_date = date('Y-m-d',time());		
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
		
		if($m_date>=$current_date){
			$this->success("Update successfully.",U('modify_future_meeting'));	
		}
		else{
			$this->success("Update successfully.",U('modify_history_meeting'));			
		}
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
	public function show_checkin(){
		$club_id = cookie('club_id');	
		$club=D('club','Api');
		$meetings_date=$club->get_meetings_date($club_id,"past");
		$m_id=I('get.m_id');
		if($m_id==""){
			$m_id=$meetings_date[0]['Id'];
			$condition['m_id']=$m_id;
		}
		else if($m_id=="all"){
			$condition="";
			foreach($meetings_date as $item){
				$condition1="m_id=".$item['Id'];
				$condition=$condition.$condition1."||";
				//$condition="m_id=76||m_id=75";
			}
			$condition=substr($condition,0,strlen($condition)-2);
		}
		else{
			$condition['m_id']=$m_id;
		}
		//echo($condition);
		$m=D('Usercheckin','Api');
		$users=$m->relation(true)->where($condition)->select();
		$m=D('Guestcheckin','Api');
		$guests=$m->relation(true)->where($condition)->select();
		$this->assign('m_id',$m_id);		
		$this->assign('m_dates',$meetings_date);
		$this->assign('users',$users);
		$this->assign('guests',$guests);		
		$this->display();	
	}
	
	public function get_checkin_ajax(){
		$m_id=I('get.m_id');
		$condition['m_id']=$m_id;
		
		
		$this->ajaxReturn($data);
	}
}
?>