<?php
namespace Home\Api;
use Home\Logic\MeetingLogic;
	class MeetingApi extends MeetingLogic{
		public function get_meeting_info($meeting_id){
			$condition['Id']=$meeting_id;
			$result = $this->relation('speech')->where($condition)->find();
			return $result;
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
