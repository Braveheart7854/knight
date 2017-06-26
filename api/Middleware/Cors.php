<?php
namespace Knight\Middleware;

class Cors {
    public function __invoke($req, $res) {
        $res->header('Access-Control-Allow-Origin', '*');
        $res->header('Access-Control-Allow-Headers', 'Content-Type, Content-Length, Authorization, Accept, X-Requested-With');
        $res->header('Access-Control-Allow-Methods', 'PUT,POST,GET,DELETE,OPTIONS');
        $res->header('Content-Type', 'application/json;charset=utf-8');
        if(strtoupper($req->method) === "OPTIONS") {
            return $res->end();
        }
    }
}