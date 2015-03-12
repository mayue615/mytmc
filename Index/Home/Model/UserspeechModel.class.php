<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class UserspeechModel extends RelationModel{
	protected $_link = array(
/* 		'club' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'club',
		'foreign_key'       =>  'user_id',
		'relation_foreign_key'  =>  'club_id',
		'relation_table'    =>  'club_user', //此处应显式定义中间表名称，且不能使用C函数读取表前缀
		), */
		'ev' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'user',//子表名称
		'foreign_key'       =>  'ev_id',
		'as_fields'=>'english_name:ev_name',
		'mapping_name'  => 'user',
		//'mapping_fields' => array('level,body,title'),//默认所有的字段都查询
		),	
		'spk' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'user',//子表名称
		'foreign_key'       =>  'spk_id',
		'as_fields'=>'english_name:spk_name',
		'mapping_name'  => 'user',
		//'mapping_fields' => array('level,body,title'),//默认所有的字段都查询
		),		
		'meeting' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'meeting',
		'foreign_key'       =>  'm_id',
		'as_fields'=>'m_date',
		'mapping_name'  => 'meeting',

		),		
		'speech' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'speech',
		'foreign_key'       =>  'level',
		'as_fields'=>'level:speech_level,max_time,min_time',
		'mapping_name'  => 'speech',

		),		
		
	);
	
		public function ut(){
			$data=$this->relation(true)->select();
			dump($data);
		}	
	

	}
?>
