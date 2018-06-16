<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {

        // 获取文章类表
        $article = Db::name('posts')
            ->where(array(
                'post_status' => 'publish',
                'post_type' => 'post',
            ))
            ->order('ID', 'desc')
            ->field('ID, post_title, post_content')
            ->paginate(10);
        // 获取分类
        $cates = Db::name('term_taxonomy')
            ->field('name')
            ->alias('a')
            ->join('terms b', 'a.term_id = b.term_id')
            ->where('a.taxonomy', 'category')
            ->select();

        dump($cates);
        // 测试git
        $this->assign('is_home', true);
        $this->assign('article', $article);
        return $this->fetch();
    }

}
