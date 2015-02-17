<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class ClubModel extends RelationModel{
		protected $_link = array(
			'user' => array(
			'mapping_type'      =>  self::MANY_TO_MANY,
			'class_name'        =>  'user',
			'foreign_key'       =>  'club_id',
			'relation_foreign_key'  =>  'user_id',
			'relation_table'    =>  'club_user', //此处应显式定义中间表名称，且不能使用C函数读取表前缀
			),
			'meeting' => array(
			'mapping_type'      =>  self::MANY_TO_MANY,
			'class_name'        =>  'meeting',
			'foreign_key'       =>  'club_id',
			'relation_foreign_key'  =>  'm_id',
			'relation_table'    =>  'club_meeting', //此处应显式定义中间表名称，且不能使用C函数读取表前缀
			),			
		);
	

	}
?>
