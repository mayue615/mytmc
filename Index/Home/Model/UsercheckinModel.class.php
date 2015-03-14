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
	
	
	}
?>
