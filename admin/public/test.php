<?php
define('APP_DEBUG',false);
ini_set('display_errors',1);
//set_error_handler('DoError');
set_exception_handler('DoException');
$a=error_reporting();
echo $aaa;



try {
    echo $b();
} catch (Error $e) {
    //var_dump($e);
}

echo "<hr>";

function DoException(Throwable $ex){
   // var_dump($ex);
}

function DoError( int $errno , string $errstr , string $errfile , int $errline , array $errcontext ){
    /*开发环境 全部抛出*/
    /*正式环境不抛出*/
    if(defined(APP_DEBUG) && APP_DEBUG){
        echo ';';
        throw new ErrorException($errstr,$errno);
    }else{

    }


}

class test {

    public $u='默认';
    public function t()
    {
        $use=$this->u;
        return function ($aa='d') use($use){
            return $aa.$use;
        };
    }

    public function callMethod($method,$param=[])
    {
        if(empty($method)){
            throw new Exception('method is Empty!');
        }
        $reflection= new \ReflectionMethod($this,$method);
        $rs=$reflection->getParameters();
        foreach ($rs as $r ){
            $r->getClass()->name;
        }
        return $reflection->invokeArgs($this,$param);
    }

    public function callStaticMethod($method,$param=[])
    {
        if(empty($method)){
            throw new Exception('method is Empty!');
        }
        $reflection= new \ReflectionMethod($this,$method);
        $rs=$reflection->getParameters();
        foreach ($rs as $r ){
            $r->getClass()->name;
        }
        return $reflection->invokeArgs($this,$param);
    }
}
//$t= new test();
//$f=$t->t();
//echo $f('aaa');
//echo '<hr>';
//$t->u="new UU";
//$f=$t->t();
//echo $f('aaa');
//echo '<hr>';echo '<pre>';
//
//
//class aa {
//    function __invoke()
//    {
//
//    }
//}



