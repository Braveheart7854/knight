<?php
/**
 * @license https://github.com/racecourse/courser/licese.md
 * @copyright Copyright (c) 2017
 * @author: bugbear
 * @date: 2017/5/7
 * @time: 下午2:38
 */

namespace Knight\Controller;

use Knight\Component\Controller;
use Knight\Model\Comment as Discuss;
use Knight\Model\Post;

class Comment extends Controller
{

    /**
     * @throws \Exception
     */
    public function comments() {
        $artId = $this->request->param('artId');
        $page = $this->request->query('page');
        $page = abs(intval($page)) ?: 1;
        $pageSize = 20;
        $comment = new Discuss();
        $article = (new Post())->findById($artId);
        if(!$article || $article->permission >1) {
            return $this->response->status(400)->json([
                'message' => 'Article not found',
                'code' => 1,
            ]);
        }
        $where = [
            'artId' => $artId,
        ];
        $options = [
            'skip' => ($page - 1) * $pageSize,
            'limit' => $pageSize,
            'orderBy' => ['created' => 'desc'],
        ];
        $list = $comment->find($where, $options);
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
            'data' => [
                'list' => $list,
                'total' => 0,
                'page' => $page,
                'pageSize' => $pageSize,
            ]
        ]);
    }

    /**
     * @throws \Exception
     */
    public function created()
    {
        $artId = $this->request->param('artId');
        $content = $this->request->body('content');
        $email = $this->request->body('email');
        $site = $this->request->body('site');
        $username = $this->request->body('username');
        if ($username || $content) {
            return $this->response->status(400)->json([
                'message' => '参数错误',
                'code' => 1,
            ]);
        }
        $check = (new Post())->findById($artId);
        if (!$check) {
            return $this->request->status(400)->json([
                'message' => '文章不存在',
                'code' => 2,
            ]);
        }
        $data = [
            'artId' => $artId,
            'email' => $email,
            'site' => $site,
            'username' => $username,
            'content' => $content,
            'created' => time(),
        ];
        $comment = new Discuss();
        $comment->insert($data);
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
        ]);
    }
}