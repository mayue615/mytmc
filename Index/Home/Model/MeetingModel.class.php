<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class MeetingModel extends RelationModel{
		protected $_link = array(
			'club' => array(
			'mapping_type'      =>  self::MANY_TO_MANY,
			'class_name'        =>  'club',
			'foreign_key'       =>  'm_id',
			'relation_foreign_key'  =>  'club_id',
			'relation_table'    =>  'club_meeting', //此处应显式定义中间表名称，且不能使用C函数读取表前缀
			),	
			'speech' => array(
			'mapping_type'      =>  self::HAS_MANY,
			'class_name'        =>  'user_speech',//子表名称
			'foreign_key'       =>  'm_id',
			//'mapping_fields' => array('level,body,title'),//默认所有的字段都查询
			),				
		);
	
	

	}
?>
