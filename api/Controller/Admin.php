<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/4/2
 * @time      : 下午4:38
 */

namespace Knight\Controller;

use Knight\Component\Controller;
use Knight\Model\Post;
use Knight\Model\Category;

class Admin extends Controller
{
    public function article()
    {
        $pageSize = 20;
        $page = $this->request->param('page');
        $page = abs($page) ?: 1;
        $article = new Post();
        $posts = $article->findAll();
        $list = [];
        foreach ($posts as $key => $art) {
            $list[] = $art->attr;
        }
        $ret = [
            'total' => 10, // @fixme
            'page' => $page,
            'pageSize' => $pageSize,
            'list' => $list,
        ];
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
            'data' => $ret,
        ]);
    }

    public function create()
    {
        $request = $this->request;
        $response = $this->response;
        $title = $request->body('title');
        $content = $request->body('content');
        $tags = $request->body('body');
        $cateId = $request->body('cateId');
        if (!$title) {
            return $response->status(400)->json([
                'message' => 'title required',
                'code' => 1,
            ]);
        }
        if (!$content) {
            return $response->status(400)->json([
                'message' => 'content can not empty'
            ]);
        }
        $post = [
            'title' => $title,
            'content' => $content,
            'tags' => implode(',', $tags),
            'cateId' => $cateId,
        ];
        $article = new Post();
        $article->insert($post);
        $this->response->json([
            'code' => 0,
            'message' => 'ok',
        ]);
    }

    public function category()
    {
        $category = new Category();
        $cate = $category->findAll();
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
            'list' => $cate,
        ]);
    }

}