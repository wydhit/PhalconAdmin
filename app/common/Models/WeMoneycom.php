<?php

/**
 * WeMoneycom
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:11:04
 */
class WeMoneycom extends \Phalcon\Mvc\Model
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
    public $uid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $unick;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $myvalue;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $myvalueout;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $mytotal;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $orderid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $paymentstatus;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $title;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $duid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $dnick;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
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
     * @Column(type="integer", length=11, nullable=false)
     */
    public $myway;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $mywayname;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $formcode;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $formdate;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $moneycode;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $moneydate;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $stimeint;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $stime;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $isdel;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $ispass;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $other;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $moneytype;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $tradetype;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $myip;

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
    public $comname;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $paymentday;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $ispayed;

    /**
     *
     * @var string
     * @Column(type="string", length=2550, nullable=true)
     */
    public $myrelation;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $myfrom;

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
     * @return WeMoneycom[]|WeMoneycom|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeMoneycom|\Phalcon\Mvc\Model\ResultInterface
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
            'myvalue' => 'myvalue',
            'myvalueout' => 'myvalueout',
            'mytotal' => 'mytotal',
            'orderid' => 'orderid',
            'paymentstatus' => 'paymentstatus',
            'title' => 'title',
            'duid' => 'duid',
            'dnick' => 'dnick',
            'mytype' => 'mytype',
            'mytypename' => 'mytypename',
            'myway' => 'myway',
            'mywayname' => 'mywayname',
            'formcode' => 'formcode',
            'formdate' => 'formdate',
            'moneycode' => 'moneycode',
            'moneydate' => 'moneydate',
            'stimeint' => 'stimeint',
            'stime' => 'stime',
            'isdel' => 'isdel',
            'ispass' => 'ispass',
            'other' => 'other',
            'moneytype' => 'moneytype',
            'tradetype' => 'tradetype',
            'myip' => 'myip',
            'comid' => 'comid',
            'comname' => 'comname',
            'paymentday' => 'paymentday',
            'ispayed' => 'ispayed',
            'myrelation' => 'myrelation',
            'myfrom' => 'myfrom'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_moneycom';
    }

}
