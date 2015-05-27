<?php
namespace Home\Controller;
use Think\Controller;
	class CommonadminController extends Controller{
		Public function _initialize(){
   		// 初始化的时候检查用户权限
   			if(!isset($_COOKIE['user_authority']) || $_COOKIE['user_authority']=='admin'|| $_COOKIE['user_authority']=='superadmin'){
				$user_id = $_COOKIE['user_id'];	
				$user=D('user','Api');
				$user_name=$user->get_user_name($user_id);
				$club_info=$user->get_user_club($user_id);
				$this->assign('club_info',$club_info);
				$this->assign('user_name',$user_name);	
				$this->assign('user_name_2',$user_name."@");
				$this->common_para();

			}
			else{
				$this->error("you don't authority to visit this function",U('Login/login'));
			}
		}
		public function common_para(){
			$club_id = cookie('club_id');
			$club=D('club','Api');
			$m_id=$club->get_next_meetings_id($club_id);
			$this->assign('club_id',$club_id);
			$this->assign('m_id',$m_id);			
		}		
	}
?>
