<?php

/**
 * WeUpclass
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:11:11
 */
class WeUpclass extends \Phalcon\Mvc\Model
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
    public $cid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $uid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $comid;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $readme;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $cls;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isuse;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $issys;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $dir;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $ftype;

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
     * @return WeUpclass[]|WeUpclass|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeUpclass|\Phalcon\Mvc\Model\ResultInterface
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
            'cid' => 'cid',
            'uid' => 'uid',
            'comid' => 'comid',
            'title' => 'title',
            'readme' => 'readme',
            'cls' => 'cls',
            'preimg' => 'preimg',
            'isuse' => 'isuse',
            'issys' => 'issys',
            'dir' => 'dir',
            'ftype' => 'ftype'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_upclass';
    }

}