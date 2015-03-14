<?php
namespace Home\Controller;
use Think\Controller;
import('ORG.Util.wechat');
class WechatController extends Controller {

	public function wechat(){
/*
 *	微信公众平台PHP-SDK, 官方API部分
 *  @author  dodge <dodgepudding@gmail.com>
 *  @link https://github.com/dodgepudding/wechat-php-sdk
 *  @version 1.2
 *  usage:*/
    $options = array(
 			'token'=>'weixin', //填写你设定的key
 			'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
 			'appid'=>'wxdk1234567890', //填写高级调用功能的app id
 			'appsecret'=>'xxxxxxxxxxxxxxxxxxx' //填写高级调用功能的密钥
 		);
 	 $weObj = new \Wechat($options);
    $weObj->valid();
    $type = $weObj->getRev()->getRevType();
    switch($type) {
    		case \Wechat::MSGTYPE_TEXT:
				$command = $weObj->getRevContent();
				$command=strtolower($command);
				$result=$this->command_deal($command);
				if(is_array($result)){
					$weObj->news($result)->reply();					
				}
				else{
					$weObj->text($result)->reply();
				}
    			exit;
    			break;
    		case \Wechat::MSGTYPE_EVENT:
    			;
    			break;
    		case \Wechat::MSGTYPE_IMAGE:
    			;
    			break;
    		default:
    			$weObj->text("help info")->reply();
    }
 /*
    //获取菜单操作:
    $menu = $weObj->getMenu();
    //设置菜单
    $newmenu =  array(
    		"button"=>
    			array(
    				array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
    				array('type'=>'view','name'=>'我要搜索','url'=>'http://www.baidu.com'),
    				)
   		);
    $result = $weObj->createMenu($newmenu);*/

	}
	//UT test
	public function test(){
		$this->ut_test("aa");
		$this->ut_test("tmc");
		$this->ut_test("rock");		
		$this->ut_test("1");
		$this->ut_test("mytmc");

	}
	public function ut_test($command){
		$result=$this->command_deal($command);
		dump($result);	
	}
	public function command_deal($command){
		if($command=="rock"||$command=="xforce"||$command=="palm"){
			$result=$this->team_reply($command);
		}
		else if($command=="tmc"){
			$result=$this->tmc_reply();
		}
		else if(is_numeric($command)){
			$result=$this->tmc_number_reply($command);
		}
		else if($command=="mytmc"){
			$result=$this->mytmc_reply();
		}		
		else{
			$result="Welcome to visit www.mytmc.cn";
		}
		return $result;
	}
	private function team_reply($team_name){

		$m=M('nokia_tel');
		$condition['team']=$team_name;
		$arr=$m->where($condition)->select();
		$result="";
		foreach($arr as $item){
			$result=$result.$item['name'].":".$item['tel']."\n";
		}
		return $result;
	}
	private function tmc_reply(){

		$club1=new ClubController();
		$arr=$club1->get_all_clubs_info();
		$result="";
		foreach($arr as $item){
			$result=$result.$item['Id'].":".$item['club_name']."\n";
		}
		return $result;		
	}
	private function mytmc_reply(){
	/**
	 * 设置回复图文
	 * @param array $newsData
	  数组结构:*/
	   $result=array(
	   	"0"=>array(
	   		'Title'=>'myTMC',
	   		'Description'=>'1',
	   		'PicUrl'=>'http://www.mytmc.cn/Public/img/wechat/web.png',
	   		'Url'=>'http://www.mytmc.cn'
	   	),
	   	"1"=>array(
	   		'Title'=>'time card',
	   		'Description'=>'2',
	   		'PicUrl'=>'http://www.mytmc.cn/Public/img/wechat/time.jpg',
	   		'Url'=>'http://www.mytmc.cn/index.php/Home/Index/timecard.html'
	   	),
	   	"2"=>array(
	   		'Title'=>'book role',
	   		'Description'=>'3',
	   		'PicUrl'=>'http://www.mytmc.cn/Public/img/wechat/speech.jpg',
	   		'Url'=>'http://www.mytmc.cn/index.php/Home/Login/login.html'
	   	)	
		
	   	//"1"=>....
	   );
	 return $result;
	 
	}	
	
	private function tmc_number_reply($club_id){
		$club1=new ClubController();
		$arr=$club1->get_user_info($club_id);
		$result="";
		foreach($arr as $item){
			$result=$result.$item['dis_name'].":".$item['phone']."\n";
		}
		return $result;			
	}	
}
?>