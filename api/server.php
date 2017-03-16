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
use Courser\Session;
use Courser\Server\HttpServer;
$session = new Session\Session();
Courser::used($session);

Courser::get('/article', ['Knight\Controller\Article' => 'list']);
Courser::get('/article/:id', ['Knight\Controller\Article' => 'detail']);
Courser::get('/article/:id', ['Knight\Controller\Article' => 'detail']);
Courser::post('/login', ['Knight\Controller\User' => 'login']);


Courser::group('/admin', function() {
    $this->use(function($req, $res) {
       // authorization
    });
    $this->get('/article', ['Knight\Controller\Article' => 'list']);
    $this->post('/article', ['Knight\Controller\Article' => 'create']);
    $this->put('/article/:id', ['Knight\Controller\Article' => 'edit']);
    $this->delete('/article/id', ['Knight\Controller\Article' => 'remove']);

});

$server = new HttpServer($config);
$server->start();