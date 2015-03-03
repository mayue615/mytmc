<?php
namespace Home\Api;
	
	class VisualMeetingApi {

		public function get_meetings_info($club_id){
			$club=D('club','Api');

			$meeting=D('meeting','Api');			
			$meetings_id=$club->get_meetings_id($club_id);
			//dump($meetings_id);
			$meeting_info=array();
			foreach($meetings_id as $m_id){
				//dump($m_id);
				$arr=$meeting->get_meeting_info($m_id);
				//dump($arr);
				array_push($meeting_info,$arr);
			}
			return $meeting_info;
		}
		public function get_meetings_info_role_name($club_id){
			$arr=$this->get_meetings_info($club_id);
			$user=D('user','Api');
			$id2name_dict=$user->get_user_name_dictionary();
			$roles=array('owner_id','toast_id','joke_id','ge_id','gramm_id','timer_id','aha_id','table1_id','table2_id','table1_ev_id','table2_ev_id');
			$roles_speech=array('spk_id','ev_id');
			foreach($arr as &$meeting){
				foreach($roles as $role){
					if($meeting[$role] != ""){
						$i=$meeting[$role];
						$meeting[$role]=$id2name_dict[$i];
					}
				}
				foreach($meeting['speech'] as &$speech){
					foreach($roles_speech as $role_speech){
						if($speech[$role_speech] != ""){
							$i=$speech[$role_speech];
							$speech[$role_speech]=$id2name_dict[$i];
						}
					}
				}
			}
			return $arr;
		}
		public function get_visual_meeting_table($club_id){
			$meetings=$this->get_meetings_info_role_name($club_id);
			$roles=array('spk1_id','ev1_id','spk2_id','ev2_id','spk3_id','ev3_id','spk4_id','ev4_id','spk5_id','ev5_id',
						 'spk6_id','ev6_id','spk7_id','ev7_id','spk8_id','ev8_id','spk9_id','ev9_id');
			foreach($meetings as &$meeting){
				$i=0;
				$speeches=$meeting['speech'];
				array_pop($meeting);
				foreach($speeches as $speech){
					$meeting[$roles[$i]]=$speech['spk_id'];
					$i=$i+1;
					$meeting[$roles[$i]]=$speech['ev_id'];
					$i=$i+1;
				}
				
			}
			return $meetings;

		}

		public function get_visual_meeting_table_page($club_id,$type,$each_page_num){
			$table=$this->get_visual_meeting_table($club_id);
			
		}
		
		public function set_visualmeeting_role($m_id,$role_id,$user_id){
			$temp=substr($role_id,0,2);
			$meeting=D('meeting','Api');
			$speeches=$meeting->get_meeting_speeches($m_id);
			$count=$meeting->get_meeting_speech_count($m_id);
			if($temp=='sp'){
				$num=substr($role_id,3,1);
				$role_id='spk_id';
				//dump($num);
				//dump($count);
				if($num>$count){
					$meeting->add_meeting_speech_role($m_id,$role_id,$user_id);
				}
				else{
					$id=$speeches[$num-1]['Id'];
					$meeting->set_meeting_speech_role($id,$role_id,$user_id);	
				}
			}
			else if($temp=='ev'){
				$num=substr($role_id,2,1);	
				$role_id='ev_id';
				if($num>$count){
					$meeting->add_meeting_speech_role($m_id,$role_id,$user_id);
				}
				else{
					$id=$speeches[$num-1]['Id'];
					$meeting->set_meeting_speech_role($id,$role_id,$user_id);	
				}				
			}
			else{

				$meeting->set_meeting_role($m_id,$role_id,$user_id);			
			}
		}
		public function delete_visualmeeting_role($m_id,$role_id,$user_id){
			$temp=substr($role_id,0,2);
			$meeting=D('meeting','Api');	
			$speeches=$meeting->get_meeting_speeches($m_id);
			$count=$meeting->get_meeting_speech_count($m_id);
			//dump($speeches);
			if($temp=='sp'){
				$num=substr($role_id,3,1);
				//dump($num);
				$role_id='spk_id';
				//dump($speeches[$num-1]['ev_id']);
				if($speeches[$num-1]['ev_id']!=null){
					$id=$speeches[$num-1]['Id'];					
					$meeting->set_meeting_speech_role($id,$role_id,null);
				}
				else{
					$id=$speeches[$num-1]['Id'];				
					$meeting->delete_meeting_speech_role($id);	
				}							
			}
			else if($temp=='ev'){
				$num=substr($role_id,2,1);
				//dump($num);
				$role_id='ev_id';
				//dump($speeches[$num-1]['spk_id']);
				if($speeches[$num-1]['spk_id']!=null){
					$id=$speeches[$num-1]['Id'];					
					$meeting->set_meeting_speech_role($id,$role_id,null);
				}
				else{
					$id=$speeches[$num-1]['Id'];				
					$meeting->delete_meeting_speech_role($id);	
				}					
			}
			else{
				$meeting=D('meeting','Api');
				$meeting->delete_meeting_role($m_id,$role_id,$user_id);			
			}
		}		
		public function get_club_info($club_id){
			$condition['Id']=$club_id;
			$result = $this->relation(true)->where($condition)->find();
			return $result;
		}
		public function admin_modify_meeting($m_id){
		
		}
		//public function set_club_meeting($club_id)
		public function ut(){	
			echo("<h1>ut test in VisualMeeting</h1>");
			echo("<h2>get_meetings_info</h2>");
			dump($this->get_meetings_info(1));
/* 			echo("<h2>get_meetings_info_role_name</h2>");
			dump($this->get_meetings_info_role_name(1));	
			echo("<h2>get_visual_meeting_table</h2>");
			dump($this->get_visual_meeting_table(1)); */			
		}

	}
?>
