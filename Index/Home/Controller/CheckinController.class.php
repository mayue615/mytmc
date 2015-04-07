<?php
namespace Home\Controller;
use Think\Controller;
class CheckinController extends Controller {
	public function common_para(){
		$club_id=I('get.club_id');
		$m_id=I('get.m_id');		
		$this->assign('club_id',$club_id);	
		$this->assign('m_id',$m_id);		
	}
	public function feature_page(){
		$this->common_para();
		$this->display('Checkin/feature_page');
	}
	public function agenda(){
		$club_id=I('get.club_id');
		$m_id=I('get.m_id');		
		$this->common_para();	
		$index1=new IndexController();
		$index1->agenda_show($club_id);
	}
	public function vote(){
		$this->common_para();
		$m_id=I('get.m_id');
		$meeting=D('meeting','Api');
		$data=$meeting->get_meeting_each_role($m_id);
		//dump($data);
		$this->assign('spk',$data['spk']);
		$this->assign('ev',$data['ev']);
		$this->assign('role',$data['role']);
		$this->assign('table',$data['table']);		
		$this->display('vote');
	}	
	public function vote_deal(){
		$vote=D('vote');
		$data=$vote->create();
		//$checkin->add($data);
		$this->success();
	}		
	public function checkin_member(){
		$this->common_para();	
		$club_id=I('get.club_id');
		$m_id=I('get.m_id');		
		$club=D('club','Api');
		$members=$club->get_club_users($club_id);
		$checkin=D('usercheckin');
		//$data=$checkin->get_checkin_users($m_id);
		foreach($members as &$item){
			$user_id=$item['Id'];
			$n=$checkin->is_user_checkin($m_id,$user_id);
			if($n>0){
				$item['checked']=1;
			}else
				$item['checked']=0;			
		}
		$this->assign('members',$members);		
		//dump($members);
		$this->display('checkin_member');		
	}
	public function checkin_member_deal(){
		$club_id=I('get.club_id');
		$m_id=I('get.m_id');	
		$members_name=I('get.members2');
		//dump($members_name);
		$checkin=D('usercheckin');
		$checkin->delete_checkin_users($m_id);
 		foreach($members_name as $member_id){
			$data['m_id']=$m_id;
			$data['user_id']=$member_id;
			//dump($data);
			$reslut=$checkin->add($data);	
		} 
		$this->success();
	
	}
	public function checkin_guest(){
		$this->common_para();	
		$this->display('checkin_guest');
	}	
	public function checkin_guest_ajax(){
		$phone=I('get.phone');
		$data=$this->check_phone($phone);
		$this->ajaxReturn($data);
	}	
	public function check_phone($phone){
		$condition['phone']=$phone;
		$m=D('user','Api');
		$data=$m->where($condition)->find();
		if($data==null){
			$m=D('guestcheckin','Api');
			$data=$m->where($condition)->find();			
		}
		$result['chinese_name']=$data['chinese_name'];
		$result['english_name']=$data['english_name'];
		$result['phone']=$data['phone'];
		$result['email']=$data['email'];		
		return $result;
	
	}
	public function checkin_guest_deal(){
		$club_id=I('post.club_id');
		$m_id=I('post.m_id');		
		$checkin=D('guestcheckin');
		$data=$checkin->create();
		$checkin->add($data);
		$this->redirect('show_guests',array('club_id'=>$club_id,'m_id'=>$m_id));
	}	
	public function show_guests(){
		$this->common_para();	
		$club_id=I('get.club_id');
		$m_id=I('get.m_id');			
		$checkin=D('guestcheckin','Api');	
		$data=$checkin->get_guests($m_id);
		$this->assign('guests',$data);
		$this->display('show_guests');
	}	


}
?>