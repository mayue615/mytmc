<?php
namespace Home\Controller;
use Think\Controller;
	class CommonController extends Controller{
		Public function _initialize(){
   		// 初始化的时候检查用户权限
   			if(!isset($_COOKIE['user_id']) || $_COOKIE['user_id']==''){
				$this->error("you don't authority to visit this function",U('Login/login'));
			}
			else{
				$user_id = $_COOKIE['user_id'];	
				$user=D('user','Api');
				$user_name=$user->get_user_name($user_id);
				$club_info=$user->get_user_club($user_id);
				$this->assign('club_info',$club_info);
				$this->assign('user_name',$user_name);	
				$this->assign('user_name_2',$user_name."@");
			}
		}
		
	}
?>
