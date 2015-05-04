<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function login(){
	    $this->display('login');
	}
	public function register(){
	    $this->display('register');
	}
	
	public function register_deal(){
	    $user=D('user','Api');
		$data=$user->create();
		if(!$data){
			$this->error($user->getError());			
		}
		else{
			$data['authority']="member";
			$data['register_date']=date('Y-m-d H:i:s',time());			
			$user_id=$user->add($data);
			cookie('user_id',$user_id);		
			cookie('user_authority',"member");			
			$this->success('Add account successfully!',U('Member/apply_club'));			
		}
	}	
	public function is_user_exist_ajax(){
		$user_name=I('get.user_name');
		$user=D('user','Api');
		$result=$user->is_user_exist($user_name);
		if($result==false)
			$data=0;
		else
			$data=1;
		$this->ajaxReturn($data);
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
			$club_id=$user_info['club'][0]['Id'];
			cookie('user_id',$user_id);
			cookie('club_id',$club_id);
			cookie('user_authority',$user_authority);			
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
			$this->redirect('Member/club_info');			
		}

	}
    function logout(){
		//echo("delete cookie");
		cookie("user_authority",null);
		cookie("user_id",null);
		cookie("club_id",null);		
    	//cookie(null);//清空所有session信息,这个函数有bug
		$this->redirect('Index/index');
    }
	
}
?>