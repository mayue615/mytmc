<?php
return array(
	//'配置项'=>'配置值'
 'DB_TYPE'	 =>	'mysql',
 'DB_HOST'	 =>	'localhost',
 'DB_NAME'	 =>	'mytmc3',//'rubydb',//需要新建一个数据库！名字叫
 'DB_USER'	 =>	'root',	 //数据库用户名 
 'DB_PWD'	 =>	'root',//数据库登录密码
 'DB_PORT'	 =>	'3306',
 'DB_PREFIX'	 =>	'',//'think_',//数据库表名前缀
 'TMPL_TEMPLATE_SUFFIX' => '.html', // 默认模板文件后缀 
 //'SHOW_PAGE_TRACE'=>'true',
 'URL_MODEL'             =>  1,  // URL访问模式,可选参数0、1、2、3,代表以下四种模式:0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
 'DB_PARAMS'    =>    array(\PDO::ATTR_CASE=>  \PDO::CASE_NATURAL),
	// 配置邮件发送服务器
	'MAIL_HOST' =>'SMTP.qq.com',//smtp服务器的名称
	//'MAIL_PORT'   => '465', //SMTP服务器端口
	'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
	'MAIL_USERNAME' =>'mayue615@qq.com',//你的邮箱名
	'MAIL_FROM' =>'mayue615@qq.com',//发件人地址
	'MAIL_FROMNAME'=>'mytmc',//发件人姓名
	'MAIL_PASSWORD' =>'123zjuZJU',//邮箱密码
	'MAIL_CHARSET' =>'utf-8',//设置邮件编码
	'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件 */
);

 ?>