<?php
/**
 * @license   https://github.com/Init/licese.md
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
use Knight\Model\Photo;

Config::set($config);
$app = new App('dev');
$cors = new Cors();
$session = new Session($config['session']);
new Photo();
$app->used($session);
$app->any('*', $cors);
$app->notFound(function ($req, $res) {
    $res->status(404)->json(['message' => 'Not Found']);
});

$app->get('/test', function ($req, $res) {
    $res->send('fuck world');
});

$app->get('/', ['\Knight\Controller\Article' => 'posts']);

$app->get('/posts/:id', ['\Knight\Controller\Article' => 'detail']);
$app->get('/comments/:id', ['\Knight\Controller\Article' => 'comments']);
$app->post('/register', ['\Knight\Controller\Auth' => 'register']);
$app->post('/login', ['\Knight\Controller\Auth' => 'login']);

$app->get('/admin/article', ['\Knight\Controller\Admin' => 'article']);

$app->group('/admin', function () {
    $auth = new Auth(Config::get('jwt'), 'knight');
    $this->used($auth);
    $this->get('/article', ['\Knight\Controller\Article' => 'article']);
    $this->get('/article/:id', ['\Knight\Controller\Admin' => 'detail']);
    $this->delete('/article/:id', ['Knight\Controller\Admin' => 'drop']);
    $this->put('/article/:id', ['Knight\Controller\Admin' => 'edit']);
    $this->post('/article', ['Knight\Controller\Admin' => 'create']);
});
$app->exception(function($req, $res, $err) {
    $res->status(500)->json([
        'message' => $err->getMessage()
    ]);
    throw $err;
});

$server = new HttpServer($app);
$server->start();