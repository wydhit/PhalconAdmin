<?php

/**
 * CpLog
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:46
 */
class CpLog extends \Phalcon\Mvc\Model
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
    public $observe_event;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $door_number;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $post_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $post_type;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $order_number;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $update_time;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $need_open_door;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $open_success_door;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $open_fail_door;

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
     * @return CpLog[]|CpLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpLog|\Phalcon\Mvc\Model\ResultInterface
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
            'observe_event' => 'observe_event',
            'door_number' => 'door_number',
            'post_time' => 'post_time',
            'post_type' => 'post_type',
            'order_number' => 'order_number',
            'update_time' => 'update_time',
            'need_open_door' => 'need_open_door',
            'open_success_door' => 'open_success_door',
            'open_fail_door' => 'open_fail_door'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cp_log';
    }

}
