<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Category extends Controller
{
    public function tupian()
    {


        $this->assign('article', $article);
        return $this->fetch();
    }
}
