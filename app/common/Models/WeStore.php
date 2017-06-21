<?php

/**
 * WeStore
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:11:09
 */
class WeStore extends \Phalcon\Mvc\Model
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
    public $goodsid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $comgoodsid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $formcode;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $duid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $dname;

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
    public $mycount;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $mytype;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $other;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $comid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $comic;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $comname;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $store_batch_id;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    public $batch_num;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    public $indate;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $status;

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
     * @return WeStore[]|WeStore|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeStore|\Phalcon\Mvc\Model\ResultInterface
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
            'goodsid' => 'goodsid',
            'comgoodsid' => 'comgoodsid',
            'formcode' => 'formcode',
            'duid' => 'duid',
            'dname' => 'dname',
            'stime' => 'stime',
            'stimeint' => 'stimeint',
            'mycount' => 'mycount',
            'mytype' => 'mytype',
            'other' => 'other',
            'comid' => 'comid',
            'comic' => 'comic',
            'comname' => 'comname',
            'store_batch_id' => 'store_batch_id',
            'batch_num' => 'batch_num',
            'indate' => 'indate',
            'status' => 'status'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_store';
    }

}