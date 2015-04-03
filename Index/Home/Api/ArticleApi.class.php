<?php
namespace Home\Api;
use Home\Logic\ArticleLogic;
	class ArticleApi extends ArticleLogic{
		public function get_user_article($user_id){
			$condition['user_id']=$user_id;
			$data=$this->where($condition)->select();
			return $data;
		}
		
	}
?>
