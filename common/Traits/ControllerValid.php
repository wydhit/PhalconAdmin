<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-11
 * Time: 10:47
 */

namespace Common\Traits;


use Admin\Exception\ValidationFailedException;
use Common\Core\Exception\UserException;
use Phalcon\Mvc\Model\ValidationFailed;

Trait  ControllerValid
{
    use BaseTrait;
    public function getValidationRulesForJs($controllerName = null, $actionName = null)
    {
        $validatorName = $this->getValidationName($controllerName, $actionName);
        if (empty($validatorName)) {
            return [];
        }
        /**
         * @var $result \Phalcon\Validation\Message\Group
         * @var $validator \Phalcon\Validation
         */
        $validator = new $validatorName();
        return $validator->getRulesForJs();
    }

    /**
     * 自动寻找验证器 并验证输入 如果通过验证则返回true  不通过则抛出异常
     * @param $input
     * @param string $validatorName
     * @throws UserException
     * @return true
     */
    public function validationInput($input=[], $validatorName='')
    {
        $validatorName =empty($validatorName)?$this->getValidationName():trim($validatorName);
        if (empty($validatorName)) {
            return true;
        }
        if(empty($input)){
            $input=$this->request->get();
        }
        /**
         * @var $result \Phalcon\Validation\Message\Group
         * @var $validator \Phalcon\Validation
         */
        $validator = new $validatorName();
        $result = $validator->validate($input);
        $message = [];
        if (count($result)) {
            foreach ($result as $item) {
                $field = $item->getField();
                if (isset($message[$field])) {
                    $message[$field] .= $item->getMessage() . "\r\n";
                } else {
                    $message[$field] = $item->getMessage();
                }
            }
        }
        if(!empty($message)){
            throw new \Common\Exception\ValidationFailedException('输入有误',[],$message);
        }
        return true;

    }
    /**
     * 自动寻找验证器
     * @param null $controllerName
     * @param null $actionName
     * @return string
     */
    private function getValidationName($controllerName = null, $actionName = null)
    {
        $controllerName = empty($controllerName) ? $this->dispatcher->getControllerName() : $controllerName;
        $actionName = empty($actionName) ? $this->dispatcher->getActionName() : $actionName;
        $validatorName = $this->dispatcher->getNamespaceName() . '\\' . ucfirst($controllerName) . ucfirst($actionName);
        $validatorName = str_replace('\Controllers', '\Validator', $validatorName) . 'Validator';
        if (class_exists($validatorName)) {
            return $validatorName;
        } else {
            return '';
        }
    }


}