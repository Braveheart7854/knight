<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/16
 * @time      : 下午5:39
 */
namespace Knight\Controller;

use Knight\Model\Category;
use Knight\Model\Comment;
use Knight\Model\Post;
use Knight\Component\Controller;

class Article extends Controller
{

    public function posts()
    {
        $page = abs($this->request->getQuery('page'));
        $order = $this->request->getQuery('order');
        $keyword = $this->request->getQuery('q');
        $order = $order === 'archive' ? 'created' : 'id';
        $page = $page ?: 1;
        $pageSize = 10;
        $offset = ($page - 1) * $pageSize;
        $article = new Post();
        $condition = [
            'permission' => ['$lte' => 1],
        ];
        $options = [
            'order' => [$order => 'DESC'],
            'limit' => $pageSize,
            'offset' => $offset,
        ];
//        if ($keyword) {
//            $like = ''
//            $condition['$or'] =  [
//                'title' => $keyword,
//                'tags' => $keyword,
//            ]];
//        }
        echo "-------------------- \n";
        $list = $article->find($condition, $options);
        $list = $article->toArray($list);
        $total = $article->count($condition);
        $this->response->json([
            'message' => 'ok',
            'code' => '0',
            'data' => [
                'list' => $list,
                'total' => $total,
                'page' => $page,
                'pageSize' => $pageSize,
            ],
        ]);
    }

    /**
     * @security [Bearer]
     * @desc This method loads the homepage
     * @tags User
     * @param int $id path required
     * @return $ref Detail
     */
    public function detail()
    {
        $id = $this->request->getParam('id');
        $article = new Post();
        $condition = [
            'id' => $id,
            'permission' => ['$lte' => 1]
        ];
        $art = $article->findOne($condition);
        $art = $art->toArray();
        $this->response->json([
            'message' => 'ok',
            'code' => '0',
            'data' => $art,
        ]);
    }

    /**
     * get article list
     */
    public function article()
    {
        $page = abs($this->request->getQuery('page'));
        $page = $page ?: 1;
        $pageSize = 20;
        $offset = ($page - 1) * $pageSize;
        $session = $this->request->session;
        $userId = $session->userId;
        $article = new Post();
        $where = [
            'userId' => $userId,
        ];
        $option = [
            'offset' => $offset,
            'limit' => $pageSize,
            'order' => ['id' => 'DESC'],
        ];
        $articles = $article->find($where, $option);
        $list = $article->toArray($articles);
        $this->response->json([
            'message' => 'ok',
            'data' => [
                'page' => $page,
                'pageSize' => $pageSize,
                'list' => $list,
            ],
        ]);
    }

    /**
     * get article comment by article id
     *
     * @param int $id
     * @query int $page required
     * @query int $pageSize required
     * @return $ref comment
     */
    public function comments()
    {
        $id = $this->request->getParam('id');
        if (!$id) {
            return $this->response->withStatus(400)->json([
                'message' => 'param id required',
                'code' => 1,
            ]);
        }
        $page = abs($this->request->getQuery('page'));
        $page = $page ?: 1;
        $pageSize = 20;
        $offset = ($page - 1) * $pageSize;
        $comment = new Comment();
        $comments = $comment->find([
            'artId' => $id,
        ],
            [
                'limit' => $pageSize,
                'offset' => $offset,
            ]);
        $total = 0; // @todo
        $comments = $comment->toArray($comments);
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
            'data' => [
                'list' => $comments,
                'page' => $page,
                'pageSize' => $pageSize,
                'total' => $total,
            ],
        ]);
    }

    /**
     * @description create a new article
     * @tags article
     * @security Bearer
     * @body string $title article title
     * @body string $content article content
     * @body int $cateId
     * @body string $tags
     * @return mixed
     */
    public function create()
    {
        $response = $this->response;
        $title = $this->body('title');
        $content = $this->body('content');
        $tags = $this->body('body');
        $cateId = $this->body('cateId');
        if (!$title) {
            return $response
                ->withStatus(400)
                ->json([
                    'message' => 'title required',
                    'code' => 1,
                ]);
        }
        if (!$content) {
            return $response
                ->withStatus(400)
                ->json([
                    'message' => 'content can not empty',
                    'code' => 4,
                ]);
        }
        if ($cateId) {
            $category = new Category();
            $cate = $category->findById($cateId);
            if (!$cate) {
                return $response
                    ->withStatus(400)
                    ->json([
                        'message' => 'category not found',
                        'code' => 3,
                    ]);
            }
        }
        $post = [
            'tags' => $tags,
            'cateId' => $cateId,
            'title' => $title,
            'content' => $content,
            'created' => time(),
        ];
        $article = new Post();
        $article->insert($post);
        $this->response->json([
            'message' => 'ok',
            'code' => 0,
        ]);
    }

}