<?php
namespace Home\Controller;
use Think\Controller;

class CanteenController extends Controller {
	public function index(){
		$question=D('nokia_canteen_question');
		$user_id=I('get.user_id');
		$condition->Id=1;
		$data=$question->where($condition)->find();
		$this->assign('user_id',$user_id);
		$this->assign('data',$data);
		$this->display('index');
	}
	public function save_user($user_id,$site){
		$user=D('nokia_canteen_user');
		$data['user_id']=$user_id;
		$data['ip']=get_client_ip();
		$data['site']=$site;
		$user->add($data);
	}
	public function index_deal(){
		$answer=D('nokia_canteen_question_answer');
		//$data=$answer->create();
		$data['user_id']=I('get.user_id');
		$data['q_id']=I('get.q_id');
		$data['answer']=I('get.answer');
		if(preg_match('/[AB]/',$data['answer'])){
			$answer->add($data);
			$site=0;
			if($data['answer']=="A"){
				$site=1;
			}
			else if($data['answer']=="B"){
				$site=2;
			}
			else{
				;
			}
			$this->redirect('question',array('site'=>$site,'user_id'=>$data['user_id']));		
		}
		else{
			$this->error("Some answer is not selected!");
		}

	}
	public function question_deal(){//need to test all answers are selected
 		$site=I('post.site');
		$user_id=I('post.user_id');			
		$question=D('nokia_canteen_question');
		$answer=D('nokia_canteen_question_answer');
		$condition->question_site=$site;
		$num=$question->where($condition)->count();	
		for($i=1;$i<=$num-1;$i++){
			$answer_i=I('post.answer'.$i);
			if($answer_i==""){
				$this->error("Some answer is not selected!");
				exit();
			}
		}
		for($i=1;$i<=$num;$i++){
			$data=array();
			$answer_i=I('post.answer'.$i);
			$q_id=I('post.q_id'.$i);
			$data['user_id']=$user_id;
			$data['q_id']=$q_id;
			$data['answer']=$answer_i;
			$answer->add($data);
		}
		$this->save_user($user_id,$site);		
		$this->redirect('result');
	
	}
	public function result(){
/* 		$answer=D('nokia_canteen_question_answer');
		$question=D('nokia_canteen_question');	
		$user=D('nokia_canteen_user');		
		$condition['site']=1;
		$A_site_num=$user->where($condition)->count();
		$condition['site']=2;
		$B_site_num=$user->where($condition)->count();
		$result=array();
		$condition=array();
		$q_num=$question->count();
		for($i=2;$i<=$q_num;$i++){
			$temp_q=array();
			$temp_q["question"]=			
			$condition['answer']="A";
			$condition['q_id']=$i;
			$temp_q["A"]=$answer->where($condition)->count();
			
			$condition['answer']="B";
			$condition['q_id']=$i;
			$temp_q["B"]=$answer->where($condition)->count();
			
			$condition['answer']="C";
			$condition['q_id']=$i;
			$temp_q["C"]=$answer->where($condition)->count();
			
			$condition['answer']="D";
			$condition['q_id']=$i;
			$temp_q["D"]=$answer->where($condition)->count();
			
			$condition['answer']="E";
			$condition['q_id']=$i;
			$temp_q["E"]=$answer->where($condition)->count();

		} */
		

		
		
		$this->display();
	}
	
	public function question(){
		$site=I('get.site');
		$user_id=I('get.user_id');
		$question=D('nokia_canteen_question');
		$condition->question_site=$site;
		$data=$question->where($condition)->select();
		$this->assign('user_id',$user_id);
		$this->assign('site',$site);		
		$this->assign('arr',$data);
		$this->display();
	}

}
?>