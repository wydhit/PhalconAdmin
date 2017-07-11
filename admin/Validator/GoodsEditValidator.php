<?php

namespace Admin\Validator;

use Common\Core\BaseValidator;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Alnum;
use Phalcon\Validation\Validator\Alpha;
use Phalcon\Validation\Validator\Date;
use Phalcon\Validation\Validator\Digit;
use Phalcon\Validation\Validator\File;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\ExclusionIn;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Url;
use Phalcon\Validation\Validator\CreditCard;

class GoodsEditValidator extends BaseValidator
{
    /**
     * 增加验证规则
     */
    public function initialize()
    {
        $this->setDefaultMessages($this->defaultMessages);
        $this->add('title', new PresenceOf());
        $this->add('pass', new Confirmation(['with' => 'passed']));

        $this->add(['email', 'ic'], new PresenceOf());
        $this->add(['email', 'ic', 'title'], new StringLength([
            'max' => 10,
            'min' => 3
        ]));
    }
}


