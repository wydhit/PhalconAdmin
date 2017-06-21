<?php

/**
 * WeSendsms
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:11:08
 */
class WeSendsms extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=true)
     */
    public $sendmobile;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $sendmsg;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $sendinfo;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $sendtimeint;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=true)
     */
    public $sendtypename;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $sendtype;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $sendip;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $senduid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $sendduid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $sendcomid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $sendstate;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $sendmsgstate;

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
     * @return WeSendsms[]|WeSendsms|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeSendsms|\Phalcon\Mvc\Model\ResultInterface
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
            'sendmobile' => 'sendmobile',
            'sendmsg' => 'sendmsg',
            'sendinfo' => 'sendinfo',
            'sendtimeint' => 'sendtimeint',
            'sendtypename' => 'sendtypename',
            'sendtype' => 'sendtype',
            'sendip' => 'sendip',
            'senduid' => 'senduid',
            'sendduid' => 'sendduid',
            'sendcomid' => 'sendcomid',
            'sendstate' => 'sendstate',
            'sendmsgstate' => 'sendmsgstate'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_sendsms';
    }

}
