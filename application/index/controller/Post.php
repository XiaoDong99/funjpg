<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Post extends Controller
{
    public function index($id = '', $type = '')
    {
        $post = Db::field()
            ->table('wp_posts a, wp_term_relationships b,wp_term_taxonomy c')
            ->where('a.ID = b.object_id')
            ->where('b.term_taxonomy_id = c.term_taxonomy_id')
            ->where('post_status', 'publish')
            ->where('post_type', 'post')
            ->where('b.term_taxonomy_id', $type) // 搞笑图片
            ->where('c.taxonomy', 'category')
            ->where('ID', $id)
            ->find();
        $this->assign('post', $post);
        return $this->fetch();

    }
}
