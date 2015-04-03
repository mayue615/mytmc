<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class ArticleModel extends RelationModel{
		protected $_link = array(
			'author' => array(
			'mapping_type'      =>  self::BELONGS_TO,
			'class_name'        =>  'user',
			'foreign_key'       =>  'user_id',
			'as_fields'=>'english_name:author',
			)	
			
		);	
	
	}
?>
