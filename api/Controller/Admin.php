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

    public function update()
    {
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $tags = $this->request->param('tags');
        $content = $this->request->param('content');
        $cateId = $this->request->param('cateId');
        $time = $this->request->param('time');
        if ($time) {
            $time = mktime($time);
        }
        if (!$title || !$content) {
            return $this->response
                ->status(400)
                ->json([
                    'message' => 'content && title are required',
                    'code' => 1,
                ]);
        }
        $post = new Post();
        $art = $post->findById($id);
        if(!$art) {
            return $this->response->status(400)->json([
                'message' => 'article not found',
                'code' => 2,
            ]);
        }
        $art->title = $title;
        $art->content = $content;
        $art->cateId = $cateId;
        $art->tags = $tags;
        $art->update();
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
        ]);
    }

    public function drop()
    {
        $id = $this->request->param('id');
        if (!intval($id)) {
            return $this->response
                ->status(400)
                ->json([
                    'message' => 'Illegal ID',
                    'code' => 1,
                ]);
        }
        $post = new Post();
        $art = $post->findById($id);
        if (!$art) {
            return $this->response->status(400)->json([
                'message' => 'article not found',
                'code' => 2,
            ]);
        }
        $art->delete();
        $this->response->json([
           'message' => 'ok',
            'code' => 0,
        ]);
    }

    public function detail() {
        $id = $this->request->param('id');
        if (!intval($id)) {
            return $this->response
                ->status(400)
                ->json([
                    'message' => 'Illegal ID',
                    'code' => 1,
                ]);
        }
        $post = new Post();
        $art = $post->findById($id);
        if (!$art) {
            return $this->response->status(400)->json([
                'message' => 'article not found',
                'code' => 2,
            ]);
        }
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
            'data' => $art,
        ]);
    }

}