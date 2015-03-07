<?php
namespace Home\Api;
use Home\Logic\ClubLogic;
	class ClubApi extends ClubLogic{
		public function get_users_info($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation('user')->where($condition)->find();
			return $result['user'];
		}
		public function get_meetings_info($club_id){
			$condition['Id']=$club_id;
			$arr = $this->relation('meeting')->where($condition)->order('m_date')->find();
/* 			$user=D('user','Api');
			$id2name_dict=$user->get_user_name_dictionary(); */
/* 			$meeting=D('meeting','Api');
			$roles=$meeting->get_meeting_role_id();
			//$roles=array('toast_id','joke_id','table1_id','table2_id','ge_id','gramm_id','timer_id','aha_id','ev1_id','ev2_id','ev3_id','ev4_id','ev5_id','spk1_id','spk2_id','spk3_id','spk4_id','spk5_id','spk6_id','spk7_id','spk8_id','spk9_id');		
			foreach($arr['meeting'] as &$value)
			{
				foreach($roles as $role)
				if($value[$role] != "") 
				{
					$i=$value[$role];
					$value[$role]=$id2name_dict[$i];
				}	   
			} */			
			return $arr['meeting'];		
		}
		public function get_meetings_id($club_id){
			$condition['Id']=$club_id;
			$arr = $this->relation('meeting_id')->where($condition)->field('Id')->find();
			$arr_id=array();
			foreach($arr['meeting_id'] as $item){
				array_push($arr_id,$item['Id']);
			}
			return $arr_id;
			
		}		
		
		public function get_club_info($club_id){
			$condition['Id']=$club_id;
			$result = $this->where($condition)->find();
			return $result;
		}
		public function get_club_users($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation('user')->where($condition)->find();
			return $result['user'];
		}		
		//public function set_club_meeting($club_id)
		public function ut(){	
			echo("<h1>ut test in ClubApi</h1>");
			echo("<h2>get_users in ClubApi</h2>");
			dump($this->get_users(1));
			echo("<h2>get_club_info in ClubApi</h2>");
			dump($this->get_club_info(1));		
		}
		public function get_clubs(){
			return $this->field('Id,club_name')->select();
		}
		public function get_other_clubs($club_id){
			return $this->where("Id<>'$club_id'")->field('Id,club_name')->select();
		}
	}
?>
