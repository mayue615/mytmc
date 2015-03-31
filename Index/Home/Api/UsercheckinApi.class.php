<?php
namespace Home\Api;
use Home\Logic\UsercheckinLogic;
	class UsercheckinApi extends UsercheckinLogic{
		public function get_user_speech($user_id){
			$condition['spk_id']=$user_id;
			$data=$this->where($condition)->relation(true)->select();
			return $data;
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
