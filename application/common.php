<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use \think\Db;
// 应用公共文件
function getCategorys()
{
	$cat_list = \think\Db::name('terms')->select();
	return $cat_list;
}

function getArticles()
{
    $article = Db::field('a.ID, a.post_title, a.post_content')
        ->table('wp_posts a, wp_term_relationships b,wp_term_taxonomy c')
        ->where('a.ID = b.object_id')
        ->where('b.term_taxonomy_id = c.term_taxonomy_id')
        ->where('post_status', 'publish')
        ->where('post_type', 'post')
        ->where('b.term_taxonomy_id', 7)
        ->where('c.taxonomy', 'category')
        ->order('a.ID desc')
        ->paginate(10);
}