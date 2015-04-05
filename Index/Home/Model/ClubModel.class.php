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
			'mapping_order'     =>  'english_name',
			'relation_table'    =>  'club_user', //此处应显式定义中间表名称，且不能使用C函数读取表前缀
			),
			'president' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'president',
			'as_fields'=>'english_name:president_name',
			),		
			'vpe' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'vpe',
			'as_fields'=>'english_name:vpe_name',
			),
			'vpm' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'vpm',
			'as_fields'=>'english_name:vpm_name',
			),			
			'vppr' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'vppr',
			'as_fields'=>'english_name:vppr_name',
			),				
			'saa' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'saa',
			'as_fields'=>'english_name:saa_name',
			),				
			'vppr' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'vppr',
			'as_fields'=>'english_name:vppr_name',
			),				
			'treasurer' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'treasurer',
			'as_fields'=>'english_name:treasurer_name',
			),	
			'secretary' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'secretary',
			'as_fields'=>'english_name:secretary_name',
			),				
			'meeting_id' => array(
			'mapping_type'      =>  self::MANY_TO_MANY,
			'mapping_fields'		=>  'Id,m_date',
			'class_name'        =>  'meeting',
			'foreign_key'       =>  'club_id',
			'relation_foreign_key'  =>  'm_id',
			'mapping_order' => 'm_date',			
			'relation_table'    =>  'club_meeting', //此处应显式定义中间表名称，且不能使用C函数读取表前缀
			),					
			'meeting' => array(
			'mapping_type'      =>  self::MANY_TO_MANY,
			'class_name'        =>  'meeting',
			'foreign_key'       =>  'club_id',
			'relation_foreign_key'  =>  'm_id',
			'mapping_order' => 'm_date',
			'relation_table'    =>  'club_meeting', //此处应显式定义中间表名称，且不能使用C函数读取表前缀
			),			
		);
	

	}
?>
