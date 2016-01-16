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
			$arr = $this->relation('meeting')->where($condition)->find();
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
		public function get_meetings_id($club_id,$type){
			$current_date = date('Y-m-d',time());	
			$condition['Id']=$club_id;
			$arr = $this->relation('meeting_id')->where($condition)->field('Id')->find();
			$arr_id=array();
			foreach($arr['meeting_id'] as $item){
				if($type=="past"){
					if($item['m_date']<=$current_date){
						array_push($arr_id,$item['Id']);
						//$temp=array_reverse($arr_id);
						//$arr_id=$temp;
					}
				}
				else if($type=="future"){
					if($item['m_date']>=$current_date){
						array_push($arr_id,$item['Id']);
					}				
				}
				else{
					array_push($arr_id,$item['Id']);				
				}
			}
			if($type=="past"){
				$temp=array_reverse($arr_id);
				$arr_id=$temp;			
			}
			return $arr_id;
			
		}		
		public function get_meetings_date($club_id,$type){
			$current_date = date('Y-m-d',time());	
			$condition['Id']=$club_id;
			$arr = $this->relation('meeting_id')->where($condition)->field('Id')->find();
			//dump($arr['meeting_id']);
			//exit;
			$arr_id=array();
			foreach($arr['meeting_id'] as $item){
				if($type=="past"){
					if($item['m_date']<=$current_date){
						//dump($item);
						array_push($arr_id,$item);
						//$temp=array_reverse($arr_id);
						//$arr_id=$temp;
					}
				}
				else if($type=="future"){
					if($item['m_date']>=$current_date){
						array_push($arr_id,$item);
					}				
				}
				else{
					array_push($arr_id,$item);				
				}
			}
			if($type=="past"){
				$temp=array_reverse($arr_id);
				$arr_id=$temp;			
			}
			//dump($arr_id);
			return $arr_id;
			
		}			
		public function get_next_meetings_id($club_id){
			$data=$this->get_meetings_id($club_id,"future");
			return $data[0];
			
		}
		public function get_meeting_time($club_id){
			$condition['Id']=$club_id;
			$arr = $this->where($condition)->field('default_time')->find();
			return $arr['default_time'];
		}
		public function get_club_info($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation(array('president','vpe','vpm','vppr','saa','treasurer','secretary'))->where($condition)->find();
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
		public function get_clubs_all(){
			return $this->relation(array('president','vpe','vpm','vppr','saa','treasurer','secretary'))->select();
		}		
		public function get_other_clubs($club_id){
			return $this->where("Id<>'$club_id'")->field('Id,club_name')->select();
		}
		public function set_meetings_num($club_id){
			$club_info=$this->get_club_info($club_id);
			$first_num=$club_info['first_num'];
			$club_meeting=$this->get_meetings_info($club_id);
			$m=M('meeting');
			foreach($club_meeting as $item){
				$arr['Id']=$item['Id'];
				$arr['num']=$first_num;
				$first_num=$first_num+1;
				$m->save($arr);
				
			}
		}
		public function cl_report($club_id,$start_date="2012-1-1"){
			$users=$this->get_users_info($club_id);
			$m=D('user','Api');
			$arr=array();
			foreach($users as $user){
				$data['name']=$user['english_name'];
				$data['past']=$m->get_user_roles_number($user['Id'],"past",$start_date);
				$data['future']=$m->get_user_roles_number($user['Id'],"future");
				$data['all']=$m->get_user_roles_number($user['Id'],"all",$start_date);				
				array_push($arr,$data);
			
			}
			return $arr;
		}
		
		
	}
?>
