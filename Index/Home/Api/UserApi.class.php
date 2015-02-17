<?php
namespace Home\Api;
use Home\Logic\UserLogic;
	class UserApi extends UserLogic{
		public function login($user_name,$password){
			$user_id=$this->is_user_exist($user_name,$password);
			if($user_id==false){
				return "username or password is error";
			}
			else{
				return $this->get_user_info_by_id($user_id);
			}
		}
		public function get_user_info($user_id){
			//$m=M('club_user');
			//$result=$m->select($user_id);
			$condition['Id']=$user_id;
			$result = $this->relation(true)->where($condition)->find();
			return $result;
		}

		public function ut(){	
			echo("ut test in UserApi</br>");
			echo("get_user_info in UserApi</br>");
			dump($this->get_user_info(3));
			echo("login in UserApi</br>");
			dump($this->login("mayue","123456"));
		
		}

	}
?>
