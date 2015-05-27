<?php
namespace Home\Api;
use Home\Logic\UserspeechLogic;
	class UserspeechApi extends UserspeechLogic{
		public function get_user_speech($user_id,$type="all"){
			$condition['spk_id']=$user_id;
			$data=$this->where($condition)->relation(true)->select();
			$data_past=array();
			$data_future=array();
			$current_date = date('Y-m-d',time());

			foreach($data as $item){
				
				if($item['m_date']<=$current_date){
					array_push($data_past,$item);
				}
				else{
					array_push($data_future,$item);	
				}
			}		
			if($type=="all"){
				return $data;
			}
			else if($type=="past"){
				return $data_past;				
			}
			else{
				return $data_future;				
			}
		}
		public function get_user_evaluator($user_id,$type="all"){
			$condition['ev_id']=$user_id;
			$data=$this->where($condition)->relation(true)->select();
			$data_past=array();
			$data_future=array();
			$current_date = date('Y-m-d',time());

			foreach($data as $item){
				
				if($item['m_date']<=$current_date){
					array_push($data_past,$item);
				}
				else{
					array_push($data_future,$item);	
				}
			}		
			if($type=="all"){
				return $data;
			}
			else if($type=="past"){
				return $data_past;				
			}
			else{
				return $data_future;				
			}
		}		
		public function get_single_speech($speech_id){
			$condition['Id']=$speech_id;
			$data=$this->where($condition)->relation(true)->find();
			return $data;
		}		
		public function get_meeting_speech($m_id){
			$condition['m_id']=$m_id;
			$data=$this->where($condition)->relation(true)->order('level desc')->select();
			return $data;
		}
	}
?>
