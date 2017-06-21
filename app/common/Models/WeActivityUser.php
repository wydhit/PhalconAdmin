<?php

/**
 * WeActivityUser
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:49
 */
class WeActivityUser extends \Phalcon\Mvc\Model
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
    public $activity_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $clerk_uid;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $clerk_unick;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $customer_uid;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $customer_mobile;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $comid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $stimeint;

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
     * @return WeActivityUser[]|WeActivityUser|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeActivityUser|\Phalcon\Mvc\Model\ResultInterface
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
            'activity_id' => 'activity_id',
            'clerk_uid' => 'clerk_uid',
            'clerk_unick' => 'clerk_unick',
            'customer_uid' => 'customer_uid',
            'customer_mobile' => 'customer_mobile',
            'comid' => 'comid',
            'stimeint' => 'stimeint',
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
        return 'we_activity_user';
    }

}
