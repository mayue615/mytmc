<?php
namespace Home\Api;
use Home\Logic\UserLogic;
	class UserApi extends UserLogic{
		public function login($user_name,$password){
		if(preg_match('/\d{11}$/', $user_name))
			$user_id=$this->is_phone_exist($user_name,$password);			
		else  	
			$user_id=$this->is_user_exist($user_name,$password);
			if(!$user_id){
				return false;
			}
			else{
				return $this->get_user_info_by_id($user_id);
			}
		}
		public function get_user_name($user_id){
			$condition['Id']=$user_id;
			$result = $this->where($condition)->find();
			return $result['english_name'];			
		}
		public function get_user_club($user_id){
			$condition['Id']=$user_id;
			$result = $this->relation('club')->where($condition)->find();
			return $result['club'];			
		}
		public function get_user_info($user_id){
			//$m=M('club_user');
			//$result=$m->select($user_id);
			$condition['Id']=$user_id;
			$result = $this->relation(true)->where($condition)->find();
			return $result;
		}
		public function set_user_club($club_id,$user_id,$is_active){
			$data['user_id']=$user_id;
			$data['club_id']=$club_id;			
			$m=M('club_user');
			$result=$m->where($data)->find();
			dump($result);
			$data['is_active']=$is_active;
			if($result!=NULL){
				$data['Id']=$result['Id'];
				return $m->save($data);			
			}	
			else{
				return $m->add($data);
			}
		}
		
		

		public function ut(){	
			echo("<h1>ut test in UserApi</h1>");
			echo("<h2>get_user_info in UserApi</h2>");
			dump($this->get_user_info(3));
			echo("<h2>set_user_club in UserApi</h2>");
			dump($this->set_user_club(2,4,1));
		
		}

	}
?>
