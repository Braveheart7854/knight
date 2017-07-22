<?php
namespace Knight\Middleware;

class Cors {
    public function __invoke($req, $res) {
        $res->withHeader('Access-Control-Allow-Origin', '*');
        $res->withHeader('Access-Control-Allow-Headers', 'Content-Type, Content-Length, Authorization, Accept, X-Requested-With');
        $res->withHeader('Access-Control-Allow-Methods', 'PUT,POST,GET,DELETE,OPTIONS');
        $res->withHeader('Content-Type', 'application/json;charset=utf-8');
        if(strtoupper($req->getMethod()) === "OPTIONS") {
            return $res->end();
        }
    }
}