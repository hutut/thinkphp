<?php
namespace  app\index\model;
use \think\Model;

//这里的Model一定要是大写的Model
class  Star  extends Model
{
    public function benDan ()
    {
        return 'hello  我是数据库明星表里面的小笨蛋';
    }
    //这个方法是自带的，你要获取谁就get+字段+attr
    public function getAgeAttr($value){
        $age = [1=>'女',2=>'男'];
        return $age[$value];
    }
}
