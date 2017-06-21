<?php

/**
 * WeSetting
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:11:08
 */
class WeSetting extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $myname;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $titleshow;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $readme;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $mydata;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $cls;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $mytype;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=true)
     */
    public $isshow;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=true)
     */
    public $mustfill;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=true)
     */
    public $isother;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $fieldtype;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $fieldoption;

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
     * @return WeSetting[]|WeSetting|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeSetting|\Phalcon\Mvc\Model\ResultInterface
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
            'myname' => 'myname',
            'title' => 'title',
            'titleshow' => 'titleshow',
            'readme' => 'readme',
            'mydata' => 'mydata',
            'cls' => 'cls',
            'mytype' => 'mytype',
            'isshow' => 'isshow',
            'mustfill' => 'mustfill',
            'isother' => 'isother',
            'fieldtype' => 'fieldtype',
            'fieldoption' => 'fieldoption'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_setting';
    }

}
