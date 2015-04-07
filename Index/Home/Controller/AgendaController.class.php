<?php
namespace Home\Controller;
use Think\Controller;
class AgendaController extends Controller {

	public function get_defalut_template($club_id){
		$m=D('club','Api');
		$arr=$m->where("Id='$club_id'")->find();
		$default_template=$arr['default_template'];
		return $default_template;
	}
	public function get_all_template(){
		$m=M('agenda');
		$arr=$m->select();
		return $arr;
	}
	
    public function agenda1($club_id,$m_id,$template_id){
		//dump($m_id);
		//dump($template_id);
		$club=D('club','Api');
		$meeting=D('Meeting','Api');
		$meeting_info=$meeting->get_visual_meeting_table($m_id);		
		$meeting_time=$club->get_meeting_time($club_id);
		$arr_time=explode("~",$meeting_time);
		$start_time=$meeting_info['time'];
		if($start_time==""){
			$start_time=$arr_time[0];
		}
		$m=M('agenda');
		$data=array();
		$arr=$m->where("Id='$template_id'")->find();//assign template number
		$start_time_session=$start_time;
		$speaker_num=0;
		if($arr['prepare']!=0){
			$temp['time']=$start_time;
			$temp['role']="ALL";
			$temp['action']="Arrival and preparing the room";
			$temp['member']="ALL";
			$temp['duration']=$arr['prepare'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time,$arr['prepare']);
		}
		if($arr['SAA']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="SAA";
			$temp['action']="Introduce guests";
			$temp['member']="SAA";
			$temp['duration']=$arr['SAA'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['SAA']);
		} 		
		if($arr['toastmaster_intro']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Toastmaster";
			$temp['action']="Welcome speech and inroduce guests";
			if($meeting_info['toast_id']!=null){	
				$temp['member']=$meeting_info['toast_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['toastmaster_intro'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['toastmaster_intro']);
		}
 				
		if($arr['jokemaster']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Jokemaster";
			$temp['action']="Warm up";
			if($meeting_info['joke_id']!=null){	
				$temp['member']=$meeting_info['joke_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['jokemaster'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['jokemaster']);			
		}		
		if($arr['ge_intro']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="General Evaluator";
			$temp['action']="Introduce the Evaluation Team";
			if($meeting_info['ge_id']!=null){	
				$temp['member']=$meeting_info['ge_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['ge_intro'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['ge_intro']);			
		}	
		if($arr['timer_intro']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Timer";
			$temp['action']="Introduce the responsibility of timer";
			if($meeting_info['timer_id']!=null){	
				$temp['member']=$meeting_info['timer_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['timer_intro'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['timer_intro']);			
		}
		if($arr['grammarian_intro']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Grammarian";
			$temp['action']="Introduce the responsibility of Grammarian";
			if($meeting_info['gramm_id']!=null){	
				$temp['member']=$meeting_info['gramm_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['timer_intro'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['timer_intro']);			
		}
		if($arr['aha_intro']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Aha Counter";
			$temp['action']="Introduce the responsibility of Ah Counter";
			if($meeting_info['aha_id']!=null){	
				$temp['member']=$meeting_info['aha_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['timer_intro'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['timer_intro']);			
		}		
		//begin speech session
		$userspeech=D('userspeech','Api');
		$speeches=$userspeech->get_meeting_speech($m_id);
		$spk_index=0;
		foreach($speeches as $speech){
			$spk_index += 1;		
			$temp['member']=$speech['spk_name'];
			$temp['time']=$start_time_session;
			$temp['role']="Speaker#".$spk_index;
			$temp['action']=$speech['speech_level'].":".$speech['title'];
			$temp['duration']=$speech['min_time'].":".$speech['max_time'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$speech['max_time']);	
			if($arr['speaker_qa']!=0){
				$temp['member']=$speech['spk_name'];	
				$temp['time']=$start_time_session;
				$temp['role']="Speaker#".$spk_index;
				$temp['action']="QA";
				$temp['duration']=$arr['speaker_qa'];
				array_push($data,$temp);
				$start_time_session=$this->clac_time($start_time_session,$arr['speaker_qa']);
			}			
		}
		if($spk_index>0){

			if($arr['sum_qa']!=0){	
				$temp['member']="ALL Speakers";	
				$temp['time']=$start_time_session;
				$temp['role']="ALL Speakers";
				$temp['action']="QA";
				$temp['duration']=$arr['sum_qa'];
				array_push($data,$temp);
				$start_time_session=$this->clac_time($start_time_session,$arr['sum_qa']);									
			}
		}		

		if($arr['break']!=0){	
			$temp['member']="ALL";	
			$temp['time']=$start_time_session;
			$temp['role']="ALL";
			$temp['action']="Break";
			$temp['duration']=$arr['break'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['break']);									
		}	
		if($arr['sharing']!=0){	
			$temp['member']="#";	
			$temp['time']=$start_time_session;
			$temp['role']="Sharer";
			$temp['action']="Sharing";
			$temp['duration']=$arr['sharing'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['sharing']);									
		}		
		//table topic session
		if($arr['table']!=0){
			if($meeting_info['table1_id']!=null){
				$temp['time']=$start_time_session;
				$temp['role']="Table Topic master";
				$temp['action']="Table Topic session";
				if($meeting_info['table1_id']!=""){	
					$temp['member']=$meeting_info['table1_id'];
				}
				else{
					$temp['member']="";
				}
				$temp['duration']=$arr['table'];
				array_push($data,$temp);
				$start_time_session=$this->clac_time($start_time_session,$arr['table']);
			}
		}
		if($arr['table2']!=0){
			if($meeting_info['table2_id']!=null){		
				$temp['time']=$start_time_session;
				$temp['role']="Table Topic master#2";
				$temp['action']="Table Topic session#2";
				if($meeting_info['table2_id']!=null){	
					$temp['member']=$meeting_info['table2_id'];
				}
				else{
					$temp['member']="";
				}
				$temp['duration']=$arr['table2'];
				array_push($data,$temp);
				$start_time_session=$this->clac_time($start_time_session,$arr['table2']);	
			}
		}
		$spk_index=0;
		foreach($speeches as $speech){
			$spk_index += 1;		
			$temp['member']=$speech['ev_name'];
			$temp['time']=$start_time_session;
			$temp['role']="Evaluator#".$spk_index;
			$temp['action']="Evaluation for Speaker#".$spk_index;
			$temp['duration']=$arr['evaluator'];
			//dump($temp);
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['evaluator']);			
		}		
        //begin evaluation report
		
		if($arr['timer_report']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Timer";
			$temp['action']="Timer report";
			if($meeting_info['timer_id']!=null){	
				$temp['member']=$meeting_info['timer_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['timer_report'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['timer_report']);			
		}
		if($arr['grammarian_report']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Grammarian";
			$temp['action']="Grammarian report";
			if($meeting_info['gramm_id']!=null){	
				$temp['member']=$meeting_info['gramm_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['grammarian_report'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['grammarian_report']);			
		}
		if($arr['aha_report']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Aha Counter";
			$temp['action']="Ah Counter report";
			if($meeting_info['aha_id']!=null){	
				$temp['member']=$meeting_info['aha_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['aha_report'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['aha_report']);			
		}				
		if($arr['ge_report']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="General Evaluator";
			$temp['action']="Summary report";
			if($meeting_info['ge_id']!=null){	
				$temp['member']=$meeting_info['ge_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['ge_report'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['ge_report']);			
		}
		if($arr['toastmaster_end']!=0){
			$temp['time']=$start_time_session;
			$temp['role']="Toastmaster";
			$temp['action']="Close speech and comments time";
			if($meeting_info['toast_id']!=null){	
				$temp['member']=$meeting_info['toast_id'];
			}
			else{
				$temp['member']="";
			}
			$temp['duration']=$arr['toastmaster_end'];
			array_push($data,$temp);
			$start_time_session=$this->clac_time($start_time_session,$arr['toastmaster_end']);			
		}
		$arr['table']=$data;
		$arr['time_range']=$start_time."~".$start_time_session;


		
		return $arr;
		//$start_time=strstr($meeting_time,'~');

	}
	public function clac_time($start_time,$period){
		$arr=explode(":",$start_time);
		$hour=intval($arr[0]);
		$min=intval($arr[1]);
		//echo($hour.";".$min);
		$min=$min+$period;
		$end_time="";
		if($min>=70){
			$hour=$hour+1;
			$min=$min-60;
			$end_time=$hour.":".$min;
		}
		elseif($min>=60){
			$hour=$hour+1;
			$min=$min-60;
			$end_time=$hour.":0".$min;		
		}
		elseif($min>=10){
			//$hour=$hour;
			//$min=$min-60;
			$end_time=$hour.":".$min;		
		}	
		else{
			//$hour=$hour;
			//$min=$min-60;
			$end_time=$hour.":0".$min;		
		}
		return $end_time;		
	}
	public function add(){
	   echo "add an agenda";
	}
	public function delete(){
	   echo "delete a user";
	}
	public function modify(){
		echo "modify an agenda";
	}
	public function get_one_agenda($agenda_id){
		$m=M('agenda');
		$condition['Id']=$agenda_id;
		$arr=$m->where($condition)->find();
		return $arr;
	}
	public function get_one_agenda_page($agenda_id){
		$arr=$this->get_one_agenda($agenda_id);
		$result=array();
		foreach($arr as $key=>$item){
			$temp['key']=$key;
			$temp['value']=$item;
			array_push($result,$temp);
		}
		return $result;
	}
	public function get_all_agendas(){
		$m=M('agenda');
		$result=$m->select();
		return $result;
	}
	public function get_all_agendas_id(){
		$m=M('agenda');
		$result=$m->field("Id")->select();
		return $result;
	}	
}
?>