<?php

/**
 * CpAdmin
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:46
 */
class CpAdmin extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=255, nullable=true)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $realname;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $create_time;

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
     * @return CpAdmin[]|CpAdmin|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpAdmin|\Phalcon\Mvc\Model\ResultInterface
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
            'username' => 'username',
            'password' => 'password',
            'realname' => 'realname',
            'create_time' => 'create_time'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cp_admin';
    }

}