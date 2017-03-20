<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/16
 * @time      : 下午5:39
 */
namespace Knight\Controller;

use Knight\Model\User;
use Knight\Model\Post;

class Article
{
    public $request;

    public $response;

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function posts()
    {
//        $session = $this->request->session;
//        $session->id = 123;
//        $session->save();
        $article = new Post();
        $condition = [
            'id' => ['$gt' => 0],
            'created' => ['$gt' => 1],
            'isShow' => 1,
        ];
        $options = [
            'order' => ['id' => 'desc'],
        ];
        $list = $article->find($condition, $options);
        $this->response->json([
            'message' => 'ok',
            'code' => '0',
            'data' => $list,
        ]);
    }

    public function detail()
    {
        $id = $this->request->params['id'];
        $article = new Post();
        $condition = [
            'id' => $id,
            'isShow' => 1
        ];
        $list = $article->findOne($condition);
        $this->response->json([
            'message' => 'ok',
            'code' => '0',
            'data' => $list,
        ]);
    }
}