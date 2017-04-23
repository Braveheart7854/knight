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

use Courser\Courser;
use Courser\Session\Session;
use Courser\Server\HttpServer;
use Knight\Middleware\Cors;
use Knight\Middleware\Auth;
use Courser\Helper\Config;

Config::set($config);
$app = new Courser('dev');
$cors = new Cors();
$session = new Session($config['session']);
$app->used($session);
$app->any('*', $cors);
$app->notFound(function($req, $res) {
    $res->status(404)->json(['message' => 'Not Found']);
});

$app->get('/test', function($req, $res) {
   $res->send('fuck world');
});

$app->get('/', ['\Knight\Controller\Article' => 'posts']);

$app->get('/posts/:id', ['\Knight\Controller\Article' => 'detail']);
$app->get('/comments/:id', ['\Knight\Controller\Article' => 'comments']);
$app->post('/register', ['\Knight\Controller\Auth' => 'register']);
$app->post('/login', ['\Knight\Controller\Auth' => 'login']);

$app->get('/admin/article', ['\Knight\Controller\Admin' => 'article']);

$app->group('/admin', function() {
   $auth = new Auth(Config::get('jwt'), 'knight');
   $this->used($auth);
   $this->get('/article', ['\Knight\Controller\Article' => 'article']);
   $this->get('/article/:id', ['\Knight\Controller\Article' => 'detail']);
});
/*
$ref = (new ReflectionClass('Knight\Controller\Article'))->getMethod('detail')->getdoccomment();
$pattern = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";
preg_match_all($pattern, $ref, $matches, PREG_PATTERN_ORDER);
var_dump($matches);
$doc = $matches[0];
$path = '/post/{id}';
$json = [
    $path => [],
];
foreach ($doc as $item) {
    $item = explode(' ', $item);
    var_dump($item);
    if($item[0] === '@security') {
        $json[$path]['security'] = [
            $item[1] => []
        ];
    }
    if($item[0] === '@desc') {
        $json[$path]['description'] = $item[1];
    }
    if($item[0] === '@tags') {
        $json[$path]['tags'] = [ $item[1] ];
    }
    if($item[0] === '@param') {
        $json[$path]['parameters'][] = [
            'type' => $item[1],
            'name' => $item[2],
            'in' => $item[3],
            'required' => $item[4],
            'description' => 'test'
        ];
    }
}
var_dump($json);
*/
$server = new HttpServer($app);
$server->start();