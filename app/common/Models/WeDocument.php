<?php

/**
 * WeDocument
 * 
 * @autogenerated by Phalcon Developer Tools
 * @date 2017-06-21, 07:10:56
 */
class WeDocument extends \Phalcon\Mvc\Model
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
    public $nick;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $cid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $classid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $specialid;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $author;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $comefrom;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg3;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg4;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg5;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg6;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg7;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg8;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg9;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $preimg10;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $hits;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $tags;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $descrip;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $cls;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
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
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $etime;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $enick;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $content;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $contentshow;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $readme;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $istop;

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
    public $ispass;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isshow;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isdel;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isopen;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other1;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other2;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other3;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other4;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other5;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other6;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other7;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other8;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other9;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $other10;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $imgurl;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr3;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr4;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr5;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr6;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr7;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr8;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr9;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $attr10;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $mykeywords;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $mydescription;

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
     * @return WeDocument[]|WeDocument|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeDocument|\Phalcon\Mvc\Model\ResultInterface
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
            'nick' => 'nick',
            'cid' => 'cid',
            'classid' => 'classid',
            'specialid' => 'specialid',
            'author' => 'author',
            'comefrom' => 'comefrom',
            'preimg' => 'preimg',
            'preimg2' => 'preimg2',
            'preimg3' => 'preimg3',
            'preimg4' => 'preimg4',
            'preimg5' => 'preimg5',
            'preimg6' => 'preimg6',
            'preimg7' => 'preimg7',
            'preimg8' => 'preimg8',
            'preimg9' => 'preimg9',
            'preimg10' => 'preimg10',
            'hits' => 'hits',
            'tags' => 'tags',
            'descrip' => 'descrip',
            'cls' => 'cls',
            'stime' => 'stime',
            'euid' => 'euid',
            'etime' => 'etime',
            'enick' => 'enick',
            'title' => 'title',
            'content' => 'content',
            'contentshow' => 'contentshow',
            'readme' => 'readme',
            'istop' => 'istop',
            'isgood' => 'isgood',
            'ispass' => 'ispass',
            'isshow' => 'isshow',
            'isdel' => 'isdel',
            'isopen' => 'isopen',
            'other1' => 'other1',
            'other2' => 'other2',
            'other3' => 'other3',
            'other4' => 'other4',
            'other5' => 'other5',
            'other6' => 'other6',
            'other7' => 'other7',
            'other8' => 'other8',
            'other9' => 'other9',
            'other10' => 'other10',
            'imgurl' => 'imgurl',
            'attr1' => 'attr1',
            'attr2' => 'attr2',
            'attr3' => 'attr3',
            'attr4' => 'attr4',
            'attr5' => 'attr5',
            'attr6' => 'attr6',
            'attr7' => 'attr7',
            'attr8' => 'attr8',
            'attr9' => 'attr9',
            'attr10' => 'attr10',
            'mykeywords' => 'mykeywords',
            'mydescription' => 'mydescription'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'we_document';
    }

}