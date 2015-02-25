<?php
namespace Home\Controller;
use Think\Controller;

class MemberController extends CommonController {
	public function club_choose(){
		$club_id=I('get.club_id');
		cookie('club_id',$club_id);		
		$this->redirect('club_info');

	}
    public function club_info(){
		$email_sum="";
		$club_id = cookie('club_id');
		$user_id=session("user_id");
		$club1=D('club','Api');
		$arr=$club1->get_users_info($club_id);
		foreach($arr as $item){
			if($item!=""){
				$email_sum=$email_sum.$item['email'].";";
			}
		} 
		$this->assign('email_sum',$email_sum);
		$this->assign('data',$arr);		
		$this->display('clubmember');
	}

 	public function history(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(strstr($agent,'Windows'))
			$this->history_PC();
		else
			$this->history_phone();
	}
	
    public function history_PC(){
 		$current_date = date('Y-m-d',time());
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
/* 		$meeting1=new MeetingController();
		$each_page_num=8;
		$result=$meeting1->all_meeting_page($club_id,1,$each_page_num);	 */
		$this->assign('data',$result['data']);
		$this->assign('page_method',$result['show']);		
		$this->display('history');		
	}

    public function history_phone(){
 		$current_date = date('Y-m-d',time());
/* 		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
		$dictionary1=new DictionaryController();
		//$id2name_dict=$dictionary1->id2name_dict($club_id);
		$id2role_dict=$dictionary1->id2role_dict($club_id);
		
	    $m=M('rolebooking');
		$result= array();
		$arr=$m->where("club_id='$club_id' AND m_date<'$current_date'")->order('Id desc')->select();
        $roles=array('toast_id','joke_id','table1_id','table2_id','ge_id','gramm_id','timer_id','aha_id','ev1_id','ev2_id','ev3_id','ev4_id','ev5_id','spk1_id','spk2_id','spk3_id','spk4_id','spk5_id','spk6_id','spk7_id','spk8_id','spk9_id');		
		foreach($arr as &$value)
		{	$num=$value['num'];
		    $m_date=$value['m_date'];
			
			foreach($roles as $role)
			{   $i= $value[$role];
				if(($value[$role]) == $user_id){ 
					
					$rolename=$id2role_dict[$role];
				}

			}
			$temp=array('num'=>$num,'m_date'=>$m_date,'role'=>$rolename);
			array_push($result,$temp);
			$rolename="";
		} */	
				
		$this->assign('data',$result);//$arr(num,m_date,role)
		$this->display('history_phone');		
	}
	
/*    public function booking(){
 		$current_date = date('Y-m-d',time());
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
		//$test=$this->test();
		//dump($test);
		$dictionary1=new DictionaryController();
		$meeting1=new MeetingController();
		$each_page_num=12;
		$result=$meeting1->all_meeting_page($club_id,2,$each_page_num);	
		$roles_list=$dictionary1->id2role_dict();
		$this->assign('roles',$roles_list);
		$this->assign('data',$result['data']);
		$this->assign('page_method',$result['show']);	
		$user1=new UserController();
		$arr_delete=$user1->get_user_has_role_meeting($club_id,$user_id);	
		$this->assign('delete_role',$arr_delete);
		$arr_add=$user1->get_user_has_no_role_meeting($club_id,$user_id);	
		$this->assign('add_role',$arr_add);		
		$this->display('booking');
	}
	
	public function test(){
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
		$meeting_date="2015-1-29";
		$user1=new UserController();
		//$arr=$user1->get_user_has_role_meeting($club_id,$user_id);
		$arr=$user1->get_user_null_role_id($club_id,$meeting_date,$user_id);
		dump($arr);
		return $arr;
	
	}
	public function booking_add_meeting_role_ajax(){
		$add_role_date=I('get.add_role_date');
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];	
		$user1=new UserController();
		$arr=$user1->get_user_null_role_id($club_id,$add_role_date,$user_id);
		$this->ajaxReturn($arr);	
	}
	public function booking_delete_meeting_role_ajax(){
			$this->ajaxReturn($roles);	
	}	
	public function booking_js(){
	    $str=I('post.change_role');
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
		$str=rtrim($str,";");
		$arr=explode(";",$str);
		$data=array();
		foreach($arr as $item){
			$arr_temp=explode(",",$item);
			array_push($data,$arr_temp);
		}
		$role1=new RoleController();
		$user1=new UserController();
		foreach($data as $item){
			$i=$item[1];
			$j=$item[2];						
			if($item[0]=="add"){
				$result=$role1->add($club_id,$i,$j,$user_id);			
			}
			elseif($item[0]=="delete"){
				if($j=="null"){
					$j=$user1->get_user_role_id($club_id,$i,$user_id);
				}
				$result=$role1->delete($club_id,$i,$j,$user_id);			

			}
			else{
			
			}
		}
		$this->success("Succeed to update roles");
	}
	public function booking_form_deal(){
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];	
		$i=I('get.add_meeting_id');
		$j=I('get.add_meeting_role');
		$k=I('get.delete_meeting_id');
		$l=I('get.delete_meeting_role');;
		
		$role1=new RoleController();
		$user1_id=$role1->role2user_id_dict($club_id,$i,$j);
		$user2_id=$role1->role2user_id_dict($club_id,$k,$l);
		//echo($user1_id.",".$user2_id.",");

		if($i!="" AND $j!=""){
			if($user1_id==0){
				$result=$role1->add($club_id,$i,$j,$user_id);
				if($result==1){
					$this->success("You succeeded to add a role");
				}
				else{
					$this->error("You failed to add a role");
				}
			}
			else{
				$this->error("This role is applied!");
			}
		}


		elseif($k!="" AND $l!=""){
			if($user_id==$user2_id){		
				//$role_id=$role2id_dict[$l];
				$result=$role1->delete($club_id,$k,$l,$user_id);
				if($result==1){
					$this->success("You succeeded to delete a role");
				}
				else{
					$this->error("You failed to delete a role");
				}		
			}
			else{
				$this->error("This role is not yours!");		
			}			

		}
		else{
			$this->error("You must select both meeting number and role");
		}
	}	
	public function agenda(){
	$club_id = $_SESSION['club_id'];
	$index1=new IndexController();
	$index1->agenda_show($club_id);
	
	}
	public function mypage_speech_deal(){
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
		$dictionary1=new DictionaryController();
		$person_speech=$dictionary1->person_speech_list($club_id,$user_id);				
		$number=I('get.number');
		$level=I('get.level');		
		$title=I('get.title');		
		$m=M('rolebooking');
		$arr=$m->where("num='$number'")->find();
		foreach($person_speech as $item){
			if($item['num']==$number){
				if($item['spk_id']=='spk1_id'){
					$data['spk1_level']=$level;
					$data['spk1_title']=$title;
					$m->where("num='$number'")->save($data);
					//dump($data);
				}
				if($item['spk_id']=='spk2_id'){
					$data['spk2_level']=$level;
					$data['spk2_title']=$title;
					$m->where("num='$number'")->save($data);
				}
				if($item['spk_id']=='spk3_id'){
					$data['spk3_level']=$level;
					$data['spk3_title']=$title;
					$m->where("num='$number'")->save($data);
				}
				if($item['spk_id']=='spk4_id'){
					$data['spk4_level']=$level;
					$data['spk4_title']=$title;
					$m->where("num='$number'")->save($data);
				}
				if($item['spk_id']=='spk5_id'){
					$data['spk5_level']=$level;
					$data['spk5_title']=$title;
					$m->where("num='$number'")->save($data);
				}				
				
			}
		
		}
		$this->success("update success!");
	}
	public function mypage_info_deal(){
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];
		$data['Id']=$user_id;
		$data['dis_name']=I('get.dis_name');
		$data['phone']=I('get.phone');
		$data['mail']=I('get.mail');
		$data['password']=I('get.password');
		$data['speech_level']=I('get.speech_level');
		$data['birthday']=I('get.birthday');
		$data['date_join']=I('get.date_join');	
		$user1=new UserController();
		$user1->modify_user_info($data);
		$this->success("Your information updated!");

	}
	public function myarticle(){
		$club_id = $_SESSION['club_id'];
		$user_id = $_SESSION['user_id'];	
		$article1=new ArticleController();
		$article=$article1->show_user_article_page($user_id);
		$this->assign('article_list',$article['data']);
		$this->assign('page_method_article',$article['show']);	
			//foreach($news_list as &$item){
			//	$item['author']=$id2name_dict[$item['author']];
			//}
			//$this->assign('news_count',$count);
			//$this->assign('news_list',$news_list);
			//$this->assign('page_method',$show);		
			$this->display();
	} */
}
?>