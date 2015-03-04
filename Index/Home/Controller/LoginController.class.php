<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function login(){
	    $this->display('login');
	}
	public function login_deal(){
		$username = I('post.username');
		$password = I('post.password');
		$user=D('user','Api');
		$user_info=$user->login($username,$password);
 		if(!$user_info)
		{	
			$this->error("User name or password is error");
		}	
		else		
		{
			$dis_name=$user_info['english_name'];
			$user_id=$user_info['Id'];
			$user_authority=$user_info['authority'];
			cookie('user_id',$user_id);
			$login_times = $user_info['login_times'];
			if($login_times != "")
				$login = intval($login_times)+1;
			else
				$login = 1;;
			$date = date('Y-m-d H:i:s',time());
			$data['Id']=$user_id;			
			$data['login_times']=$login;
			$data['last_login']=$date;
			$user->set_user_info($data);
			//cookie('user_id',$id);
			//cookie('club_id',$club_id);
			cookie('user_authority',$user_authority);
			if($user_authority=="admin"){
				$this->redirect('Admin/members');
			}
			elseif($user_authority=="superadmin"){
				$this->redirect('Superadmin/clubs');
			}			
			elseif($user_authority=="activity"){
				$this->redirect('Luckydraw/activity');
			}
			else{
				$this->redirect('Member/club_info');
			}
		}

	}
    function logout(){
		//echo("delete cookie");
		cookie("user_authority",null);
		cookie("user_id",null);
    	//cookie(null);//清空所有session信息,这个函数有bug
		$this->redirect('Index/index');
    }
	
}
?>