<?php
/**
 * Created by PhpStorm.
 * User: 佳祥
 * Date: 2015-1-22
 * Time: 17:01
 */

namespace Home\Controller;
class IndexController extends \Think\Controller{
    public function index(){
        $data = D('User') -> lists();
        $this -> assign('data',$data);
        $this -> display();
    }
}