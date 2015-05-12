<?php
namespace Home\Controller;
use Think\Controller;

class QuestionController extends Controller {
	
	public function question(){
	//$current_date=date('Y-m-d H:i:s',mktime(16,5,0,5,12,2015));
	$current_date=date('Y-m-d H:i:s',time());
	$start_date=date('Y-m-d H:i:s',mktime(12,0,0,5,12,2015));
	$end_date=date('Y-m-d H:i:s',mktime(16,0,0,5,12,2015));	
	if($current_date<$start_date){
		$this->display('question_not_start');		
	}
	else if($current_date>$end_date){
		$this->display('question_end');			
	}	
	else{
		$user_id=I('get.user_id');		
		$this->save_user_id($user_id);	
		$data=$this->get_a_question($user_id);
		$this->assign('user_id',$user_id);	
		if($data==false){
			$delay_time=rand(1,5);
			sleep($delay_time);
			$data=$this->get_a_question($user_id);	
			if($data==false){
				$this->display('question_finish');			
			}
			else{
				$this->assign('data',$data);
				$this->display();				
				
			}

		}
		else{
			$this->assign('data',$data);
			$this->display();		
		}	
	}

	}	
	public function score(){

	//dump($data);
	$user_id=I('get.user_id');
	$this->save_user_id($user_id);		
	$my_score=$this->get_personal_score($user_id);
	$scores=$this->get_score();	
	//dump($scores);
	//dump($my_score);
	$i=0;
	foreach($scores as &$score){
		$i++;	
		$score['ranking']=$i;
/* 		if($score['Id']==$my_score['Id']){
			$ranking=$i;
			break;
		} */
	
	}
	if(sizeof($scores)>=30){
		$scores1=array_slice($scores,0,30);
	}
	else{
		$scores1=$scores;
	}
	$this->assign('ranking',$ranking);	
	$this->assign('user_id',$user_id);	
	$this->assign('my_score',$my_score);
	$this->assign('scores',$scores1);	
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
		$data=$m_user->order('score desc,time')->select();
		return $data;
	}
	private function set_personal_time($user_id){
		$m_user=D('nokia_user');			
		$condition['user_id']=$user_id;
		$user_data=$m_user->where($condition)->find();
		$user_data['time']=date('Y-m-d H:i:s',time());
		$m_user->save($user_data);
		return $user_data;
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
				$ss=$this->get_rand_question_sequence();
				$data['user_id']=$user_id;	
				$data['q_sequence']=$ss;
				$data['time']=date('Y-m-d H:i:s',time());				
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
			$condition['user_id']=$data['user_id'];
			$condition['q_id']=$data['q_id'];
 			$answer=$m_answer->where($condition)->find();
			if(!$answer){
				$n=$m_answer->add($data);			
				if($n){
					if($data['is_answer']==1){
						$this->set_personal_time($user_id);						
						$this->success("Answer is right.",U('answer',array('q_id'=>$q_id,'user_id'=>$user_id)));					
					}
					else{
						$this->error("Answer is wrong.",U('answer',array('q_id'=>$q_id,'user_id'=>$user_id)),1);											
					}
				}
				else{
					$this->error("fail to add data");				
				}				
				
			}
			else{
					$this->error("You have answered this question. Don't double click button. Don't use browser back function.It doesn't work.",U('answer',array('q_id'=>$q_id,'user_id'=>$user_id)));
			}


		}
		else{
			$this->error("fail to find answer",U('answer',array('q_id'=>$q_id,'user_id'=>$user_id)));
		}
		
	}
	private function get_rand_question_sequence(){
		$m=D('nokia_question');	
		$q_count=$m->count();
		$str_sequence="";
		$numbers=range(1,$q_count);
		shuffle($numbers);	
		$str_sequence=implode(",",$numbers);
		return $str_sequence;
	}
	private function get_a_question($user_id){
		$m_user=D('nokia_user');
		$condition['user_id']=$user_id;
		$data=$m_user->where($condition)->find();
		$sequence=$data['q_sequence'];
		if($sequence==""){
				return false;				
		}
		else{
			$array_sequence=explode(",",$sequence);
			$q_num=$array_sequence[0];
			array_shift($array_sequence);
			$sequence=implode(",",$array_sequence);
			$data['q_sequence']=$sequence;
			$m_user->save($data);
			$m=D('nokia_question');
			$data=$m->where("Id='$q_num'")->find();
			return $data;			
		}
		
	}	
	private function get_a_question2(){
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