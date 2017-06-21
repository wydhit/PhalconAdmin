<?php

/**
 * WeLogcomreplenish
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:11:01
 */
class WeLogcomreplenish extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $unick;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $fullname;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $comid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $stime;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $stimeint;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $doorids;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $doortitles;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $mytype;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $mytypename;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $deviceid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $placeid;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $comgoodsids;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $goodstitles;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $historygoods;

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
     * @return WeLogcomreplenish[]|WeLogcomreplenish|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeLogcomreplenish|\Phalcon\Mvc\Model\ResultInterface
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
            'uid' => 'uid',
            'unick' => 'unick',
            'fullname' => 'fullname',
            'comid' => 'comid',
            'stime' => 'stime',
            'stimeint' => 'stimeint',
            'doorids' => 'doorids',
            'doortitles' => 'doortitles',
            'mytype' => 'mytype',
            'mytypename' => 'mytypename',
            'deviceid' => 'deviceid',
            'placeid' => 'placeid',
            'comgoodsids' => 'comgoodsids',
            'goodstitles' => 'goodstitles',
            'historygoods' => 'historygoods'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_logcomreplenish';
    }

}