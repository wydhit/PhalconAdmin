<?php

/**
 * WeQuestion
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:11:07
 */
class WeQuestion extends \Phalcon\Mvc\Model
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
    public $fid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $type;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $des;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $content;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $cls;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $p;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $isok;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $userid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $creattime;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $updatetime;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $isdel;

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
     * @return WeQuestion[]|WeQuestion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeQuestion|\Phalcon\Mvc\Model\ResultInterface
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
            'fid' => 'fid',
            'type' => 'type',
            'title' => 'title',
            'des' => 'des',
            'content' => 'content',
            'cls' => 'cls',
            'p' => 'p',
            'isok' => 'isok',
            'userid' => 'userid',
            'creattime' => 'creattime',
            'updatetime' => 'updatetime',
            'isdel' => 'isdel'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_question';
    }

}