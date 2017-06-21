<?php
namespace Admin\Controllers;


use Common\Controllers\BaseController;

class IndexController  extends AdminController
{
    public function indexAction()
    {
        var_dump($this->config);

        //echo  '随意输出';
//        return 'sdfd';//setContent
//        return ['s','asdf'];
//        $a=new \stdClass();
//        $a->a='a';
//        return $a;//1.response对象 直接使用返回 其他对象不处理
//        return true;//使用模板解析结果
//        return false;//不处理原始response


        return $this->actionRender();

    }

}