<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	public function wish(){
		$wish = M('wish')->select();
		$this->assign('wish',$wish)->display();		
	}
	
	Public function handle(){
		if (!IS_AJAX) 	halt('页面不存在');
		$data = array (
			'username' => I('username'),
			'content' => I('content'),
			'time' => time()
		);
		
		if ($id = M('wish')->data($data)->add()){
			$data['id'] = $id;
			$data['content'] = replace_phiz($data['content']);
			$data['time'] = date('y-m-d', $data['time']);
			$data['status'] = 1;
			$this->ajaxReturn($data,'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}
	}
	
    public function index(){
		$article1=new ArticleController();
		$article=$article1->show_article_page();
		$this->assign('article_list',$article['data']);
		$this->assign('page_method_article',$article['show']);	
		$news=$article1->show_news_page();
		$this->assign('news_list',$news['data']);
		$this->assign('page_method_news',$news['show']);		
		$manuals=$article1->show_manuals_page();
		$this->assign('manuals_list',$manuals['data']);
		$this->assign('page_method_manuals',$manuals['show']);		
		$donation=$this->show_donation_page();
		$this->assign('donation_list',$donation['data']);
		$this->assign('page_method_donation',$donation['show']);		
		$this->display('homepage');	
    }
	public function article(){
		$article_id=I('get.article_id');
		$article1=new ArticleController();
		$article=$article1->get_article($article_id);
		$article['body']=htmlspecialchars_decode($article['body']);
		$this->assign('article',$article);
		$this->display('article');	
	}	
	public function single_article($article_id){
		$article1=new ArticleController();
		$article=$article1->get_article($article_id);
		$article['body']=htmlspecialchars_decode($article['body']);
		$this->assign('article',$article);
		$this->display('article');	
	}	
	
	public function timecard(){
	
		$this->display('timercard');
	
	}
    public function agenda_show($club_id){
		$club=D('club','Api');
		$m_id=$club->get_next_meetings_id($club_id);		
		$agenda1=new AgendaController();
		$template_id=$agenda1->get_defalut_template($club_id);
		//echo($template_id);
		//exit;
		$arr=$agenda1->agenda1($club_id,$m_id,$template_id);
		$table=$arr['table'];
		$time_range=$arr['time_range'];
		$club_info=$club->get_club_info($club_id);
		$meeting=D('meeting','Api');
		$meeting_info=$meeting->get_meeting_info($m_id);
 		if($meeting_info['num']%10==1){
			$meeting_info['num']=$meeting_info['num']."st";
		}
		elseif($meeting_info['num']%10==2){
			$meeting_info['num']=$meeting_info['num']."nd";
		}
		else{
			$meeting_info['num']=$meeting_info['num']."th";
		}
		$meeting_info['time_range']=$time_range;
		$qr1=new QRController();
		$qr_pic=$club_id;		
		$qr1->test_pic_tmc_meeting($club_id);		
		
		$this->assign('qr_pic',$qr_pic);
		$this->assign('table',$table);
		$this->assign('club_info',$club_info);
		$this->assign('meeting_info',$meeting_info);
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