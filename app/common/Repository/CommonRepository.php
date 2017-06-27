<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-22
 * Time: 9:35
 */

namespace Common\Repository;


class CommonRepository extends BaseRepository
{
    public function setLoginFromUrl($url=null)
    {
        if($url===null){
            $url=$this->request->getURI();
        }
        $this->session->set($this->SESSION_BASE.'loginFromUrl',$url);
    }

    public function getLoginFromUrl()
    {
        return $this->session->get($this->SESSION_BASE.'loginFromUrl');

    }

}