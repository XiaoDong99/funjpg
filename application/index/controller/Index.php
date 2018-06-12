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
            ->order('ID', 'desc')
            ->field('ID, post_title, post_content')
            ->paginate(10);

        // dump($article);

        // 妹子搞笑图片
        $meizi_pics = Db::name('posts')
            ->alias('a')
            ->leftJoin('term_relationships b', 'a.ID = b.object_id')
            ->leftJoin('term_taxonomy c', 'b.object_id = c.term_taxonomy_id')
            ->leftJoin('terms d', 'c.term_taxonomy_id = d.term_id')
            ->where('c.taxonomy', 'post_tag')
            ->where('d.name', '妹子')
            ->where('a.post_status', 'publish')
            ->where('a.post_type', 'post')
            ->limit(5)
            ->select();
        dump($meizi_pics);
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
