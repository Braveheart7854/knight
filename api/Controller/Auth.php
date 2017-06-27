<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/20
 * @time      : 下午8:19
 */

namespace Knight\Controller;

use Knight\Component\Controller;
use Knight\Model\User;
use Knight\Middleware\Auth as JWTAuth;
use Courser\Helper\Config;

class Auth extends Controller
{


    public function login()
    {
        $username = $this->request->body('username');
        $password = $this->request->body('password');
        if (!$username || !$password) {
            return $this->response
                ->status(400)
                ->json(['message' => 'param error', 'code' => 1]);
        }
        $user = new User();
        $userInfo = $user->findOne(['username' => $username]);
        if (!$userInfo) {
            return $this->response->status(404)->json([
                'message' => 'user not found',
                'code' => 2,
            ]);
        }
        $verify = password_verify($password, $userInfo['password']);
        if (!$verify) {
            return $this->response->status(401)->json([
                'message' => 'password incorrect',
                'code' => 3,
            ]);
        }
        $info = [
            'id' => $userInfo->id,
            'username' => $userInfo->username,
            'nickname' => $userInfo->nickname,
            'email' => $userInfo->email,
        ];
        $jwt = new JWTAuth(Config::get('jwt'));
        $token = $jwt->encode($info);
        unset($userInfo['password']);
        $this->response->json([
            'message' => 'ok',
            'data' => [
                'user' => $userInfo,
                'token' => $token,
            ]
        ]);
    }

    /*
     * route: /register
     * register
     * */
    public function register()
    {
        $username = $this->request->body('username');
        $password = $this->request->body('password');
        $email = $this->request->body('email');
        $confirm = $this->request->body('confirm');
        if (!$username) {
            return $this->response->status(404)->json([
                'message' => 'Illegal Username',
                'code' => 1,
            ]);
        }
        if (!$password || strlen($password) < 5 || $password !== $confirm) {
            return $this->response->status(400)->json([
                'message' => 'Password Incorrect',
                'code' => 2,
            ]);
        }
        $user = new User();
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->email = $email;
        $user->nickname = $username;
        $user->created = time();
        $user->save();
        $userInfo = $user->toArray();
        $this->response->json([
            'message' => 'ok',
            'data' => $userInfo,
        ]);
    }
}