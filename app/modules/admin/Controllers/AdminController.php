<?php

namespace Admin\Controllers;

use Common\Controllers\BaseController;
use Common\Models\WeUser;
use Common\Services\CommonService;
use Common\Services\UserService;

class AdminController extends BaseController
{
    /*admin项目相关业务*/
    public $adminInfo = [];
    public $adminId = 0;
    /**
     * @var $sessionService  UserService;
     */
    public $userService;
    /**
     * @var $commonService  CommonService;
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
        $this->userService = $this->di->getShared(UserService::class);
        $this->commonService = $this->di->getShared(CommonService::class);
        $this->view->action = $this->action = $this->dispatcher->getActionName();
        $this->view->controller = $this->controller = $this->dispatcher->getControllerName();
        $this->view->baseUri = $this->baseUri = $this->config->application->baseUri;
        $this->assetsManager();//启动资源管理
        $this->addTitle('管理后台');
        $this->addProjectTitle('XXX管理中心');
        $this->checkLogin();
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
                if ($this->request->isAjax() && $this->request->get('dataType', 'string', '') !== 'html') {
                    $this->sendJson('error', '请登录后再试！', [], [], $goUrl);
                } else {
                    $this->response->redirect($goUrl);
                }
                die();
            }
        }
    }
}