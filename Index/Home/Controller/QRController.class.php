<?php
namespace Home\Controller;
use Think\Controller;
//include(realpath('D:\www\mytmc\ThinkPHP\Extend\Vendor\phpqrcode\phpqrcode.php'));
//include('__ROOT__/ThinkPHP/Extend/Vendor/phpqrcode/phpqrcode.php');
class QRController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		$this->display('homepage');
	}
	public function article(){
	
		$this->display('article');
	
	}
	public function show(){
	$value="http://www.csdn.net";

    $errorCorrectionLevel = "L";

	$matrixPointSize = "4";

	QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize);

		//$urlToEncode="www.mytmc.cn/Home/Luckydraw/checkin";
		//$this->generateQRfromGoogle($urlToEncode);

	}
	public function test(){
	    $act_id=I('get.act_id');
		//echo($act_id);
		//exit;
		vendor('phpqrcode.phpqrcode');
		$QRcode = new \QRcode();
		
		$data = 'http://www.mytmc.cn/index.php/Home/Luckydraw/checkin/act_id/'.$act_id;
		//echo($data);
		//exit;
		// 纠错级别：L、M、Q、H
		$level = 'L';
		// 点的大小：1到10,用于手机端4就可以了
		$size = 4;
		// 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
		//$path = "images/";
		// 生成的文件名
		$fileName = $path.$size.'.png';
		$QRcode->png($data, false, $level, $size);
		//$QRcode->png($data,$fileName,$level,$size);
	
	}
	// used for tmc regular meeting
	public function test_pic_tmc_meeting($club_id,$m_date,$m_id){
	    //$act_id=I('get.act_id');
		//echo($act_id);
		//exit;
		vendor('phpqrcode.phpqrcode');
		$QRcode = new \QRcode();
		$activity_id=$club_id.'_'.$m_date;
		$data = 'http://www.mytmc.cn/index.php/Home/Checkin/feature_page/club_id/'.$club_id.'/m_date/'.$m_date.'/m_id/'.$m_id;
		//echo($data);
		//exit;
		// 纠错级别：L、M、Q、H
		$level = 'L';
		// 点的大小：1到10,用于手机端4就可以了
		$size = 4;
		// 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
		$path = "images/";
		// 生成的文件名
		//$fileName = $path.$size.'.png';
		$fileName="temp/qrpic/".$activity_id.".png";
		//$QRcode->png($data, false, $level, $size);
		$QRcode->png($data,$fileName,$level,$size);
	
	}	
	public function test_pic($activity_id){
	    //$act_id=I('get.act_id');
		//echo($act_id);
		//exit;
		vendor('phpqrcode.phpqrcode');
		$QRcode = new \QRcode();
		
		$data = 'http://www.mytmc.cn/index.php/Home/Luckydraw/checkin/act_id/'.$activity_id;
		//echo($data);
		//exit;
		// 纠错级别：L、M、Q、H
		$level = 'L';
		// 点的大小：1到10,用于手机端4就可以了
		$size = 4;
		// 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
		$path = "images/";
		// 生成的文件名
		//$fileName = $path.$size.'.png';
		$fileName="temp/qrpic/activity_".$activity_id.".png";
		//$QRcode->png($data, false, $level, $size);
		$QRcode->png($data,$fileName,$level,$size);
	
	}	
	
	public function generateQRfromGoogle($chl,$widhtHeight ='150',$EC_level='L',$margin='0')
	{
	 $url = urlencode($url); 
	 echo '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl.'" alt="QR code" widhtHeight="'.$size.'" widhtHeight="'.$size.'"/>';
	}	
	
/**
 * 生成二维码
 * @param  $sid 记录id
 * @param  $data 生成二维码数据
 * @param  $picPath 存放二维码文件目录
 * @param  $prefix 图片文件前缀
 * @param  $logo 添加水印图片
 * @author eagle
 * @return string 字符串的文件名字
 */
function createQRC($sid="",$data="",$picPath="",$prefix="",$logo="Images/logo_ico.png"){
  
         include("__ROOT__/phpqrcode/phpqrcode.php");
        
        $QRcode = new QRcode();

    $data = $data?$data:'二维码生成有误，联系管理员处理!';
    
    // 纠错级别：L、M、Q、H
    $level = 'L';
    
    // 点的大小：1到10,用于手机端4就可以了
    $size = 4;
    
    // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
    $path = $picPath?$picPath:PUBLIC_PATH."Uploads/QrcPic/";
  
    // 生成的文件名
    $fileName =$prefix.$sid.'.png';
    
    //判断文件是否存在，存在返回二维码图片名字
    $checkFile = $path.$fileName;
    
    if(file_exists($checkFile)){
            return $fileName;
            exit;
    } 
    // 输出图处流
        //QRcode::png($data, false, $level, $size);

        // 生成图片
        $QRCimg= $QRcode->png($data,$path.$fileName,$level,$size);

        return $fileName;
        //显示出来
        //echo "<img src='http://erp/Public/Uploads/QrcPic/".$fileName."' />";
         
}
}
?>