<?php
namespace Home\Controller;
use Think\Controller;

class QuestionController extends Controller {
	
	public function question(){
	$data=$this->get_a_question();
	$user_id=I('get.user_id');
	$this->save_user_id($user_id);	
	$this->assign('user_id',$user_id);	
	$this->assign('data',$data);
	$this->display();
	}	
	public function score(){

	//dump($data);
	$user_id=I('get.user_id');
	$this->save_user_id($user_id);		
	$my_score=$this->get_personal_score($user_id);
	$scores=$this->get_score();	
	//dump($scores);
	$this->assign('user_id',$user_id);	
	$this->assign('my_score',$my_score);
	$this->assign('scores',$scores);	
	$this->display();
	}
	private function get_score(){
		$m_user=D('nokia_user');	
		$users=$m_user->select();
		$scores=array();
		$score=array();
		foreach($users as $user){
			$user_id=$user['user_id'];
			$score=$this->get_personal_score($user_id);		
		}
		$data=$m_user->order('score desc')->select();
		return $data;
	}
	private function get_personal_score($user_id){
		$m_answer=D('nokia_answer');
		$m_user=D('nokia_user');			
		$condition['user_id']=$user_id;
		$condition['is_answer']=1;		
		$right_questions_count=$m_answer->where($condition)->count();
		$score['user_id']=$user_id;
		$user_data=$m_user->where($score)->find();
		$user_data['score']=$right_questions_count;
		$m_user->save($user_data);
		return $user_data;
	}	
	private function save_user_id($user_id){
		$m=D('nokia_user');		
		$condition['user_id']=$user_id;
		$is_user_exit=$m->where($condition)->count();
		if(!$is_user_exit){
			if($user_id){
				$data['user_id']=$user_id;	
				$m->add($data);				
			}

		}

	}		
	
	public function answer(){
	$q_id=I('get.q_id');
	$user_id=I('get.user_id');	
	$m_question=D('nokia_question');	
	$data=$m_question->where("Id=$q_id")->find();
	switch($data['answer']){
		case "A":$data['answer']=$data['answer'].". ".$data['answer_a'];break;
		case "B":$data['answer']=$data['answer'].". ".$data['answer_b'];break;
		case "C":$data['answer']=$data['answer'].". ".$data['answer_c'];break;
		case "D":$data['answer']=$data['answer'].". ".$data['answer_d'];break;
		default:
	}
	
	$this->assign('user_id',$user_id);	
	$this->assign('data',$data);
	$this->display();
	}	
	public function question_deal(){
		$m_question=D('nokia_question');
		$m_answer=D('nokia_answer');
		//$data=$m_answer->create();
		$data['user_id']=I('get.user_id');
		$data['q_id']=I('get.q_id');
		$data['answer']=I('get.answer');
		$user_id=$data['user_id'];
		$q_id=$data['q_id'];
		if($data){
 			$question=$m_question->where("Id=$q_id")->find();		
 			if($question['answer']==$data['answer']){
				$data['is_answer']=1;
			}
			else{
				$data['is_answer']=0;				
			}
			$n=$m_answer->add($data);			
			if($n){
				if($data['is_answer']==1){
					$this->success("Answer is right.",U('answer',array('q_id'=>$q_id,'user_id'=>$user_id)));					
				}
				else{
					$this->error("Answer is wrong.",U('answer',array('q_id'=>$q_id,'user_id'=>$user_id)));											
				}
			}
			else{
			$this->error("fail to add data");				
			}

		}
		else{
			$this->error("fail to find answer");
		}
		
	}
	private function get_a_question(){
		$m=D('nokia_question');
		$q_count=$m->count();
		$q_num=rand(1,$q_count);
		$data=$m->where("Id='$q_num'")->find();
/* 		if($data){
			$result=$data['question']."\n"."A.".$data['answer_a']."\n"."B.".$data['answer_b']."\n"."C.".$data['answer_c']."\n"."D.".$data['answer_d'];			
		}
		else{
			$result="no question";
		} */
/* 		echo($result); */
		return $data;		
	}	
	public function role_ajax(){

		$arr['Id']=1;
		$this->ajaxReturn($arr);	
	}
}
?>