<?php

/**
 * WeAdmin
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:49
 */
class WeAdmin extends \Phalcon\Mvc\Model
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
     * @Column(type="integer", length=11, nullable=false)
     */
    public $u_id;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $u_name;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $u_pass;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $u_gic;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $u_gname;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $a_gic;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $a_gname;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $randcode;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $stime;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $euid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $enick;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $etime;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $u_nick;

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
     * @return WeAdmin[]|WeAdmin|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeAdmin|\Phalcon\Mvc\Model\ResultInterface
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
            'u_id' => 'u_id',
            'u_name' => 'u_name',
            'u_pass' => 'u_pass',
            'u_gic' => 'u_gic',
            'u_gname' => 'u_gname',
            'a_gic' => 'a_gic',
            'a_gname' => 'a_gname',
            'randcode' => 'randcode',
            'stime' => 'stime',
            'euid' => 'euid',
            'enick' => 'enick',
            'etime' => 'etime',
            'u_nick' => 'u_nick'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_admin';
    }

}
