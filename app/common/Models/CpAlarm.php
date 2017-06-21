<?php

/**
 * CpAlarm
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:46
 */
class CpAlarm extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=12, nullable=true)
     */
    public $device_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $alarm_event;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $bad_doors;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $is_repair;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $post_time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("magiclamp");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpAlarm[]|CpAlarm|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpAlarm|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'device_id' => 'device_id',
            'alarm_event' => 'alarm_event',
            'bad_doors' => 'bad_doors',
            'is_repair' => 'is_repair',
            'post_time' => 'post_time'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cp_alarm';
    }

}
