<?php
namespace Home\Logic;
use Home\Model\MeetingModel;

	class MeetingLogic extends MeetingModel{

		public function is_user_exist($user_name,$password){
			if($password==NULL){
				$condition=array('user_name'=>$user_name);
			}
			else{
				$condition=array('user_name'=>$user_name,'password'=>$password);
			}
			$result=$this->where($condition)->find();		
			if($result==NULL)
				return false;
			else
				return $result['Id'];
		}
		
		
		public function get_user_info_by_id($user_id){
			$condition=array('Id'=>$user_id);
			$result=$this->where($condition)->find();
			return $result;
		}
		public function get_user_info_by_user_name($user_name){
			$condition=array('user_name'=>$user_name);
			$result=$this->where($condition)->find();
			return $result;
		}
		/*
		$data['user_name']=$user_name;
		$data['password']=$password;
		$data['english_name']=$english_name;
		$data['chinese_name']=$chinese_name;		
		$data['email']=$email;	
		$data['phone']=$phone;	
		$data['authority']=$authority;			
		$data['birthday']=$birthday;			
		*/
		public function set_user_info($data){
			return $result=$this->save($data);
		}
		public function add_user($data){
			if(!$this->is_user_exist($data['user_name'])){
				return $this->add($data);
			}
			else
				return false;
		}
		public function delete_user_by_id($user_id){
			return $this->delete($user_id);		
		}
		
		public function ut(){
			$user_id=13;
			$user_name="mayue";
			$password="123456";
			$english_name="Mary";
			$chinese_name="马月";
			$email="mayue615@qq.com";
			$phone="18626881650";
			$authority="admin";
			$birthday="1987-6-15";
			$data['user_name']=$user_name;
			$data['password']=$password;
			$data['english_name']=$english_name;
			$data['chinese_name']=$chinese_name;		
			$data['email']=$email;	
			$data['phone']=$phone;	
			$data['authority']=$authority;			
			$data['birthday']=$birthday;
			//dump($this->is_user_exist($user_name,$password));
			//dump($this->is_user_exist($user_name));
			dump($this->add_user($data));
			dump($this->delete_user_by_id($user_id));
			//dump($this->add_user($data));			
			//dump($this->get_user_info_by_id($user_id));
			//dump($this->get_user_info_by_user_name($user_name));
			//dump($this->set_user_info($data));			
		}
	}
?>
