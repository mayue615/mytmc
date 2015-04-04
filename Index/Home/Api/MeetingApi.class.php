<?php
namespace Home\Api;
use Home\Logic\MeetingLogic;
	class MeetingApi extends MeetingLogic{
		public function get_meeting_info($m_id){
			//dump($m_id);
			$condition['Id']=$m_id;
			$result = $this->relation('speech')->where($condition)->order('Id')->find();
			//dump($result);
			return $result;
		}
	
		public function get_meeting_info_role_name($m_id){
			$meeting=$this->get_meeting_info($m_id);
			$user=D('user','Api');
			$id2name_dict=$user->get_user_name_dictionary();
			$roles=array('owner_id','toast_id','joke_id','ge_id','gramm_id','timer_id','aha_id','table1_id','table2_id','table1_ev_id','table2_ev_id');
			$roles_speech=array('spk_id','ev_id');
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
			return $meeting;
		}
		public function get_meeting_each_role($m_id){
			$arr=$this->get_meeting_info_role_name($m_id);
			$arr_role=array();				
			$roles=array('toast_id','ge_id','aha_id','timer_id','gramm_id','joke_id','table1_id','table2_id','table1_ev_id','table2_ev_id');
			foreach($roles as $role){
				if($arr[$role]!=NULL){
					array_push($arr_role,$arr[$role]);					
				}
			}
			$table=array(1,2,3,4,5,6,7,8,9,10);
			$data=array();
			$arr_spk=array();	
			$arr_ev=array();				
			$speeches=$arr['speech'];
			//dump($speeches);
			foreach($speeches as $item){
				if($item['spk_id']!=NULL){
					array_push($arr_spk,$item['spk_id']);
				}
				if($item['ev_id']!=NULL){				
					array_push($arr_ev,$item['ev_id']);
				}
			}

			$data['spk']=$arr_spk;
			$data['ev']=$arr_ev;
			$data['role']=$arr_role;
			$data['table']=$table;				
			return $data;
		
		}
		public function get_visual_meeting_table($m_id){
			$meeting=$this->get_meeting_info_role_name($m_id);
			$roles=array('spk1_id','ev1_id','spk2_id','ev2_id','spk3_id','ev3_id','spk4_id','ev4_id','spk5_id','ev5_id',
						 'spk6_id','ev6_id','spk7_id','ev7_id','spk8_id','ev8_id','spk9_id','ev9_id');
				$i=0;
				$speeches=$meeting['speech'];
				array_pop($meeting);
				foreach($speeches as $speech){
					$meeting[$roles[$i]]=$speech['spk_id'];
					$i=$i+1;
					$meeting[$roles[$i]]=$speech['ev_id'];
					$i=$i+1;
				}
			//dump($m_id);
			//dump($meeting);
			return $meeting;

		}

		
		public function get_meeting_speeches($m_id){

			$m=M('userspeech');		
			$condition['m_id']=$m_id;
			$result=$m->where($condition)->order('Id')->select();
			return $result;
		}		
		public function get_meeting_speech_count($m_id){
			$m=M('userspeech');		
			$condition['m_id']=$m_id;
			$count=$m->where($condition)->count();
			return $count;
		}
		public function set_meeting_role($m_id,$role_id,$user_id){
			//echo("in function set_meeting_speech_role<br>");		
			$data['Id']=$m_id;
			$data[$role_id]=$user_id;
			//dump($data);			
			$this->save($data);			
		}		
		public function delete_meeting_role($m_id,$role_id){
			$data['Id']=$m_id;
			$data[$role_id]=null;
			$this->save($data);			
		}
		public function set_meeting_speech_role($id,$role_id,$user_id){
			//echo("in function set_meeting_speech_role<br>");
			$m=M('userspeech');
			$data['Id']=$id;
			$data[$role_id]=$user_id;
			//dump($data);
			$m->save($data);						
		}		
		public function add_meeting_speech_role($m_id,$role_id,$user_id){
			//echo("in function add_meeting_speech_role<br>");
			$m=M('userspeech');
			$data['m_id']=$m_id;
			$data[$role_id]=$user_id;	
			//dump($data);	
			$m->add($data);						
		}		
		public function delete_meeting_speech_role($id){
			//echo("in function delete_meeting_speech_role<br>");
			//dump($id);
			$m=M('userspeech');		
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
		public function add_meeting($data){
			$this->relation('club')->add($data);
		}
		public function set_meeting_info($data){
			$this->relation(true)->save($data);
		}
		public function add_meeting_club($m_id,$club_id){
			$m=M('club_meeting');
			$data['m_id']=$m_id;
			$data['club_id']=$club_id;
			$m->add($data);
		}
	public function meeting_roles(){
		$role_list = array('toast_id'=>'ToastMaster', 'joke_id'=>'JokeMaster', 'ge_id'=>'General Evaluator', 'timer_id'=>'Timer',
					'gramm_id'=>'Grammarian', 'aha_id'=>'Aha counter', 'table1_id'=>'Table Topic Master','table2_id'=>'Table Topic Master2',
					'table1_ev'=>'Table Evaluator1','table2_ev'=>'Table Evaluator1','spk_id'=>'Speaker','ev_id'=>'Evaluator');				
		return $role_list;
	}

	}
?>
