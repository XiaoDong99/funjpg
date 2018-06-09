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
                'post_type'   => 'post',
            ))
            ->field('Id, post_title, post_content')
            ->paginate(10);

        // dump($article);
        $this->assign('is_home', true);
        $this->assign('article', $article);
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        $res = Db::name()->where('id', $id)->setField();
        return 'hello,' . $name;
    }

    public function gitTest()
    {
        return '测试git';
    }
}
