<?php
namespace Home\Controller;
use Think\Controller;
class DatabaseController extends Controller {
	public function index(){
		$this->user();
		$this->club();
		$this->meeting();
	}
	
	public function user(){
	    $m = new \Home\Model\UserModel('user','','DB_CONFIG2');
		$m2=D('user','Api');
		$m2->execute($sql = 'TRUNCATE table `user`');
		$m2->execute($sql = 'TRUNCATE table `club_user`');		
		$club_user=D('club_user','Api');		
		$data=$m->select();
		foreach($data as $item){
			$item2['Id'] = $item['Id'];		
			$item2['user_name'] = $item['user_name'];
			if($item['user_authority']=="tmc_member"){
				$item2['authority'] = "member";	
			}
			elseif($item['user_authority']=="tmc_guest"){
				$item2['authority'] = "guest";				
			}
			
			$item2['english_name'] = $item['dis_name'];			
			$item2['password'] = $item['password'];		
			$item2['phone'] = $item['phone'];	
			$item2['email'] = $item['mail'];		
			$item2['last_login'] = $item['last_login'];	
			$item2['login_times'] = $item['login_times'];	
			$item2['speech_level'] = $item['speech_level'];	
			$user_id=$m2->add($item2);
			$item3['club_id']=$item['club_id'];	
			$item3['user_id']=$user_id;		
			$club_user->add($item3);
		}
		echo("user update is ok<br>");
	}
	public function meeting(){
	    $m = new \Home\Model\UserModel('rolebooking','','DB_CONFIG2');
		$m2=D('meeting','Api');
		$m2->execute($sql = 'TRUNCATE table `meeting`');
		$m2->execute($sql = 'TRUNCATE table `club_meeting`');		
		$m2->execute($sql = 'TRUNCATE table `userspeech`');
		$club_meeting=D('club_meeting','Api');	
		$userspeech=D('userspeech','Api');		
		$data=$m->select();
		foreach($data as $item){
			$item2['num'] = $item['num'];		
			$item2['m_date'] = $item['m_date'];			
			$item2['language'] = $item['language'];			
			$item2['note'] = $item['note'];		
			$item2['toast_id'] = $item['toast_id'];	
			$item2['joke_id'] = $item['joke_id'];		
			$item2['table1_id'] = $item['table1_id'];	
			$item2['table2_id'] = $item['table2_id'];	
			$item2['ge_id'] = $item['ge_id'];
			$item2['gramm_id'] = $item['gramm_id'];
			$item2['timer_id'] = $item['timer_id'];
			$item2['aha_id'] = $item['aha_id'];			
			$m_id=$m2->add($item2);
			$item3['m_id']=$m_id;	
			$item3['club_id']=$item['club_id'];		
			$club_meeting->add($item3);
			
			for($i=1;$i<5;$i++){
				$spk_id='spk'.$i.'_id';
				$ev_id='ev'.$i.'_id';
				$spk_title='spk'.$i.'_title';
				$spk_level='spk'.$i.'_level';
				if($item[$spk_id]!=""||$item[$ev_id]!=""){
					$item4['spk_id']=$item[$spk_id];
					$item4['title']=$item[$spk_title];				
					$item4['ev_id']=$item[$ev_id];
					if(substr($item[$spk_level],0,2)=="CC"){
						$item4['level']=substr($item[$spk_level],2,strlen($item[$spk_level])-2);
					}
					elseif(substr($item[$spk_level],0,2)=="AC"){
						$item4['level']=substr($item[$spk_level],2,strlen($item[$spk_level])-2)+10;
					}					
					$item4['m_id']=$m_id;
					$userspeech->add($item4);			
				}

			}
		}
		echo("meeting update is ok<br>");
	}	
	
	public function club(){
	    $m = new \Home\Model\ClubModel('club','','DB_CONFIG2');
		$m2=D('club','Api');
		$m2->execute($sql = 'TRUNCATE table `club`');	
		//exit;
		$data=$m->select();
		//dump($data);
		//echo("INSERT INTO club (Id,club_name) VALUES (44,'dde')<br>");
		//$m2->execute("INSERT INTO club (Id,club_name) VALUES (44,'dde')");
		foreach($data as $item){
			$item2['club_name']=$item['club_name'];
			$item2['default_template']=$item['default_template'];		
			$item2['first_num']=$item['first_num'];		
			$item2['default_time']=$item['meeting_time'];		
			$item2['default_room']=$item['location'];	
			$item2['president']=$item['president'];	
			$item2['vpe']=$item['vpe'];	
			$item2['vpm']=$item['vpm'];	
			$item2['vppr']=$item['vppr'];	
			$item2['saa']=$item['saa'];	
			$item2['screctary']=$item['screctary'];	
			$item2['treasurer']=$item['treasurer'];	
			$item2['president_a']=$item['president_a'];	
			$item2['vpe_a']=$item['vpe_a'];	
			$item2['vpm_a']=$item['vpm_a'];	
			$item2['vppr_a']=$item['vppr_a'];	
			$item2['saa_a']=$item['saa_a'];	
			$item2['screctary_a']=$item['screctary_a'];	
			$item2['treasurer_a']=$item['treasurer_a'];			
			//$id = $item['id'];		
			//$club_name = $item['club_name'];
			//echo("INSERT INTO club (Id,club_name) VALUES (".$id.",'".$club_name."')<br>");
			//$m2->execute("INSERT INTO club (Id,club_name) VALUES (".$id.",'".$club_name."')");			
			$m2->add($item2);
		}
		echo("club update is ok<br>");

		}
}
?>