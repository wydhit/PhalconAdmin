<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-11
 * Time: 14:15
 */

namespace Common\Core;

use Phalcon\Validation;
use Phalcon\Validation\Validator;


class BaseValidator extends Validation
{
    public $defaultMessages = [
        "Alnum" => "只能输入字母或者数字",
        "Alpha" => "只能输入字母",
        "Between" => "必须在 :min 到 :max 范围内",
        "Confirmation" => "必须和 :with 一致",
        "Digit" => "只能输入数字",
        "Email" => "请输入正确的Email地址",
        "ExclusionIn" => "不能是 :domain 中的一个",
        "FileEmpty" => "Field :field must not be empty",
        "FileIniSize" => "File :field exceeds the maximum file size",
        "FileMaxResolution" => "File :field must not exceed :max resolution",
        "FileMinResolution" => "File :field must be at least :min resolution",
        "FileSize" => "File :field exceeds the size of :max",
        "FileType" => "File :field must be of type: :types",
        "FileValid" => "Field :field is not valid",
        "Identical" => "Field :field does not have the expected value",
        "InclusionIn" => "必须是 :domain 中的一个",
        "Numericality" => "必须输入数字",
        "PresenceOf" => "必填项",
        "Regex" => "格式不支持",
        "TooLong" => "不能超过 :max 个字符",
        "TooShort" => "最少要输入 :min 个字符",
        "Uniqueness" => "重复！请重新输入",
        "Url" => "必须输入正确的url",
        "CreditCard" => "不可用的信用卡卡号",
        "Date" => "日期格式不正确"
    ];

    /**
     * 为前端js获取验证规则
     * @return array
     */
    public function getRulesForJs()
    {

        $allValidators = $this->getValidators();
        $rules = [];
        foreach ($allValidators as $allValidator) {
            $title = $allValidator[0];
            if (!isset($rules[$title])) {
                $rules[$title] = [];
            }
            $rules[$title] = array_merge($rules[$title], $this->changeRules($allValidator[1]));
        }
        return $rules;
    }

    /*将phalcon的验证规则转成JQ validate 的*/
    private function changeRules(Validator $allValidator)
    {
        $rules = [];
        $validatorNames = explode('\\', get_class($allValidator));
        $validatorName = end($validatorNames);
        switch ($validatorName) {
            /*非空*/
            case 'PresenceOf':
                $rules['required'] = true;
                break;
            /*长短*/
            case 'StringLength':
                if ($allValidator->getOption('max')) {
                    $rules['maxlength'] = $allValidator->getOption('max');
                }
                if ($allValidator->getOption('min')) {
                    $rules['minlength'] = $allValidator->getOption('min');
                }
                break;
            /*email*/
            case 'Email':
                $rules['email'] = true;
                break;
            /*url:*/
            case 'Url':
                $rules['url'] = true;
                break;
            /*日期*/
            case 'Date':
                $rules['date'] = true;
                break;
            /*小数*/
            case 'Numericality':
                $rules['number'] = true;
                break;
            /*数字*/
            case 'Digit':
                $rules['digits'] = true;
                break;
            case 'Confirmation':
                if ($allValidator->getOption('with')) {
                    $rules['equalTo'] = '#' . $allValidator->getOption('with');
                }
                break;
            case 'Between':
                if ($allValidator->getOption('maximum') && $allValidator->getOption('minimum')) {
                    $rules['range'] = [$allValidator->getOption('minimum'), $allValidator->getOption('maximum')];
                }
                break;
        }
        return $rules;
    }

}