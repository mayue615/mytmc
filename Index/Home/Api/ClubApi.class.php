<?php
namespace Home\Api;
use Home\Logic\ClubLogic;
	class ClubApi extends ClubLogic{
		public function get_users_info($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation('user')->where($condition)->find();
			return $result['user'];
		}
		public function get_club_info($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation(true)->where($condition)->find();
			return $result;
		}
		//public function set_club_meeting($club_id)
		public function ut(){	
			echo("<h1>ut test in ClubApi</h1>");
			echo("<h2>get_users in ClubApi</h2>");
			dump($this->get_users(1));
			echo("<h2>get_club_info in ClubApi</h2>");
			dump($this->get_club_info(1));		
		}

	}
?>
