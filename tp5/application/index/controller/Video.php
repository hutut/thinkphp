<?php
namespace app\index\controller;
use think\Controller;

class Video extends Controller{
    public function index(){
        return 444;
    }
    public function play()
    {
        $this->assign('title','我学会了tp框架');
        return $this->fetch();
    }
}