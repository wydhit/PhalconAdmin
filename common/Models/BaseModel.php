<?php

namespace Common\Models;

use Common\Traits\ErrMsg;
use Phalcon\Di;
use \Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple;

class BaseModel extends Model
{
    use ErrMsg;
    private static $modelRelationCache =[];
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

    public function getErrInput()
    {
        $errinput=[];
        $messages=$this->getMessages();
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