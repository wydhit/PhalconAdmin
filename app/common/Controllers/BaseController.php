<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 12:56
 */

namespace Common\Controllers;

use \Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;


class BaseController extends Controller
{
    protected function addTitle($title, $clear = false)
    {
        if ($clear) {
            $this->view->title = $title;
        } else {
            $this->view->title .= $title;
        }
    }
    protected function addProjectTitle($title=''){
        $this->view->projectTitle=$title;
    }

    /**
     * @var $pluginCollection \Phalcon\Assets\Collection
     */
    protected $pluginCollection = null;
    /**
     * @var $inlineCollection \Phalcon\Assets\Collection
     */
    protected $inlineCollection = null;

    protected function assetsManager()
    {
        $this->pluginCollection = $this->assets->collection('plugin');
        $this->inlineCollection = $this->assets->collection('inline');
    }

    /*增加插件的css*/
    protected function addPluginCss($css = '')
    {
        if ($this->pluginCollection !== null) {
            $this->pluginCollection->addCss($css);
        }
    }

    /*增加页面独有的css*/
    protected function addInlineCss($css = '')
    {
        if ($this->inlineCollection !== null) {
            $this->inlineCollection->addCss($css);
        }
    }

    /*增加插件的js*/
    protected function addPluginJs($js = '')
    {
        if ($this->pluginCollection !== null) {
            $this->pluginCollection->addCss($js);
        }
    }

    /*增加页面独有的Js*/
    protected function addInlineJs($js = '')
    {
        if ($this->inlineCollection !== null) {
            $this->inlineCollection->addCss($js);
        }
    }


    /*返回json相关*/
    public function sendErrorJson($msg = '', $data = [], $errInput = [])
    {
        return $this->sendJson('error', $msg, $data, $errInput);
    }

    public function sendSuccessJson($msg = '', $data = [], $errInput = [])
    {
        return $this->sendJson('success', $msg, $data, $errInput);
    }

    /**
     * 返回json数据
     * @param string $status 状态 约定只能是error 或者sucess
     * @param string|array $msg //返回的信息
     * @param array $data //返回的数据
     * @param array $errInput //字段错误信息
     * @return string
     */
    public function sendJson($status = 'error', $msg = '', $data = [], $errInput = [], $goUrl = '')
    {
        if (!in_array($status, ['error', 'success'])) {
            $status = 'error';
        }
        if (is_array($msg)) {
            $msg = join("\r\n", $msg);
        }
        return $this->response->setJsonContent(compact('status', 'msg', 'data', 'errInput', 'goUrl'));
    }

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

    /*视图模板相关end*/
    public function msg($message = '', $url = '', $time = '')
    {
        return $this->render(compact('message', 'url', 'time'), 'msg', 'msg');
    }

    /**
     * 给前段datagrid发送标准化数据
     * @param  $data array 返回的数据 必填
     * @param $records int 全部记录总数 必填
     * @param $page int 当前页 不填自动获取
     * @param $total int 总页数  不填自动计算
     * @param $otherData array 其他附加数据
     */

    public function sendJsonForDateGrid($data = [], $records = 0, $page = null, $total = null, $otherData = [])
    {
        /*当前页记录数据*/
        if (!is_array($data)) {
            $data = (array)$data;
        }
        $array['rows'] = $data;

        /*总共多少条数据*/
        $array['records'] = $records;
        /*请求第几页数据*/
        if ($page === null) {
            $array['page'] = (int)$this->request->get('page', 'int', 1);//
        } else {
            $array['page'] = $page;
        }

        /*总共多少页数据*/
        if ($total === null) {
            $rows = $this->request->get('rows', 'int', 10);
            $array['total'] = ceil($array['records'] / $rows);;
        } else {
            $array['total'] = $total;
        }
        $array['status'] = 'success';
        $array['otherData'] = $otherData;
        $this->response->setJsonContent($array);
    }

}