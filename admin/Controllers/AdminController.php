<?php

namespace Admin\Controllers;

use Admin\Exception\UserNotLoginException;
use Common\Controllers\BaseController;
use Common\Repository\CommonRepository;
use Common\Repository\UserRepository;
use Common\Traits\ViewAction;

class AdminController extends BaseController
{
    /*admin项目相关业务*/
    public $adminInfo = [];
    public $adminId = 0;
    /**
     * @var $sessionService  UserRepository;
     */
    public $userService;
    /**
     * @var $commonService  CommonRepository;
     */
    public $commonService;

    public $noCheckLogin = [
        'Login::index',
        'Login::Login',
        'Login::loginOut',
        'Logon::verify'
    ];

    public function initialize()
    {
        $this->userService = $this->di->getShared(UserRepository::class);
        $this->commonService = $this->di->getShared(CommonRepository::class);
        $this->view->action = $this->action = $this->dispatcher->getActionName();
        $this->view->controller = $this->controller = $this->dispatcher->getControllerName();
        $this->view->baseUrl = $this->config->application->domain . $this->config->application->baseUri;
        $this->view->assetUri = $this->assetUri = $this->config->application->assetUri;
        $this->checkLogin();
        $this->addTitle('管理后台');
        $this->addProjectTitle('XXX管理中心');
    }

    public function beforeExecuteRoute()
    {

        //if ($this->request->isPost()) {
//            if ($this->security->checkToken()) {
//            }
        //}
    }

    /**
     * 检查登录
     */
    protected function checkLogin()
    {
        $checkName = ucfirst($this->controller) . '::' . $this->action;
        if (!in_array($checkName, $this->noCheckLogin)) {
            $this->userService->setAdminInfo(['id' => 123123, 'name' => '张思']);
            $this->adminInfo = $this->userService->getAdminInfo();
            $this->adminId = isset($this->adminInfo['id']) ? $this->adminInfo['id'] : 0;
            if (empty($this->adminInfo) || empty($this->adminId)) {//没有登录去登陆
                $goUrl = 'admin/login';
                $this->commonService->setLoginFromUrl($goUrl);
                throw new \Common\Exception\UserNotLoginException('需要登录');
            }
        }
    }


    public function notFoundAction()
    {
        return parent::notFoundAction();

    }
}