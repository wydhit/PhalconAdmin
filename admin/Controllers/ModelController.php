<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-27
 * Time: 13:06
 */

namespace Admin\Controllers;


use Common\Models\McTest;
use Common\Models\WeUser;

class ModelController extends AdminController
{
    public function indexAction()
    {
        return $this->render();
    }

    public function createAction()
    {
        $allTables=$this->db->fetchAll("show tables");
        foreach ($allTables as $allTable) {
            $this->createTable($allTable['Tables_in_magiclamp']);
        }
        var_dump($allTables);

        
    }

    public function createTable($tableName='')
    {
        $modelDir=COMMON_PATH.'/Models';
        $template=$modelDir.'/template.php';
        $tmpStr=file_get_contents($template);

        $className=$this->convertUnderline($tableName);
        $columns= $this->db->describeColumns($tableName);

        $comments=$this->getComments($tableName);
        /*类名 表名*/
        $tmpStr=str_replace('className',$className,$tmpStr);
        $tmpStr=str_replace('tableName',$tableName,$tmpStr);
        /*字段*/
        $fields=[];
        foreach ($columns as $column) {
            $fieldName=$column->getName();
            if(!empty($comments[$fieldName])){
                $commentStr="    /*{$comments[$fieldName]}*/\r\n";
            }else{
                $commentStr='';
            }

            $fields[]="$commentStr    public $".$column->getName().";";
        }
        $tmpStr=str_replace('/*$fields*/',join("\r\n",$fields),$tmpStr);
        /*扩展*/
        $tmpStr=str_replace('/*$extends*/','extends BaseModel',$tmpStr);
        $outFile=$modelDir.'/'.$className.'.php';

        if(file_exists($outFile)){
            if($this->request->get($className)){
                file_put_contents($outFile,$tmpStr);
                echo '生成完毕<a href="/model">继续下一个</a>';
            }else{
                echo $className.'已存在';
                echo "<a href='?$className=1'>确认覆盖</a>";
            }
        }else{
            file_put_contents($outFile,$tmpStr);
        }

    }
    

    public function getComments($tableName)
    {
        $r=[];
        $zs=$this->db->fetchAll("show full columns from $tableName");
        foreach ($zs as $z) {
            $r[$z['Field']]=$z['Comment'];
        }
        return $r;
    }

    public function testAction()
    {
      $t=McTest::findFirst(3);
      $t->age=20;
      $t->name='ff6655566';
      $t->save();
      var_dump($t->getErrInput());
    }
    private function convertUnderline($str)
    {
        $str = preg_replace_callback('/([-_]+([a-z]{1}))/i',function($matches){
            return strtoupper($matches[2]);
        },$str);
        return ucfirst($str);
    }
    
}