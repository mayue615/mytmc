<?php
namespace Home\Controller;
use Think\Controller;

class MemberController extends CommonController {
	public function apply_club(){
		$club=D('club','Api');
		$arr=$club->select();
		$this->assign('clubs',$arr);
	    $this->display('apply_club');
	}
	public function apply_club_deal(){
		$club=D('club','Api');
		$club_id=I('post.club');
		$is_active=0;
		$user=D('user','Api');	
		$user_id=cookie('user_id');
		$user->set_user_club($club_id,$user_id,$is_active);
		cookie('club_id',$club_id);
		$this->redirect('Member/personal_info');
	}	
	public function exit_club(){
		$club=D('club','Api');
		$arr=$club->select();
		$this->assign('clubs',$arr);
	    $this->display('exit_club');
	}
	public function exit_club_deal(){
		$club=D('club','Api');
		$club_id=I('post.club');
		$is_active=0;
		$user=D('user','Api');	
		$user_id=cookie('user_id');
		$user->delete_user_club($club_id,$user_id,$is_active);
		cookie('club_id',$club_id);
		$this->redirect('Member/personal_info');
	}	

	public function club_choose(){
		$club_id=I('get.club_id');
		cookie('club_id',$club_id);		
		$this->success("Succeed to choose club!");

	}

	public function personal_info(){
		$club_id = cookie('club_id');
		$user_id=cookie('user_id');
		$user=D('user','Api');
		$data=$user->get_user_info($user_id);		
		$this->assign('user',$data);	
		$this->display();		
	}	
	
	public function personal_info_deal(){
		$club_id = cookie('club_id');
		$user_id=cookie('user_id');	
		$user=D('user','Api');
		$data=$user->create();
		$user->save($data);
		$this->success("Succeed to modify info!");		
	}
	
    public function club_info(){
		$email_sum="";
		$club_id = cookie('club_id');
		$user_id=cookie('user_id');
		$club=D('club','Api');
		$arr=$club->get_users_info($club_id);
		foreach($arr as $item){
			if($item!=""){
				$email_sum=$email_sum.$item['email'].";";
			}
		} 
		$this->assign('email_sum',$email_sum);
		$this->assign('data',$arr);		
		$this->display('club_info');
	}
    public function meeting(){
		$this->display();
	}	
 	public function history(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(strstr($agent,'Windows'))
			$this->history_PC();
		else
			$this->history_phone();
	}
	
    public function history_PC(){
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$meeting=D('visualMeeting','Api');
		$data=$meeting->get_visual_past_meeting_table($club_id);
/* 		$meeting1=new MeetingController();
		$each_page_num=8;
		$result=$meeting1->all_meeting_page($club_id,1,$each_page_num);	 */
		$this->assign('data',$data);
		//$this->assign('data',$result['data']);
		//$this->assign('page_method',$result['show']);		
		$this->display('history');		
	}

    public function history_phone5(){
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$dictionary1=new DictionaryController();
		//$id2name_dict=$dictionary1->id2name_dict($club_id);
		$id2role_dict=$dictionary1->id2role_dict($club_id);
		
	    $m=M('rolebooking');
		$result= array();
		$arr=$m->where("club_id='$club_id' AND m_date<'$current_date'")->order('Id desc')->select();
        $roles=array('toast_id','joke_id','table1_id','table2_id','ge_id','gramm_id','timer_id','aha_id','ev1_id','ev2_id','ev3_id','ev4_id','ev5_id','spk1_id','spk2_id','spk3_id','spk4_id','spk5_id','spk6_id','spk7_id','spk8_id','spk9_id');		
		foreach($arr as &$value)
		{	$num=$value['num'];
		    $m_date=$value['m_date'];
			
			foreach($roles as $role)
			{   $i= $value[$role];
				if(($value[$role]) == $user_id){ 
					
					$rolename=$id2role_dict[$role];
				}

			}
			$temp=array('num'=>$num,'m_date'=>$m_date,'role'=>$rolename);
			array_push($result,$temp);
			$rolename="";
		}	
				
		$this->assign('data',$result);//$arr(num,m_date,role)
		$this->display('history_phone');		
	}
	public function booking(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(strstr($agent,'Windows'))
			$this->booking_PC();
		else
			$this->booking_phone();		
		
	}
	
    public function booking_PC(){
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$meeting=D('visualMeeting','Api');
		$data=$meeting->get_visual_future_meeting_table($club_id);		
		$this->assign('data',$data);
		$this->assign('club_id',$club_id);
		//$this->assign('data',$result['data']);
		//$this->assign('page_method',$result['show']);	
		$this->display('booking');
	}
/*	
	public function test(){
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
		$meeting_date="2015-1-29";
		$user1=new UserController();
		//$arr=$user1->get_user_has_role_meeting($club_id,$user_id);
		$arr=$user1->get_user_null_role_id($club_id,$meeting_date,$user_id);
		dump($arr);
		return $arr;
	
	}
	public function booking_add_meeting_role_ajax(){
		$add_role_date=I('get.add_role_date');
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];	
		$user1=new UserController();
		$arr=$user1->get_user_null_role_id($club_id,$add_role_date,$user_id);
		$this->ajaxReturn($arr);	
	}
	public function booking_delete_meeting_role_ajax(){
			$this->ajaxReturn($roles);	
	}*/	
	
	public function booking_deal($str){

		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$str=rtrim($str,";");
		$arr=explode(";",$str);
		$data=array();
		foreach($arr as $item){
			$arr_temp=explode(",",$item);
			array_push($data,$arr_temp);
		}
		$meeting=D('visualMeeting','Api');		
		foreach($data as $item){
			$m_id=$item[1];
			$role_id=$item[2];
			if($item[0]=="add"){
				$result=$meeting->set_visualmeeting_role($m_id,$role_id,$user_id);			
			}
			elseif($item[0]=="delete"){
				$result=$meeting->delete_visualmeeting_role($m_id,$role_id);			

			}
			else{
			
			}
		} 

	}	
	public function booking_PC_deal(){
	    $str=I('post.change_role');		
		$this->booking_deal($str);
		$this->success("Succeed to update roles");		
	}		
	public function booking_phone_deal(){
	    $str=I('post.change_role');
	    $m_id=I('post.Id');		
		$this->booking_deal($str);
		$this->success("Succeed to update roles",U('booking_phone',array('m_id'=>$m_id)));
	}
	
	public function booking_phone(){
		$m_id=I('get.m_id',0);
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');	
		$club=D('club','Api');
		$meeting=D('Meeting','Api');		
		$dates=$club->get_meetings_date($club_id,"future");	
		if($m_id==0)
			$m_id=$dates[0]["Id"];
		$data=$meeting->get_visual_meeting_table($m_id);
		$this->assign('club_id',$club_id);		
		$this->assign('dates',$dates);		
		$this->assign('data',$data);
		//dump($data);
		$this->display('booking_phone');
	}

	public function booking_phone_ajax(){
		$m_id=I('post.m_id');
		$meeting=D('Meeting','Api');
		$data=$meeting->get_visual_meeting_table($m_id);		
		$this->ajaxReturn($data);	
	}
	public function history_phone(){
 		$current_date = date('Y-m-d',time());
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');	
		$club=D('club','Api');
		$meeting=D('Meeting','Api');		
		$dates=$club->get_meetings_date($club_id,"past");	
		$latest_m_id=$dates[0]["Id"];
		$this->assign('dates',$dates);
		$data=$meeting->get_visual_meeting_table($latest_m_id);
		$this->assign('data',$data);
		//dump($data);
		$this->display('history_phone');
	}				
	public function myspeech(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');	
		$speech=D('userspeech','Api');
		$data=$speech->get_user_speech($user_id);
/* 		foreach($data as &$item){
			$item['content']=htmlspecialchars_decode($item['content']);
			//$item['content']=substr(htmlspecialchars_decode($item['content']),0,60);
		} */
		//dump($data);
		$this->assign('data',$data);
		$this->display(); 
	}
	public function my_single_speech(){
		header("Content-Type:text/html; charset=utf-8");	
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$speech_id=I('get.speech_id');
		$userspeech=D('userspeech','Api');
		$data=$userspeech->get_single_speech($speech_id);
		$data['content']=htmlspecialchars_decode($data['content']);
 		$speech=D('speech','Api');
		$levels=$speech->get_levels_info();
		//dump($data);
		$this->assign('levels',$levels);
		$this->assign('data',$data);
		$this->display(); 
	}

	public function my_single_speech_show(){
		header("Content-Type:text/html; charset=utf-8");	
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');
		$speech_id=I('get.speech_id');
		$userspeech=D('userspeech','Api');
		$data=$userspeech->get_single_speech($speech_id);
		$data['content']=htmlspecialchars_decode($data['content']);
 		$speech=D('speech','Api');
		$levels=$speech->get_levels_info();
		//dump($data);
		$this->assign('levels',$levels);
		$this->assign('data',$data);
		$this->display(); 
	}	
	public function my_single_speech_deal(){
 		$userspeech=D('userspeech','Api');
		$data=$userspeech->create();
		$data['lastmodifytime']=date("Y-m-d H:i:s");				
		//$data['content']=htmlspecialchars(stripslashes($data['content']));
		//dump($data);		
		$userspeech->save($data);
		$this->success("Succeed to modify speech!",U("myspeech"));
	}	
	public function ueditor(){
		$data = new \Org\Util\Ueditor();
		echo $data->output();
	}	
	
	public function agenda(){
		$club_id = cookie('club_id');
		$user_id = cookie('user_id');	
		$index1=new IndexController();
		$index1->agenda_show($club_id);

		
	
	}

}
?>