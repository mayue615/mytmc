<?php
namespace Home\Api;
use Home\Logic\GuestcheckinLogic;
	class GuestcheckinApi extends GuestcheckinLogic{
		public function get_guests($m_id){
			$condition['m_id']=$m_id;
			$data=$this->where($condition)->relation(true)->select();
			return $data;
		}
	}
?>
