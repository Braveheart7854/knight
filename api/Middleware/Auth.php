<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/22
 * @time      : 下午1:16
 */

namespace Knight\Middleware;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Parser;

class Auth
{
    /*
     * @var $config
     * */
    private $config = [];

    private $id = '';

    /*
     * @param array $config jwt config
     * */
    public function __construct($config)
    {
        $this->config = $this->format($config);
        $this->id = isset($config['id']) ? $config['id'] : '';
    }

    public function format($config)
    {
        var_dump('xxxxxxxxxx-----xxxxxxx', $config);
        if (!isset($config['issuer'])) {
            $config['issuer'] = 'https://github.com/racecourse';
        }
        if (!isset($config['audience'])) {
            $config['issuer'] = 'https://github.com/racecourse/crane';
        }
        if (!isset($config['expired'])) {
            $config['expired'] = 1800;
        }
        if (!isset($config['options'])) {
            $config['options'] = [];
        }
        if (!isset($config['key'])) {
            throw new \Exception('Session store must provide a private key');
        }

        return $config;
    }

    public function __invoke($req, $res)
    {
        $authorization = $req->header('authorization');
        if (!$authorization) {
            return $res->status(401)->json([
                'message' => 'unauthorization',
                'code' => 10401,
            ]);
        }
        $authorization = explode(' ', $authorization);
        if (count($authorization) !== 2) {
            return $res->status(401)->json([
                'message' => 'unauthorization',
                'code' => 10401,
            ]);
        }
        list($bearer, $token) = $authorization;
        if ($bearer !== 'Bearer') {
            return $res->status(401)->json([
                'message' => 'unauthorization',
                'code' => 10401,
            ]);
        }
        $user = $this->decode($token);
        if (!$user) {
            return $res->status(401)->json([
                'message' => 'unauthorization',
                'code' => 10401,
            ]);
        }
        $req->auth = $user;
    }

    public function decode($token)
    {
        $token = (new Parser())->parse((string)$token); // Parses from a string
        $created = $token->getClaim('iat');
        $time = time();
        if ($created > $time) return false;
        if ($token->getClaim('exp') <= $time) return false;
        if ($token->getHeader('jti') !== $this->id) return false;
        if ($token->getClaim('iss') !== $this->config['issuer']) return false;// will print "http://example.com"
        if ($token->getClaim('aud') !== $this->config['audience']) return false;

        return $token->getClaim('data');
    }

    public function encode($data)
    {
        $signer = $this->signer();
        $time = time();
        $token = (new Builder())->setIssuer($this->config['issuer'])
            ->setAudience($this->config['audience'])
            ->setId($this->id, true)
            ->setIssuedAt($time)
            ->setNotBefore($time)
            ->setExpiration($time + $this->config['expired'])
            ->set('data', $data)
            ->sign($signer, $this->config['key'])
            ->getToken();

        $this->token = $token;

        return $token->__toString();
    }

    public function signer()
    {
        return new Sha256();
    }
}