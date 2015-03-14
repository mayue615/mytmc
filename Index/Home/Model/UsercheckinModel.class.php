<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class UsercheckinModel extends RelationModel{
		protected $_link = array(
			'meeting' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'meeting',
			'foreign_key'       =>  'm_id',
			'as_fields'=>'m_date',
			),	
			'user' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'user_id',
			'as_fields'=>'english_name',
			),				
			
		);
		public function get_checkin_users($m_id){
			$condition['m_id']=$m_id;
			$this->where($condition)->select();
		}
		public function delete_checkin_users($m_id){
			$condition['m_id']=$m_id;
			$this->where($condition)->delete();
		}		
		public function is_user_checkin($m_id,$user_id){
			$condition['m_id']=$m_id;
			$condition['user_id']=$user_id;		
			return $this->where($condition)->count();
		}	
	}
?>
