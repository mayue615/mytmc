<?php
namespace Home\Controller;
use Think\Controller;
class LuckydrawController extends Controller {
	public function common_para(){
		$club_id=I('get.club_id');
		$m_id=I('get.m_id');		
		$this->assign('club_id',$club_id);	
		$this->assign('m_id',$m_id);		
	}
	public function index()
	{
		$this->common_para();	
		$club_id=I('get.club_id');
		$m_id=I('get.m_id');				 
		$luckydraw_range="Guest";	
		$m=M('guestcheckin');
		if($luckydraw_range=="Member"){	

		}
 		elseif($luckydraw_range=="Guest"){	
			$arr=$m->where("m_id='$m_id'")->select();
		}
		else{

		}
		$str="";
		foreach($arr as $item){
			$str=$str.$item['english_name']."(".$item['phone'].")".",";
		}
		$str=rtrim($str, ",");
		$activity_name="Luckydraw";
		$this->assign('draw_data',$str);
		$this->assign('activity_name',$activity_name);
		$this->display('Luckydraw');
	}	

}
?>