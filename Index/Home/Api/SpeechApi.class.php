<?php
namespace Home\Api;
use Home\Logic\SpeechLogic;
	class SpeechApi extends SpeechLogic{
		public function get_speeches_info(){
			$data=$this->select();
		}
		public function get_levels_info(){
			$data=$this->field('Id,level')->select();
			return $data;
		}		

	}
?>
