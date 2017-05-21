<?php
/**
 * @license   MIT
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/16
 * @time      : 下午1:16
 */
define('APP_ROOT', dirname(dirname(__FILE__)));
require APP_ROOT . '/vendor/autoload.php';
$config = require APP_ROOT . '/api/config/index.php';

use Courser\App;
use Courser\Session\Session;
use Courser\Server\HttpServer;
use Knight\Middleware\Cors;
use Knight\Middleware\Auth;
use Courser\Helper\Config;

Config::set($config);
$app = new App('dev');
$cors = new Cors();
$session = new Session($config['session']);
$app->used($session);
$app->any('*', $cors);
$app->notFound(function ($req, $res) {
    $res->status(404)->json(['message' => 'Not Found']);
});
$app->exception(function ($req, $res, Exception $err) {
   $res->status(500)->json([
       'message' =>'server error',
       'code' => $err->getMessage(),
   ]);
});


$app->get('/posts', [\Knight\Controller\Article::class => 'posts']);
$app->get('/posts/:id', [\Knight\Controller\Article::class => 'detail']);
$app->get('/comments/:id', [\Knight\Controller\Article::class => 'comments']);
$app->get('category', [\Knight\Controller\Admin::class => 'category']);
$app->post('/register', [\Knight\Controller\Auth::class => 'register']);
$app->post('/login', [\Knight\Controller\Auth::class => 'login']);
$app->get('/admin/article', [\Knight\Controller\Admin::class => 'article']);
$app->group('/admin', function () {
    $auth = new Auth(Config::get('jwt'), 'knight');
    $this->used($auth);
    $this->get('/survey', [\Knight\Controller\Admin::class => 'survey']);
    $this->get('/article', ['\Knight\Controller\Article' => 'article']);
    $this->get('/article/:id', ['\Knight\Controller\Admin' => 'detail']);
    $this->delete('/article/:id', ['Knight\Controller\Admin' => 'drop']);
    $this->put('/article/:id', ['Knight\Controller\Admin' => 'edit']);
    $this->post('/article', ['Knight\Controller\Admin' => 'create']);
});

$server = new HttpServer($app);
$server->start();