<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-23
 * Time: 17:31
 */

namespace Common\Forms;


class CommonForm
{
    public static function datePicker($name = '', $value = '')
    {
        if (empty($name)) {
            return '';
        }
        if (empty($value)) {
            $value = date('Y-m-d');
        }
        return "<div class=\"input-group\">
                   <input type=\"text\" id=\"$name\" name=\"$name\" class=\"form-control\" value=\"$value\"/>
                   <span class=\"input-group-addon\">
                   <i class=\"ace-icon fa fa-calendar\"></i>
                   </span>
               </div>
               <script type=\"text/javascript\">
                  $(function () {
                    $('#$name').datepicker({
                        language: 'zh-CN',
                        autoclose: true,
                        todayHighlight: true,
                        showButtonPanel: true,
                        changeMonth: true,
                        changeYear: true,
                        dateFormat:'yy-mm-dd',
                        beforeShow:function(input){
                            $(input).css({zIndex:'1000'});
                        }
                    });    
                   });
               </script>
               ";

    }




}