<?php

/**
 * WeFrontSellOrderDetail
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:59
 */
class WeFrontSellOrderDetail extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $order_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $goodsid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $comgoodsid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $sell_count;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $sell_price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $sell_money;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $supply_price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $supply_money;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $commission;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $commission_total;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $create_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $comgoods_type;

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
     * @return WeFrontSellOrderDetail[]|WeFrontSellOrderDetail|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeFrontSellOrderDetail|\Phalcon\Mvc\Model\ResultInterface
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
            'order_id' => 'order_id',
            'goodsid' => 'goodsid',
            'comgoodsid' => 'comgoodsid',
            'sell_count' => 'sell_count',
            'sell_price' => 'sell_price',
            'sell_money' => 'sell_money',
            'supply_price' => 'supply_price',
            'supply_money' => 'supply_money',
            'commission' => 'commission',
            'commission_total' => 'commission_total',
            'create_time' => 'create_time',
            'comgoods_type' => 'comgoods_type'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_front_sell_order_detail';
    }

}
