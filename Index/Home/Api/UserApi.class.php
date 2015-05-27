<?php
namespace Home\Api;
use Home\Logic\UserLogic;
	class UserApi extends UserLogic{
		public function login($user_name,$password){
		if(preg_match('/\d{11}$/', $user_name))
			$user_id=$this->is_phone_exist($user_name,$password);			
		else  	
			$user_id=$this->is_user_exist($user_name,$password);
			//dump($user_id);
			//exit;
			if(!$user_id){
				return false;
			}
			else{
				return $this->get_user_info_by_id($user_id);
			}
		}
		public function get_all_users(){
			$ds=$this->order('user_name')->select();
			return $ds;
		}
		public function get_user_name_dictionary(){
			$ds=$this->select();
			$id2name_dict = array();
			foreach($ds as $data){
				$user_name = $data['user_name'];
				$dis_name = $data['english_name'];
				$id =  $data['Id'] ;
				if ($dis_name==null){		
					$dis_name = $user_name;		
				}
				$id2name_dict[$id] = $dis_name;
				
			}
			return $id2name_dict;
		}
		public function get_user_name($user_id){
			$condition['Id']=$user_id;
			$result = $this->where($condition)->find();
			return $result['english_name'];			
		}
		public function get_user_email($user_id){
			$condition['Id']=$user_id;
			$result = $this->where($condition)->find();
			return $result['email'];			
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
			$data['is_active']=$is_active;
			if($result!=NULL){
				$data['Id']=$result['Id'];
				return $m->save($data);			
			}	
			else{
				return $m->add($data);
			}
		}
		public function delete_user_club($club_id,$user_id,$is_active){
			$data['user_id']=$user_id;
			$data['club_id']=$club_id;			
			$m=M('club_user');
			$result=$m->where($data)->find();
			$data['is_active']=$is_active;
			if($result!=NULL){
				$data['Id']=$result['Id'];
				return $m->delete($data['Id']);			
			}	
			else{
				return false;
			}
		}		
		public function get_user_speech($user_id){
			//dump($user_id);
			$condition['Id']=$user_id;
			$result = $this->relation('speech')->where($condition)->find();
			//dump($result);			
			return $result['speech'];						
		}		
		public function get_user_roles_number($user_id,$type="all"){
			$m=D('meeting','Api');
			$speech=D('userspeech','Api');			
			$id_roles=$m->meeting_roles();
			$current_date = date('Y-m-d',time());
			$data=array();
			$data1=array();
			$speech=D('userspeech','Api');			
			if($type=="past"){//history
				$data['type']="done";
				$data['Toastmaster']=$m->where("toast_id='$user_id' and m_date<='$current_date'")->count();
				$data['Jokemaster']=$m->where("joke_id='$user_id' and m_date<='$current_date'")->count();
				$data['General Evaluator']=$m->where("ge_id='$user_id' and m_date<='$current_date'")->count();					
				$data['Timer']=$m->where("timer_id='$user_id' and m_date<='$current_date'")->count();
				$data['Grammarian']=$m->where("gramm_id='$user_id' and m_date<='$current_date'")->count();	
				$data['Aha counter']=$m->where("aha_id='$user_id' and m_date<='$current_date'")->count();	
				$data['Table Topic Master']=$m->where("(table1_id='$user_id' or table2_id='$user_id') and m_date<='$current_date'")->count();
				$data['Table Evaluator']=$m->where("(table1_ev_id='$user_id' or table2_ev_id='$user_id') and m_date<='$current_date'")->count();
				$data1=$speech->get_user_speech($user_id,"past");
				$data['Speaker']=sizeof($data1);
				$data1=$speech->get_user_evaluator($user_id,"past");
				$data['Evaluator']=sizeof($data1);		
			}
			elseif($type=="future"){//future
				$data['type']="book";		
				$data['Toastmaster']=$m->where("toast_id='$user_id' and m_date>'$current_date'")->count();
				$data['Jokemaster']=$m->where("joke_id='$user_id' and m_date>'$current_date'")->count();
				$data['General Evaluator']=$m->where("ge_id='$user_id' and m_date>'$current_date'")->count();					
				$data['Timer']=$m->where("timer_id='$user_id' and m_date>'$current_date'")->count();
				$data['Grammarian']=$m->where("gramm_id='$user_id' and m_date>'$current_date'")->count();	
				$data['Aha counter']=$m->where("aha_id='$user_id' and m_date>'$current_date'")->count();	
				$data['Table Topic Master']=$m->where("(table1_id='$user_id' or table2_id='$user_id') and m_date>'$current_date'")->count();
				$data['Table Evaluator']=$m->where("(table1_ev_id='$user_id' or table2_ev_id='$user_id') and m_date>'$current_date'")->count();	
				$data1=$speech->get_user_speech($user_id,"future");
				$data['Speaker']=sizeof($data1);
				$data1=$speech->get_user_evaluator($user_id,"future");
				$data['Evaluator']=sizeof($data1);				
			}
			else{//all
				$data['type']="all";			
				$data['Toastmaster']=$m->where("toast_id='$user_id'")->count();
				$data['Jokemaster']=$m->where("joke_id='$user_id'")->count();
				$data['General Evaluator']=$m->where("ge_id='$user_id'")->count();					
				$data['Timer']=$m->where("timer_id='$user_id'")->count();
				$data['Grammarian']=$m->where("gramm_id='$user_id'")->count();	
				$data['Aha counter']=$m->where("aha_id='$user_id'")->count();	
				$data['Table Topic Master']=$m->where("table1_id='$user_id' or table2_id='$user_id'")->count();
				$data['Table Evaluator']=$m->where("table1_ev_id='$user_id' or table2_ev_id='$user_id'")->count();	
				$data1=$speech->get_user_speech($user_id,"all");
				$data['Speaker']=sizeof($data1);
				$data1=$speech->get_user_evaluator($user_id,"all");
				$data['Evaluator']=sizeof($data1);		
			}
			//echo("ttt");
			//dump($data);
			return $data;
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
