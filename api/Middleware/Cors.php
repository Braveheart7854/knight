<?php
namespace Knight\Middleware;

class Cors {
    public function __invoke($req, $res) {
        $res->header('Access-Control-Allow-Origin', '*');
        $res->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $res->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
        if($req->method == "OPTIONS") {
            $res->finish = true;
            return $res->send();
        }
    }
}