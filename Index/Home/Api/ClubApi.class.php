<?php
namespace Home\Api;
use Home\Logic\ClubLogic;
	class ClubApi extends ClubLogic{
		public function get_users($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation('user')->where($condition)->find();
			return $result;
		}
		public function get_club_info($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation(true)->where($condition)->find();
			return $result;
		}

		public function ut(){	
			echo("ut test in ClubApi</br>");
			echo("get_users in ClubApi</br>");
			dump($this->get_users(1));
			echo("get_club_info in ClubApi</br>");
			dump($this->get_club_info(1));		
		}

	}
?>
