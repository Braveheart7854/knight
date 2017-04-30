<?php
/**
 * @license https://github.com/racecourse/courser/licese.md
 * @copyright Copyright (c) 2017
 * @author: bugbear
 * @date: 2017/4/29
 * @time: 下午3:40
 */

namespace Knight\StaticServer;


class StaticServer
{

    private $options = [
        'maxAge' => 0,
        ''
    ];

    private $root = '';

    public function __construct($root, $options = [])
    {
        $this->root = rtrim(realpath($root), '/');
    }

    public function formatOptions($options)
    {
        if (!is_array($options)) {
            throw new \Exception('static server options must be array');
        }
        if (!isset($options['maxAge'])) {
            $options['maxAge'] = 0;
        }
        if (!isset($options['index'])) {
            $options['index'] = ['index.html', 'index.htm'];
        }
    }

    public function __invoke($req, $res)
    {
        $path = $req->server['request_uri'];
        if ($req->method === 'get' || $req->method === 'head') {
            $res->status(405);
            $res->header('Allow', 'GET, HEAD');
            $res->header('Content-Length', '0');
            $res->end();
            return;
        }
        $path = rtrim($path);
        $path = $this->root . '/' . $path;
        if (is_dir($path)) {

        }
        if (is_file($path)) {
            $fd = fopen($path, 'r');
            $state = fstat($fd);
            $res->header('Content-Length', $state['size']);
            $res->header('Content-Length', $state['size']);
            $res->header('Content-Type', $req->header('Content-Type'));
        }
        $res->header('Content-Type', $req->header('Content-Type'));
        $res->header('Content-Type', 'text/html; charset=UTF-8');
        $res->header('Content-Length', '');
        $res->header('Content-Security-Policy', "default-src 'self'");
        $res->heaer('X-Content-Type-Options', 'nosniff');
        $res->end('');
    }

    public function error()
    {

    }

    public function sendIndex()
    {

    }

    public function notModify($req, $res)
    {

        $req->status(304);
        $req->end();
    }


    public function setHeader() {

    }


}