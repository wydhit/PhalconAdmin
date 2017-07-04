<?php

namespace Common\Core;

use \Phalcon\Http\Response\Cookies as BaseCookie;


class Cookies extends BaseCookie
{
    private $expire = 0;
    private $path = "/";
    private $secure = null;
    private $domain = null;
    private $httpOnly = null;
    const IS_ARRAY = '!@$#$@!';

    /**
     * 封装的父级set 增加参数统一默认值  cookie值可以是数组
     * @param string $name
     * @param null $value
     * @param null $expire
     * @param null $path
     * @param null $secure
     * @param null $domain
     * @param null $httpOnly
     * @return \Phalcon\Http\Response\Cookies
     */
    public function set($name, $value = null, $expire = null, $path = null, $secure = null, $domain = null, $httpOnly = null)
    {
        if (is_array($value)) {
            $value = self::IS_ARRAY . serialize($value);
        }
        ($expire === null) && $expire = $this->expire;
        ($path === null) && $path = $this->path;
        ($secure === null) && $secure = $this->secure;
        ($domain === null) && $domain = $this->domain;
        ($httpOnly === null) && $httpOnly = $this->httpOnly;
        return parent::set($name, $value, $expire, $path, $secure, $domain, $httpOnly);
    }

    /**
     * 直接获取Cookie值 省去getValue() 同时兼任cookie是数组的情况
     * @param $name
     * @return mixed
     */
    public function getValue($name)
    {
        $value = parent::get($name)->getValue();
        if (strpos($value, self::IS_ARRAY) === 0) {
            return unserialize(str_replace(self::IS_ARRAY, '', $value));
        } else {
            return $value;
        }
    }

    /**
     * 批量设置Cookie
     * @param array $array
     * @param null $expire
     * @param null $path
     * @param null $secure
     * @param null $domain
     * @param null $httpOnly
     */
    public function setAll($array = [], $expire = null, $path = null, $secure = null, $domain = null, $httpOnly = null)
    {
        if (empty($array) || !is_array($array)) {
            return;
        }
        foreach ($array as $k => $v) {
            $this->set($k, $v, $expire, $path, $secure, $domain, $httpOnly);
        }
    }

    /*获取所有Cookie*/
    public function getAll()
    {
        return $this->_cookies;
    }

    /**
     * 获取所有Cookie 的value
     * @return array
     */
    public function getAllValue()
    {
        $all = $this->getAll();
        if (empty($all)) {
            return [];
        }
        $new = [];
        foreach ($all as $name => $value) {
            $new[$name] = $this->getValue($name);
        }
        return $new;
    }

    /**
     * @param int $expire
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    }

    /**
     * @param int $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @param int $secure
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;
    }

    /**
     * @param int $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @param int $httpOnly
     */
    public function setHttpOnly($httpOnly)
    {
        $this->httpOnly = $httpOnly;
    }

}