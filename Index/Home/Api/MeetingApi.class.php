<?php
namespace Home\Api;
use Home\Logic\MeetingLogic;
	class MeetingApi extends MeetingLogic{
		public function get_meeting_info($m_id){

			$condition['Id']=$m_id;
			$result = $this->relation('speech')->where($condition)->order('Id')->find();
			//dump($result);
			return $result;
		}
		public function get_meeting_speeches($m_id){

			$m=M('user_speech');		
			$condition['m_id']=$m_id;
			$result=$m->where($condition)->order('Id')->select();
			return $result;
		}		
		public function get_meeting_speech_count($m_id){
			$m=M('user_speech');		
			$condition['m_id']=$m_id;
			$count=$m->where($condition)->count();
			return $count;
		}
		public function set_meeting_role($m_id,$role_id,$user_id){
			$data['Id']=$m_id;
			$data[$role_id]=$user_id;
			$this->save($data);			
		}		
		public function delete_meeting_role($m_id,$role_id,$user_id){
			$data['Id']=$m_id;
			$data[$role_id]=null;
			$this->save($data);			
		}
		public function set_meeting_speech_role($id,$role_id,$user_id){
			//echo("in function set_meeting_speech_role<br>");
			$m=M('user_speech');
			$data['Id']=$id;
			$data[$role_id]=$user_id;
			//dump($data);
			$m->save($data);						
		}		
		public function add_meeting_speech_role($m_id,$role_id,$user_id){
			//echo("in function add_meeting_speech_role<br>");
			$m=M('user_speech');
			$data['m_id']=$m_id;
			$data[$role_id]=$user_id;	
			//dump($data);	
			$m->add($data);						
		}		
		public function delete_meeting_speech_role($id){
			//echo("in function delete_meeting_speech_role<br>");
			//dump($id);
			$m=M('user_speech');		
			$m->delete($id);			
		}		
		public function get_meeting_club($meeting_id){
			$condition['Id']=$meeting_id;
			$result = $this->relation('club')->where($condition)->find();
			return $result['club'];
		}
		public function get_meeting_role_id(){
			$roles_id=array('owner_id','toast_id','joke_id','table1_id','table2_id','ge_id','gramm_id','timer_id','aha_id','table1_ev_id','table2_ev_id',
			'spk1_id','ev1_id','spk2_id','ev2_id','spk3_id','ev3_id','spk4_id','ev4_id','spk5_id','ev5_id',
			'spk6_id','ev6_id','spk7_id','ev7_id','spk8_id','ev8_id','spk9_id','ev9_id');
			return $roles_id;
		}

	}
?>
