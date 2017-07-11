<?php
/**
 * 和模板相关的controller方法
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-11
 * Time: 10:37
 */

namespace Common\Traits;
use Phalcon\Mvc\View;


Trait  ViewAction
{
    use BaseTrait;
    /*视图模板相关begin*/

    /**
     * 向模板添加一条数据
     * @param string $name
     * @param string $value
     */
    public function addData($name = '', $value = '')
    {
        if ($name && is_string($name)) {
            $this->view->setVar($name, $value);
        }
    }

    /**
     * 向模板批量添加数据
     * @param array $data
     */
    public function addDataS($data = [])
    {
        if (!empty($data) && is_array($data)) {
            $this->view->setVars($data);
        }
    }

    /**
     * 只解析views/controller/action模板即Action View 不包括views下的index及layout
     * @param array $data
     * @param string $controllerName
     * @param string $actionName
     * @return bool|\Phalcon\Mvc\View
     */
    public function actionRender($data = [], $controllerName = '', $actionName = '')
    {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        return $this->render($data, $controllerName, $actionName);
    }

    /**
     * 解析模板
     * @param array $data
     * @param string $controllerName
     * @param string $actionName
     * @return bool|\Phalcon\Mvc\View
     */
    public function render($data = [], $controllerName = '', $actionName = '')
    {
        $this->addDataS($data);
        $controllerName = empty($controllerName) ? $this->dispatcher->getControllerName() : $controllerName;
        $actionName = empty($actionName) ? $this->dispatcher->getActionName() : $actionName;
        $this->view->start()->render($controllerName, $actionName, $data);
        $this->view->finish();
        return $this->view->getContent();
    }

    var $breadCrumb = [];
    /**
     * 增加面包屑导航
     * @param string $text 显示文字
     * @param string $url 调转地址
     */
    protected function addBreadcrumb($text = '', $url = '')
    {

        $this->breadCrumb[] = ['text' => $text, 'url' => $url];
        $this->view->breadCrumb = $this->breadCrumb;
    }

    protected function addTitle($title, $clear = false)
    {
        if ($clear) {
            $this->tag->setTitle($title);
        } else {
            $this->tag->prependTitle($title);
        }
    }
    protected function addProjectTitle($title = '')
    {
        $this->view->projectTitle = $title;
    }

}