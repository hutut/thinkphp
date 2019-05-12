<?php

namespace app\index\controller;
use app\index\model\Star;
use \think\Controller;

class Index  extends Controller
{

    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    //1：查询
    public  function  demo1()
    {
        $star = new Star();
        $info = $star->find()->toArray();      //对象里面是对象
//        $all = $star->select();      //数组里面是对象  二维数组不可以用箭头访问
//        $array = $info->toArray();
//        $json = $info->toJSON();
        dump($info->getData('age'));
        dump($star->benDan());
    }

    public  function  demo2(Star $star)
    {
        //门面模式
        $info = Star::find();
        dump($info);
        $info = Star::select();
        dump($info);
        dump($star->benDan());
    }

//    2:添加
    public function add()
    {
        $star = new Star();
        $star->name = '黄渤';
        $star->age = 40;
        $star->sex = 1;
        $star->allowField(true)->save();   //这样的话就算没有sex也不会报错
    }

    public function  addAll()
    {
        $star = new Star();
        $list = array(['name'=>'朱亚文','age'=>35],['name'=>'周迅','age'=>35]);
        $star->saveAll($list);
    }


    //告诉他是不是更新
    public function isUp()
    {
        $star =new Star();
        $star->name = '孙红雷';
        $star->age = 1;

        //过滤非数据表里面的字段
        $star->allowField(true)->save();

        $star->name = '罗志祥';
        //不是更新，是插入
        $star->isUpdate->save();
    }


    public function helper()
    {
        $star = model('Star');
        $star->data([
            'name'=> '范冰冰',
            'age'=>1
        ]);
        $star->save();
    }

//    3：更新
    public function  up1()
    {
        $star = Star::get(1);
        $star->name  = '陈小春';
        $star->save();
    }
    public function  up2()
    {
        $star =new Star();
        $star->save(['name'=>'应采儿'],['id'=>1]);
    }
    public function  up3()
    {
        $user = new Star();
//        $user->where('id',1)->update(['name'=>'陈小春']);
        $user::where('id',1)->update(['name'=>'应采儿']);
    }

//    4:删除
    public function del1()
    {
        $star = Star::get(7);
        $star->delete();
    }

    public function del2()
    {
        Star::destroy(1);
        Star::destroy('1,2,3');
        Star::destroy([1,2,3]);
    }
    public function del3()
    {
        Star::destroy(['name'=>'应采儿']);
    }

}




