<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 12:56
 */

namespace Common\Controllers;

use Common\Traits\ControllerValid;
use Common\Traits\ViewAction;
use Phalcon\Http\Response;
use \Phalcon\Mvc\Controller;


class BaseController extends Controller
{
    use ViewAction;
    use ControllerValid;

    /**
     * 返回正确执行正确的信息 封装 自动识别是否返回json
     * @param string $msg
     * @param array $data
     * @param array $errInput
     * @param string $goUrl
     * @return bool|\Phalcon\Mvc\View|string
     */
    public function successEnd($msg = '', $data = [], $errInput = [], $goUrl = '')
    {
        if ($this->request->isAjax() && $this->request->isPost()) {/*返回json*/
            return $this->sendJson('success', $msg, $data, $errInput, $goUrl);
        } else {
            return $this->msg('success', $msg, $data, $errInput, $goUrl);
        }
    }
    /**
     * 返回执行错误的信息 封装 自动识别是否返回json
     * @param string $msg
     * @param array $data
     * @param array $errInput
     * @param string $goUrl
     * @return bool|\Phalcon\Mvc\View|string
     */
    public function errorEnd($msg = '', $data = [], $errInput = [], $goUrl = '')
    {
        if ($this->request->isAjax() && $this->request->isPost()) {/*返回json*/
            return $this->sendJson('error', $msg, $data, $errInput, $goUrl);
        } else {
            return $this->msg('error', $msg, $data, $errInput, $goUrl);
        }
    }
    /**
     * 返回错误json数据
     * @param string $msg
     * @param array $data
     * @param array $errInput
     * @return string
     */
    public function sendErrorJson($msg = '', $data = [], $errInput = [])
    {
        return $this->sendJson('error', $msg, $data, $errInput);
    }
    /**
     * 返回正确的json数据
     * @param string $msg
     * @param array $data
     * @param array $errInput
     * @return string
     */
    public function sendSuccessJson($msg = '', $data = [], $errInput = [])
    {
        return $this->sendJson('success', $msg, $data, $errInput);
    }
    /**
     * 返回json数据 通用方法
     * @param string $status 状态 约定只能是error 或者success
     * @param string|array $msg //返回的信息
     * @param array $data //返回的数据
     * @param array $errInput //字段错误信息
     * @param $goUrl string 跳转的url
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
    /**
     * 返回html格式的提示信息
     * @param string $status
     * @param string $msg
     * @param array $data
     * @param array $errInput
     * @param string $goUrl
     * @param bool $inDialog
     * @return bool|\Phalcon\Mvc\View
     */
    public function msg($status = 'error', $msg = '', $data = [], $errInput = [], $goUrl = '', $inDialog = null)
    {
        if($inDialog===null){
            $inDialog=$this->request->get('inDialog');
        }
        if ($inDialog) {
            return $this->actionRender(compact('status', 'msg', 'data', 'errInput', 'goUrl','inDialog'), 'msg', 'msg');
        }
        return $this->Render(compact('status', 'msg', 'data', 'errInput', 'goUrl','inDialog'), 'msg', 'msg');
    }


    /**
     * 给前段datagrid发送标准化数据
     * @param  $data array 返回的数据 必填
     * @param $records int 全部记录总数 必填
     * @param $page int 当前页 不填自动获取
     * @param $total int 总页数  不填自动计算
     * @param $searchData array 其他附加数据
     * @return  Response;
     */
    public function sendJsonForDateGrid($data = [], $records = 0, $page = null, $total = null, $searchData = [])
    {
        /*当前页记录数据*/
        if (!is_array($data)) {
            $data = (array)$data;
        }
        $array['rows'] = $data;

        /*总共多少条数据*/
        $array['records'] = (int)$records;
        /*请求第几页数据*/
        if ($page === null) {
            $array['page'] = (int)$this->request->get('page', 'int', 1);//
        } else {
            $array['page'] = $page;
        }

        /*总共多少页数据*/
        if ($total === null) {
            $rows = $this->request->get('rows', 'int', 10);
            $array['total'] = ceil($array['records'] / $rows);
        } else {
            $array['total'] = $total;
        }
        $array['status'] = 'success';
        $array['searchData'] = $searchData;
        return $this->response->setJsonContent($array);
    }

    public function notFoundAction()
    {
        $message = '请求地址不存在';
        if ($this->request->isAjax() && $this->request->isPost()) {
            return $this->sendErrorJson($message);
        } else {
            return $message;
        }
    }
}