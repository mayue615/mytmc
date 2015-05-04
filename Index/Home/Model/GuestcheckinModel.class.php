<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class GuestcheckinModel extends RelationModel{
	protected $_link = array(
		'meeting' => array(
		'mapping_type'      =>  self::BELONGS_TO,
		'class_name'        =>  'meeting',
		'foreign_key'       =>  'm_id',
		'as_fields'=>'m_date',
		),		
		
	);
    protected $_validate = array(
        array('english_name', 'require', '标识不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('Chinese_name', 'require', '标识不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('email', 'require', '标识不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),		
        //array('introducer', 'require', '名称不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('phone', 'require', '名称不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),		
    );	
	
	}
?>
