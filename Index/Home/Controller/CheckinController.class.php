<?php
namespace Home\Controller;
use Think\Controller;
class CheckinController extends Controller {
	public function feature_page(){
		$club_id=I('get.club_id');
		$m_date=I('get.m_date');
		$this->assign('club_id',$club_id);	
		$this->assign('m_date',$m_date);		
		$this->display('feature_page');
	}
	public function agenda(){
		$club_id=I('get.club_id');
		$m_date=I('get.m_date');
		$this->assign('club_id',$club_id);	
		$this->assign('m_date',$m_date);		
		$index1=new IndexController();
		$index1->agenda_show($club_id);
	}
	public function vote(){
		$club_id=I('get.club_id');
		$m_date=I('get.m_date');
		$this->assign('club_id',$club_id);	
		$this->assign('m_date',$m_date);		
		$this->display('vote');
	}	
	public function checkin_tmc(){
		$club_id=I('get.club_id');
		$m_date=I('get.m_date');
		$arr_checked_users=$this->get_one_meeting_users($club_id,$m_date);
		$this->assign('club_id',$club_id);	
		$this->assign('m_date',$m_date);			
		$this->assign('guests',$arr_checked_users);		
		$this->display('Checkin_tmc');
	}
	public function checkin_tmc_deal(){
		$club_id=I('get.club_id');
		$m_date=I('get.m_date');	
		$name=I('get.name');
		$phone=I('get.telephone');
		$email=I('get.email');
		$qq=I('get.qq');		
		$introducer=I('get.introducer');
		$data['club_id']=$club_id;
		$data['m_date']=$m_date;
		$data['user_id']=$name;
		$data['phone']=$phone;
		$data['qq']=$qq;
		$data['mail']=$email;
		$data['type']="guest";
		$data['introducer']=$introducer;
		$m=M('meeting_checkin');
		$m->add($data);
		$this->success("Check in successfully");			
	}
	
	public function ut_test(){
		$this->checkin_admin(1,"2015-2-5");
	}
	public function checkin_admin(){
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];   	
		//$club_id=1;
		//$m_date="2015-2-6";
		$club1=new ClubController();
		
		$m_date=$club1->get_latest_date($club_id);	
		//$meeting_id=I('get.meeting_id');	
		$arr_checked_users=$this->get_one_meeting_users($club_id,$m_date);
		//dump($arr_checked_users);
		$club1=new ClubController();
		$arr_members=$club1->get_user_info($club_id);
		//dump($arr_members);
			//dump($n);
		$qr1=new QRController();
		$qr_pic=$club_id."_".$m_date;		
		$qr1->test_pic_tmc_meeting($club_id,$m_date);
		//dump($arr2);
		//$activity_name=$m_date."tmc";
		$this->assign('qr_pic',$qr_pic);		
		$this->assign('members',$arr_members);		
		$this->assign('guests',$arr_checked_users);
		//$this->assign('activity_qrpic',"".$activity_id);
		$this->assign('club_id',$club_id);
		$this->assign('m_date',$m_date);		
		
		$this->assign('activity_name',$activity_name);
		$this->assign('limit_number',$limit_number);
		$this->assign('checkin_number',$checkin_number);		
		$this->display('Checkin_admin');			
	
	}
	public function admin_checkin_deal(){
		//$activity_id=I('post.act_id');	
		//dump($activity_id);
		//$m=M('activity');		
		//$arr=$m->where("Id='$activity_id'")->find();
		//$activity_name=$arr['activity_name'];
		//$club_id=$arr['club'];
		$club1=new ClubController();
		//$arr=$club1->get_club_info($club_id);			
		$m=M('meeting_checkin');
		$arr=$m->where("club_id='$club_id' AND type='member'")->delete();

		$members_name=I('post.members2');
		$club_id=I('post.club_id');
		$m_date=I('post.m_date');
		//dump($members_name);
		
		foreach($members_name as $user_id){
			//$club1=new ClubController();
			//$arr=$club1->get_one_user_info($user_id);		
			$data['club_id']=$club_id;
			$data['m_date']=$m_date;			
			$data['user_id']=$user_id;
			$data['phone']=$arr['phone'];
			$data['mail']=$arr['mail'];
			$data['type']="member";
			$reslut=$m->add($data);	
		}
			$this->success("Check in successfully");			
	}
	public function get_one_meeting_users($club_id,$m_date){
		$m=M('meeting_checkin');
		$data['club_id']=$club_id;
		$data['m_date']=$m_date;
		$arr=$m->where($data)->order('type asc')->select();
		$dictionary1=new DictionaryController();
		$id2name_all_dict=$dictionary1->id2name_dict($club_id);
		$club_id2name_dict=$dictionary1->club_id2name_dict($club_id);
		$result=array();
		$num=0;
		foreach($arr as &$item){
			$num=$num+1;
			$temp['num']=$num;
			if($item['type']=="member"){
				$temp['name']=$id2name_all_dict[$item['user_id']];
			}
			else{
				$temp['name']=$item['user_id'];			
			}
			$temp['club_name']=$club_id2name_dict[$item['club_id']];
			$temp['type']=$item['type'];
			array_push($result,$temp);
		}
		return $result;
		
	}
	public function get_one_meeting_members($club_id,$m_date){
		$m=M('meeting_checkin');
		$data['club_id']=$club_id;
		$data['m_date']=$m_date;
		$data['user_type']="member";
		$arr=$m->where($data)->select();
		$dictionary1=new DictionaryController();
		$id2name_all_dict=$dictionary1->id2name_dict($club_id);
		$club_id2name_dict=$dictionary1->club_id2name_dict($club_id);
		$result=array();
		foreach($arr as &$item){
			$temp['name']=$id2name_all_dict[$item['user_id']];
			$temp['club_name']=$club_id2name_dict[$item['club_id']];
			$temp['type']="member";
			array_push($result,$temp);
		}
		return $result;
		
	}
	
	
	public function get_one_meeting_guests($club_id,$m_date){
		$m=M('meeting_checkin');
		$data['club_id']=$club_id;
		$data['m_date']=$m_date;
		$data['user_type']="guest";
		$arr=$m->where($data)->select();
		$dictionary1=new DictionaryController();
		$club_id2name_dict=$dictionary1->club_id2name_dict($club_id);
		$result=array();
		foreach($arr as &$item){
			$temp['name']=$item['user_id'];
			$temp['club_name']=$club_id2name_dict[$item['club_id']];
			$temp['type']="guest";
			array_push($result,$temp);
		}
		return $result;
		
	}	
	
	public function checkin_member(){
		$this->checkin($club_id,$m_date,$user_id,"member");
	}
	public function checkin_guest(){
		$this->checkin($club_id,$m_date,$user_id,"guest");
	}	
	private function checkin($club_id,$m_date,$user_id,$type){
		$m=M('meeting_checkin');
		$data['club_id']=$club_id;
		$data['m_date']=$m_date;	   
		$data['user_id']=$user_id;
		$data['type']=$type;
		$i=$m->where($data)->count();
		if($i>0){
			$this->error("user name has existed");
			return 0;
		}
		else{
			$reslut=$m->add($data);
			$this->success("user name is added successfully");
			return 1;
	   }
	}
}
?>