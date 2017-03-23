<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/22
 * @time      : 下午1:16
 */

namespace Knight\Middleware;

use Courser\Interfaces\StoreInterface;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Parser;

class Auth
{
    public function __construct()
    {


    }

    public function __invoke($req, $res)
    {
        $authorization = $req->header('Authorization');
        if($authorization) return null;
        $authorization = explode(' ', $authorization);
        if(count($authorization) !== 2) return null;
        list($bearer, $token) = $authorization;
        if($bearer !== 'Bearer') return null;
        $user = $this->decode($token);
        if(!$user) return null;
        $req->auth = $user;
    }

    protected function decode($token)
    {
        return [];
    }
}