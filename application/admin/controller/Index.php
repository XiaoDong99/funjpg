<?php

namespace app\admin\controller;

class Index extends Base
{
    public function index()
    {
        echo config('view_path') . 'index.html';
        exit;
        return $this->fetch(config('view_path') . 'index.html');
    }

}
