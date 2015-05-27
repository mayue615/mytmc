<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
	private  $article_item;
	/**
     * @函数	index
     * @功能	显示添加文章主页面
     */
	public function member_all_article(){
		$user_id=cookie('user_id');
		$article=$this->show_user_all_page($user_id);
		$this->assign('article_list',$article['data']);
		$this->assign('page_method_article',$article['show']);						
		$this->display('admin');
	
	}
	public function admin_all_article(){
		$user_id=cookie('user_id');
		$article=$this->show_user_all_page($user_id);
		$this->assign('article_list',$article['data']);
		$this->assign('page_method_article',$article['show']);						
		$this->display('admin');	
	}
	public function superadmin_all_article(){
		$user_id=cookie('user_id');
		$article=$this->show_all_page();
		$this->assign('article_list',$article['data']);
		$this->assign('page_method_article',$article['show']);						
		$this->display('admin');	
	}	
	public function get_user_article($user_id){
		$news=M('article');	
		$arr=$news->where("author='$user_id' AND type='article'")->select();
		return $arr;
	}

	public function get_user_article_id($user_id,$title){
		$news=M('article');	
		$data['author']=$user_id;
		$data['subject']=$title;
		$arr=$news->where($data)->find();
		//dump($user_id);
		//dump($title);		
		//dump($arr);
		if($arr=="")
			return 0;
		else
			return $arr['Id'];
	}
	
	public function show_common_page($page_count,$type,$user_id){
		//$type=all,news,article
		//if user_id=0,all
		if($user_id==0){
			if($type=="all")
				$sql="";			
			else
				$sql="type='$type'";
		}
		else{
			if($type=="all")
				$sql="user_id='$user_id'";			
			else	
			$sql="type='$type' AND user_id='$user_id'";		
		}
		$news=D('article','Api');	
		$count=$news->where($sql)->count();	
		import('ORG.Util.Page');
		$page=new \Page($count,$page_count);
		$page->setConfig('prev', "&laquo; Previous");
		$page->setConfig('next', 'Next &raquo;');
		$page->setConfig('first', '&laquo; First');
		$page->setConfig('last', 'Last &raquo;');
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
		$show=$page->show();
		$arr=$news->relation(true)->where($sql)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		//dump($arr);
		$result['data']=$arr;
		$result['show']=$show;	
		return $result;	
	
	
	}
	public function show_all_page(){
		return $this->show_common_page(12,'all',0);	
	}	
	
	public function show_article_page(){
		return $this->show_common_page(12,'article',0);	
		return $result;
	}
	public function show_manuals_page(){
		return $this->show_common_page(12,'manual',0);	
		return $result;
	}	
	
	public function show_user_all_page($user_id){
		return $this->show_common_page(12,'all',$user_id);	
	}	
	public function show_user_article_page($user_id){
		return $this->show_common_page(12,'article',$user_id);	
	}
	
	public function show_news_page(){
		return $this->show_common_page(5,'news',0);	
	}
	public function get_article($article_id){
		$m=D('article','Api');
		$item=$m->relation(true)->where("Id='$article_id'")->find();
		return $item;
	
	}
	function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->assign('title','myTMC');
		if($id=(int)$_GET['id']){
			$article=D('article','Api');
			$article_item=$article->where("Id=$id")->find();
			$article_item['body']=htmlspecialchars_decode($article_item['body']);	
			$this->assign('article_item',$article_item);			
			$this->assign('btn_ok_text','完成修改');
			$this->assign('btn_ok_act','update');
			
		}else{
			$article_item['type']=I('get.type');
			$this->assign('article_item',$article_item);				
			$this->assign('btn_ok_act','add');
			$this->assign('btn_ok_text','添加文章');
		}



		$this->display();
	}
	
	/**
     * @函数	add
     * @功能	文章添加完成，写入数据库
     */
	function add(){
		//echo("test");
		header("Content-Type:text/html; charset=utf-8");
		$club_id = cookie('club_id');		
		$user_id = cookie('user_id');
		$type=I('post.type');
		$article=D('article');		
		$data['body']	=htmlspecialchars(stripslashes($_POST['body']));
		$data['title']		=I('post.title');		
		$data['user_id']		=$user_id;
		$data['create_time']	=date("Y-m-d H:i:s");	
		if($type=="article"){
			$data['type']="article";
		}
		else{
			$data['type']="news";
		}
		$article_id=$article->add($data);
		if($article_id>0){
			$this->success('文章添加成功',U('Index/article',array('article_id'=>$article_id)));			
		}else{
			$this->error('文章添加失败');
		}

	}
	
	/**
     * @函数	delete
     * @功能	删除文章
     */
	function delete(){		
    	$article=M('article');
		if($article->delete($_GET['id'])){
			$this->success('文章删除成功');
		}else{
			$this->error($article->getLastSql());
		}
	}
	
	/**
     * @函数	edit
     * @功能	编辑文章
     */
	function edit(){
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			redirect(U('/Article/index/id/'.$_GET['id']),0, '编辑文章');
		}
	}
	public function ueditor(){
		$data = new \Org\Util\Ueditor();
		echo $data->output();
	}	
	
	/**
     * @函数	update
     * @功能	更新修改后的文章到数据库
     */
	public function update(){
		
		header("Content-Type:text/html; charset=utf-8");	
		$article=D('article','Api');		
		$data=$article->create();
		$data['last_modify']=date("Y-m-d H:i:s");
		//$data['body']=htmlspecialchars(stripslashes($_POST['body']));
		//dump($data);	
		$article_id=$data['Id'];
		$article->save($data); // 根据条件保存修改的数据
		$this->success("Article update successfully!",U('Index/article',array('article_id'=>$article_id)));
	}
	

}
?>