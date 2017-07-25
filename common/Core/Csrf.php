<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-14
 * Time: 9:36
 */

namespace Common\Core;

use Common\Core\Exception\UserException;
use Common\Exception\LogicException;
use Phalcon\Security\Random;


/**
 * 基于cookie和session的CSRF
 *
 */
class Csrf extends BaseInjectable
{
    protected $_numberBytes = 8;
    const CSRF_NAME = 'csrfValue';
    /*失效时间*/
    protected $valueTimeOut = 60 * 10;
    /**
     * @var $_random Random
     */
    public $_random;
    public function initialize()
    {
        parent::initialize();
        $this->_random = new Random();
    }

    /**
     * 设置
     * @param $formName string 表单名称 用于一个页面多表单 或者打开多个窗口操作多个表单
     * @param $outTime int|null 失效时间  10秒后失效 传入10
     */
    public function setCsrfToken($formName = '', $outTime = null)
    {
        if ($outTime === null) {
            $outTime = $this->valueTimeOut;
        }
        $outTime = (int)$outTime;
        $value = $this->_random->base64Safe($this->_numberBytes) . ':::' . (time() + $outTime);
        $this->cookies->set(self::CSRF_NAME . $formName, $value);
        $this->session->set(self::CSRF_NAME . $formName, $value);
    }

    /**
     * 检查
     * @param $formName string 表单名称 用于一个页面多表单 或者打开多个窗口操作多个表单
     * @throws UserException
     * @return bool
     */
    public function checkCsrfToken($formName = '')
    {
        $localCsrfValue = $this->session->get(self::CSRF_NAME . $formName);
        $cookieCsrfValue = $this->cookies->getValue(self::CSRF_NAME . $formName);
        if (empty($localCsrfValue) || empty($cookieCsrfValue)) {
            throw new LogicException('无法识别的请求，请刷新重试');
        }
        $valueTime = explode(':::', $cookieCsrfValue)[1];
        if (($valueTime - time()) < 0) {
            throw new LogicException('请求超时，请刷新重试');
        }
        if ($localCsrfValue !== $cookieCsrfValue) {
            throw new LogicException('请求失效，请重试');
        }
        /*发放一个新的*/
        $this->setCsrfToken($formName);
        return true;
    }

    public function destroyCsrfToken($formName = '')
    {
        $this->cookies->set(self::CSRF_NAME . $formName, null);
        $this->session->set(self::CSRF_NAME . $formName, null);
    }

    /**
     * @return int
     */
    public function getValueTimeOut()
    {
        return $this->valueTimeOut;
    }

    /**
     * @param int $valueTimeOut
     */
    public function setValueTimeOut($valueTimeOut)
    {
        $this->valueTimeOut = $valueTimeOut;
    }

}