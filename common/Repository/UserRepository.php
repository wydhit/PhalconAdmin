<?php

namespace Common\Repository;

use Common\Models\WeUser;

class UserRepository extends BaseRepository
{

    public function AddUser($userData=[])
    {
        
    }
    public function getTopUser()
    {
        return WeUser::find([
            'id>10'
        ]);
    }

    /**
     * 获取管理员信息
     * @return mixed
     */
    public function getAdminInfo()
    {
        return $this->session->get($this->SESSION_BASE . 'adminInfo');
    }
    /**
     * 保存管理员登录信息
     * @param array $value
     */
    public function setAdminInfo($value = [])
    {
        $this->session->set($this->SESSION_BASE . 'adminInfo', $value);
    }

}