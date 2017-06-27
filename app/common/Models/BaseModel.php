<?php

namespace Common\Models;

use Common\Traits\ErrMsg;
use \Phalcon\Mvc\Model;

class BaseModel extends Model
{
   use ErrMsg;
}