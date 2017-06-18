<?php
namespace Knight\Middleware;

class Cors {
    public function __invoke($req, $res) {
        echo "=+++++++++" .PHP_EOL;
        $res->header('Access-Control-Allow-Origin', '*');
        $res->header('Access-Control-Allow-Headers', 'Content-Type, Content-Length, Authorization, Accept, X-Requested-With');
        $res->header('Access-Control-Allow-Methods', 'PUT,POST,GET,DELETE,OPTIONS');
        $res->header('Content-Type', 'application/json;charset=utf-8');
        if(strtoupper($req->method) === "OPTIONS") {
            echo '--------->' . PHP_EOL;
            return $res->end();
        }
    }
}