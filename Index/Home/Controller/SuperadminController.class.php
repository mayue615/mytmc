<?php
namespace Home\Controller;
use Think\Controller;

class SuperadminController extends CommonsuperadminController {
	public function clubs(){	
		$club=D('club','Api');
		$data=$club->get_clubs_all();
		$this->assign('data',$data);   
		$this->display('clubs');
	}
	public function get_users(){	
		$user=D('user','Api');
		$data=$user->get_all_users();
		foreach($data as $item){
			if($item!=""){
				$email_sum=$email_sum.$item['email'].";";
			}
		} 
		$this->assign('email_sum',$email_sum);		
		$this->assign('data',$data);   
		$this->display('users');
	}	
	public function delete_member(){
		$member_id=I('get.member_id');
		$user=D('user','Api');
		$result=$user->delete($member_id);
		if($result){
			$this->success('member Id '. $member_id .' is deleted');
		}
		else{
			$this->error();
		}		
	}
	public function clubs_add_club(){	
		$club=D('club','Api');
		$data=$club->create();
		$club_id=$club->add($data);
		$this->success();
	}
	public function donation(){
		$donation=D('donation');
		$arr=$donation->select();
		$this->assign('data',$arr);
		$this->display();
	}
	public function donation_add(){
		$donation=D('donation');
		$money=I('get.money');
		$name=I('get.name');
		$arr['name']=$name;
		$arr['money']=$money;		
		$donation->add($arr);
		$this->success();		
	}

}
?>