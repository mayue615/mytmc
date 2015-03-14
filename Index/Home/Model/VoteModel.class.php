<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class VoteModel extends RelationModel{
	protected $_link = array(
		'meeting' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'meeting',
		'foreign_key'       =>  'm_id',
		'as_fields'=>'m_date',
		),	
		'role' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'user',
		'foreign_key'       =>  'best_role',
		'as_fields'=>'english_name:best_table_name',
		),		
		'speech' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'user',
		'foreign_key'       =>  'best_speech',
		'as_fields'=>'english_name:best_speech_name',
		),	
		'ev' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'user',
		'foreign_key'       =>  'best_ev',
		'as_fields'=>'english_name:best_ev_name',
		),		
		
	);
	
	
	}
?>
