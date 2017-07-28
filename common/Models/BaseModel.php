<?php

namespace Common\Models;

use Common\Core\BaseValidation;
use Common\Exception\ValidationFailedException;
use Common\Traits\ErrMsg;
use Phalcon\Di;
use \Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple;

class BaseModel extends Model
{
    use ErrMsg;
    private static $modelRelationCache =[];

//    public function create($data = null, $whiteList = null)
//    {
//       return parent::create($data,$whiteList);
//       /**
//        *
//        * 执行更新或者插入会顺序执行以下调用
//        * prepareSave model::save 2995   [insert|update] 不需要返回不终止操作
//        * beforeValidation model::_preSave 1998   [insert|update] 返回false 终止操作
//        *   beforeValidationOnCreate model::_preSave 2006   [insert] 返回false 终止操作
//        *   beforeValidationOnUpdate model::_preSave 2010   [update] 返回false 终止操作
//        * 插入或者更新数据 会进行非空验证 验证失败会触发 onValidationFails 及 notDeleted|notSaved
//        * .....
//        */
//    }
//    public function prepareSave()
//    {
//       /* 验证前的预置操作*/
//    }
//    public function beforeValidation()
//    {
//        /*非空验证之前 调用 返回false终止操作*/
//    }
//    public function validation()
//    {
//        /**
//         *@var $validation BaseValidation
//         */
//        /*$validation=$this->getDI()->get('validation');*/
//        /* return $this->validate($validation); */
//        /*非空验证之后调用 会触发 返回false终止执行并触发 onValidationFails*/
//        /*需要严重的大多写在这个地方*/
//    }
//    public function beforeSave()
//    {
//        /*这里发生在验证之后*/ /*可以做些预定义的操作*/
//    }
//    public function beforeUpdate()
//    {
//        /*这里发生在验证之后*/ /*可以做些预定义的操作*/
//    }

//    public function onValidationFails()
//    {
//        /*validation()返回false 会触发该函数*/
//        /*非空验证失败也会触发该函数*/
////        $message=join("\r\n",$this->getErrInput());
////        throw new ValidationFailedException($message,[],$this->getErrInput());
//    }


    /**
     * 利用模型关系设置 一次性把所有关联数据都读取出来 仅使用时hasOne关系
     * @param string $alias
     * @param null $parameters
     * @return Model\ResultsetInterface
     */
    public static function findWithAlias($parameters = null,$alias = '')
    {

        $models = self::find($parameters);
        $modelName = get_called_class();
        $di = Di::getDefault();
        /**
         * @var $manager Model\Manager;
         */
        $manager = $di->getShared("modelsManager");
        $alias = strtolower($alias);
        $relation = $manager->getRelationByAlias($modelName, $alias);
        $referencedModel = $relation->getReferencedModel();
        $referencedField = $relation->getReferencedFields();
        $field = $relation->getFields();
        $aliasId = [];
        foreach ($models as $model) {
            if (isset($model->$field)) {
                $aliasId[] = $model->$field;
            }
        }
        $aliasId = array_unique($aliasId);
        if (empty($aliasId)) {
            return $models;
        }
        $referencedResults = $referencedModel::find($referencedField . ' in (' . join(',', $aliasId) . ')');
        $referenced = $data = [];
        foreach ($referencedResults as $referencedResult) {
            $referenced[$referencedResult->{$referencedField}] = $referencedResult;
        }
        unset($referencedResults);
        foreach ($aliasId as $id) {
            if (isset($referenced[$id])) {
                $data[$id] = $referenced[$id];
            }
        }
        $cache = [
            'referencedField' => $referencedField,
            'field' => $field,
            'referencedModel' => $referencedModel,
            'data' => $data
        ];
        self::$modelRelationCache[$alias] = $cache;
        unset($cache);
        return $models;
    }

    public function __get($property)
    {
        if (isset(self::$modelRelationCache[$property])) {
            if (!empty(self::$modelRelationCache[$property]['data'])) {
                $thisIdKey = self::$modelRelationCache[$property]['field'];
                if (isset($this->$thisIdKey) && isset(self::$modelRelationCache[$property]['data'][$this->$thisIdKey])) {
                    return self::$modelRelationCache[$property]['data'][$this->$thisIdKey];
                }
            }
        }
        return parent::__get($property);
    }

    /**
     *  字段自增
     * @param null $field
     * @param string $step
     * @return bool
     */
    public function increment($field = null, $step = '')
    {
        $field = filter_var($field, FILTER_SANITIZE_STRING);
        $this->$field = $this->$field + (int)$step;
        return $this->save();
    }

    /**
     * 字段自减
     * @param null $field
     * @param string $step
     * @return bool
     */
    public function decrement($field = null, $step = '')
    {
        $field = filter_var($field, FILTER_SANITIZE_STRING);
        $this->$field = $this->$field - (int)$step;
        return $this->save();
    }

    /**
     * 执行原生sql
     * @param $conditions
     * @param null $bindParams
     * @param null $bindTypes
     * @return Simple
     */
    public static function findByRawSql($conditions, $bindParams = null, $bindTypes = null)
    {
        $model = new static();
        return new Simple(
            null,
            $model,
            $model->getReadConnection()->query($conditions, $bindParams, $bindTypes)
        );
    }

    /**
     * 获取字段的错误信息 一般用于验证错误产生的信息返回给前端展示用
     * @return array
     */
    public function getErrInput()
    {
        $errinput=[];
        $messages=$this->getMessages();
        if(empty($messages)){
            return $errinput;
        }
        foreach ($messages as $message) {
            $field=$message->getField();
            $msg=$message->getMessage();
            if(isset($errinput[$field])){
                $errinput[$field].=$msg."\r\n";
            }else{
                $errinput[$field]=$msg."\r\n";
            }
        }
        return $errinput;
    }

}