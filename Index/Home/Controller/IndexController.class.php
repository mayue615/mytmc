<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->display('homepage');

    }
	public function timecard(){
	
		$this->display('timercard');
	
	}
    public function agenda_show($club_id){
/* 		$club=D('club','Api');
		$m_id=$club->get_next_meetings_id($club_id);
		$meeting=D('Meeting','Api');
		$data=$meeting->get_visual_meeting_table($m_id);	 */
		//dump($data);
		
/*  		$dictionary1=new DictionaryController();
		$club_id2name_dict=$dictionary1->club_id2name_dict($club_id);
		$club1=new ClubController();
		$meeting_time=$club1->get_meeting_time($club_id);
		$room1=new RoomController();
		$m_date=$club1->get_latest_date($club_id);
		$meeting_room=$room1->get_meeting_room($club_id,$m_date);
		$meeting_num=$club1->get_latest_meeting_num($club_id);
		$qr1=new QRController();
		$qr_pic=$club_id."_".$m_date;		
		$qr1->test_pic_tmc_meeting($club_id,$m_date);

 		if($meeting_num%10==1){
			$i=$meeting_num."st";
		}
		elseif($meeting_num%10==2){
			$i=$meeting_num."nd";
		}
		else{
			$i=$meeting_num."th";
		}
		$meeting_time=$m_date." ".$meeting_time;

		$officer=$club1->get_club_officer($club_id);
		$officer_a=$club1->get_club_officer_a($club_id);*/		
		$agenda1=new AgendaController();
		//$template_id=$agenda1->get_defalut_template($club_id);
		//echo($template_id);
		//exit;
		$table=$agenda1->agenda1($club_id,$m_id,1);
		//dump($table);
		//exit;
		$this->assign('qr_pic',$qr_pic);
		$this->assign('table',$table);
		$this->assign('officer',$officer);
		$this->assign('officer_a',$officer_a);		
		$this->assign('clubname',$club_id2name_dict[$club_id]);
		$this->assign('meeting_num',$i);
		$this->assign('meeting_room',$meeting_room);
		$this->assign('meeting_time',$meeting_time);
		$this->display('Index/agenda'); 
	}	
	
	public function show_donation_page(){

		//实例化文章模型
		$news=M('donation');	
		$count=$news->count();	
		//分页显示文章列表，每页8篇文章
		import('ORG.Util.Page');
		$page=new \Page($count,6);//后台管理页面默认一页显示8条文章记录	
		$page->setConfig('prev', "&laquo; Previous");//上一页
		$page->setConfig('next', 'Next &raquo;');//下一页
		$page->setConfig('first', '&laquo; First');//第一页
		$page->setConfig('last', 'Last &raquo;');//最后一页	
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
		//设置分页回调方法
		$show=$page->show();
		$arr=$news->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();			
		$result['data']=$arr;
		$result['show']=$show;	
		return $result;
	}
	
	
	public function ut(){
        $user=D('user','Api');
		$user->ut();	
        $club=D('club','Api');
		$club->ut();	

	}
}