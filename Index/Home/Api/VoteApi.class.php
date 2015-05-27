<?php
namespace Home\Api;
use Home\Logic\VoteLogic;
	class VoteApi extends VoteLogic{
		public function get_user_vote($m_id){
			$condition['m_id']=$m_id;
			$data=$this->where($condition)->relation(true)->select();
			return $data;
		}
		public function get_votes($m_id){
			$meeting=D('meeting','Api');
			$data=$meeting->get_meeting_each_role($m_id);
			$condition=array();
 			foreach($data['spk'] as &$role){
				$condition['best_speech']=$role['Id'];
				$condition['m_id']=$m_id;
				$num=$this->where($condition)->count();
				$role['vote']=$num;				
			}
			$condition=array();
 			foreach($data['ev'] as &$role){
				$condition['best_ev']=$role['Id'];
				$condition['m_id']=$m_id;
				$num=$this->where($condition)->count();
				$role['vote']=$num;				
			}	
			$condition=array();
 			foreach($data['role'] as &$role){
				$condition['best_role']=$role['Id'];
				$condition['m_id']=$m_id;
				$num=$this->where($condition)->count();
				$role['vote']=$num;				
			}
			$condition=array();
 			foreach($data['table'] as &$role){
				$condition['best_table']=$role['Id'];
				$condition['m_id']=$m_id;
				$num=$this->where($condition)->count();
				$role['vote']=$num;			
			}			
			return $data;
		}		
	}
?>
