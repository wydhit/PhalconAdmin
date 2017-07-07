<?php
/*
 * 只初始化表单用
 * 验证 等逻辑处理在这里不处理
 *
 * 处理与用户交互
 * 1、添加新信息 并需要提交到数据库 如：添加用户 和model 紧密关联
 * 2、列表搜索表单 视图里直接tag输出 对于常用的比如时间选择 id 封装在CommonTags 里

*/

namespace Common\Forms;
use Phalcon\Forms\Form;
class BaseForm extends Form
{


}