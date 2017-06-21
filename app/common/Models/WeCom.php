<?php

/**
 * WeCom
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:53
 */
class WeCom extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=255, nullable=true)
     */
    public $ic;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $u_nick;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $u_name;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $a_name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $a_bank;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $a_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $stimeint;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $suid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $snick;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $etime;

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
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $title_en;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $provinceid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $cityid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $districtid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $bizareaid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $provincename;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $cityname;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $districtname;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $bizareaname;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=true)
     */
    public $zipcode;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $weburl;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $telareacode;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $teloffice;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $telfront;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $faxfront;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $dateopen;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $countroom;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $storey1;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $storey2;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $belongcom;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isforeign;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $star1;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $datestar;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $star2;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $star2name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $otherpay;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $payname;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $paycount;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $iscard;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $paycard;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $paycardname;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    public $longitude;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    public $latitude;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $readme;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $mylocation;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $serverbase;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $serverbasename;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $serverother;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $servermetting;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $serverbar;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $serverfun;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $serverfunname;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $img1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $img2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $img3;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $backmoney;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $arrivetime1;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $arrivetime2;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isopen;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $isauto;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isgood;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isseted;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $delaytime1;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $delaytime2;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $delaypercent;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $delay100time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $noshowpercent;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $mylogo;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $telorder;

    /**
     *
     * @var integer
     * @Column(type="integer", length=15, nullable=true)
     */
    public $adateperiod;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $commission;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $isstand;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $hits;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $cls;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $isdelhotel;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $is_display;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    public $scores;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    public $recommends;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $isrun;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    public $islock;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $store_need_confirm;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $dn_service_price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $dn_send_min_price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $dn_is_limit_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $dn_send_begin_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $dn_send_end_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    public $can_add_goods;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    public $add_goods_commission_p;

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
     * @return WeCom[]|WeCom|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeCom|\Phalcon\Mvc\Model\ResultInterface
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
            'ic' => 'ic',
            'uid' => 'uid',
            'u_nick' => 'u_nick',
            'u_name' => 'u_name',
            'a_name' => 'a_name',
            'a_bank' => 'a_bank',
            'a_number' => 'a_number',
            'stimeint' => 'stimeint',
            'suid' => 'suid',
            'snick' => 'snick',
            'etime' => 'etime',
            'euid' => 'euid',
            'enick' => 'enick',
            'title' => 'title',
            'title_en' => 'title_en',
            'provinceid' => 'provinceid',
            'cityid' => 'cityid',
            'districtid' => 'districtid',
            'bizareaid' => 'bizareaid',
            'provincename' => 'provincename',
            'cityname' => 'cityname',
            'districtname' => 'districtname',
            'bizareaname' => 'bizareaname',
            'zipcode' => 'zipcode',
            'weburl' => 'weburl',
            'telareacode' => 'telareacode',
            'teloffice' => 'teloffice',
            'telfront' => 'telfront',
            'faxfront' => 'faxfront',
            'dateopen' => 'dateopen',
            'countroom' => 'countroom',
            'storey1' => 'storey1',
            'storey2' => 'storey2',
            'belongcom' => 'belongcom',
            'isforeign' => 'isforeign',
            'star1' => 'star1',
            'datestar' => 'datestar',
            'star2' => 'star2',
            'star2name' => 'star2name',
            'otherpay' => 'otherpay',
            'payname' => 'payname',
            'paycount' => 'paycount',
            'iscard' => 'iscard',
            'paycard' => 'paycard',
            'paycardname' => 'paycardname',
            'longitude' => 'longitude',
            'latitude' => 'latitude',
            'preimg' => 'preimg',
            'readme' => 'readme',
            'mylocation' => 'mylocation',
            'serverbase' => 'serverbase',
            'serverbasename' => 'serverbasename',
            'serverother' => 'serverother',
            'servermetting' => 'servermetting',
            'serverbar' => 'serverbar',
            'serverfun' => 'serverfun',
            'serverfunname' => 'serverfunname',
            'img1' => 'img1',
            'img2' => 'img2',
            'img3' => 'img3',
            'backmoney' => 'backmoney',
            'arrivetime1' => 'arrivetime1',
            'arrivetime2' => 'arrivetime2',
            'isopen' => 'isopen',
            'isauto' => 'isauto',
            'isgood' => 'isgood',
            'isseted' => 'isseted',
            'delaytime1' => 'delaytime1',
            'delaytime2' => 'delaytime2',
            'delaypercent' => 'delaypercent',
            'delay100time' => 'delay100time',
            'noshowpercent' => 'noshowpercent',
            'mylogo' => 'mylogo',
            'telorder' => 'telorder',
            'adateperiod' => 'adateperiod',
            'commission' => 'commission',
            'isstand' => 'isstand',
            'hits' => 'hits',
            'cls' => 'cls',
            'isdelhotel' => 'isdelhotel',
            'is_display' => 'is_display',
            'scores' => 'scores',
            'recommends' => 'recommends',
            'isrun' => 'isrun',
            'islock' => 'islock',
            'store_need_confirm' => 'store_need_confirm',
            'dn_service_price' => 'dn_service_price',
            'dn_send_min_price' => 'dn_send_min_price',
            'dn_is_limit_time' => 'dn_is_limit_time',
            'dn_send_begin_time' => 'dn_send_begin_time',
            'dn_send_end_time' => 'dn_send_end_time',
            'can_add_goods' => 'can_add_goods',
            'add_goods_commission_p' => 'add_goods_commission_p'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_com';
    }

}
