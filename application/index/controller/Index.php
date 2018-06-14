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

        // dump($article);

        // // 妹子搞笑图片
        // $meizi_pics = Db::name('posts')
        //     ->alias('a')
        //     ->leftJoin('term_relationships b', 'a.ID = b.object_id')
        //     ->leftJoin('term_taxonomy c', 'b.object_id = c.term_taxonomy_id')
        //     ->leftJoin('terms d', 'c.term_taxonomy_id = d.term_id')
        //     ->where('c.taxonomy', 'post_tag')
        //     ->where('d.name', '妹子')
        //     ->where('a.post_status', 'publish')
        //     ->where('a.post_type', 'post')
        //     ->limit(5)
        //     ->select();
        // dump($meizi_pics);

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

    public function tupian()
    {
        // $tupian = Db::name('posts')
        //     ->alias('a')
        //     ->join('term_relationships b', 'a.ID = b.object_id')
        //     ->join('term_taxonomy c', 'b.object_id = c.term_id')
        //     ->join('terms d', 'c.term_id = d.term_id')
        //     // ->where('d.name', '搞笑图片')
        //     // ->limit(10)
        //     ->select();
        // $tupian = Db::query("select ID,post_title,post_date,post_name from wp_posts,wp_term_relationships,wp_term_taxonomy where ID=object_id and wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id and post_type='post' and post_status = 'publish' and wp_term_relationships.term_taxonomy_id = 7 and taxonomy = 'category' order by ID desc LIMIT 20");
        //  SELECT * FROM `wp_posts` `a`,`wp_term_relationships` `b`,`wp_term_taxonomy` `c` WHERE `a`.`ID` = 'b.object_id' AND `b`.`term_taxonomy_id` = 'c.term_taxonomy_id' AND `b`.`term_taxonomy_id` = '7' AND `c`.`taxonomy` = 'category' AND `post_type` = 'post' AND `post_status` = 'publish' LIMIT 10
        $tupian = Db::table('wp_posts')
            ->where('ID', 16)
            // ->where('b.term_taxonomy_id', 'c.term_taxonomy_id')
            // ->where('b.term_taxonomy_id', 7)
            // ->where('c.taxonomy', 'category')
            // ->where('a.post_type', 'post')
            // ->where('a.post_status', 'publish')
            // ->limit(10)
            ->select();
        dump($tupian);
    }

    public function hello($name = 'ThinkPHP5')
    {
//        $res = Db::name()->where('id', $id)->setField();
        return 'hello,' . $name;
    }

    public function gitTest()
    {
        return '测试git';
    }

}
