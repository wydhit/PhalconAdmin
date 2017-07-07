<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-06
 * Time: 11:55
 */

namespace Common\Core;


use Phalcon\Db\RawValue;
use Phalcon\Filter;

class Mysql extends \Phalcon\Db\Adapter\Pdo\Mysql
{

    /**
     * 对某表某字段 增加值操作
     * @param $table
     * @param null $field
     * @param int $step
     * @param $where
     * @return bool
     */
    public function increment($table, $field = null, $step = 0, $where)
    {
        return $this->fieldStep($table, $field, $step, $where, '+');
    }
    /**
     * 对某表某字段 减少值操作
     * @param $table
     * @param null $field
     * @param int $step
     * @param $where
     * @return bool
     */
    public function decrement($table, $field = null, $step = 0, $where)
    {
        return $this->fieldStep($table, $field , $step, $where, '-');
    }
    /**
     * 对某表某字段 减少值操作 但是限定不能减至0以下
     * @param $table
     * @param null $field
     * @param int $step
     * @param $where
     * @return bool
     */
    public function decrementAboveZero($table, $field = null, $step = 0, $where)
    {
        $sql="select $field from $table WHERE $where";
        $result=$this->fetchOne($sql);
        if($result[$field]<$step){
            return false;
        }else{
           return $this->decrement($table,$field,$step,$where);
        }
    }

    private function fieldStep($table, $field, $step, $where, $type = '')
    {
        $table = $this->sanitizeKey($table);
        $key = $this->sanitizeKey($field);
        if (empty($key)||empty($table)) {
            return false;
        }
        $step = (int)$step;
        if($step<0){
            return false;
        }
        if ($type === '+') {
            $value = $this->rawValue("`$key` + $step");
        } elseif ($type === '-') {
            $value = $this->rawValue("`$key` - $step");
        } else {
            return false;
        }
        $data = [$key => $value];
        return $this->updateAsDict($table, $data, $where);
    }

    private function rawValue($v)
    {
        return new RawValue($v);
    }

    private function sanitizeKey($field)
    {
        return (new Filter())->sanitize($field, 'string');
    }


}