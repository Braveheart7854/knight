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

class Auth extends Controller
{


    public function login()
    {
        $username = $this->request->body('username');
        $password = $this->request->body('password');
        if (!$username || !$password) {
            return $this->response
                ->status(400)
                ->json(['message' => 'Param Error', 'code' => 1]);
        }
        $user = new User();
        $userInfo = $user->findOne(['username' => $username]);
        if (!$userInfo) {
            return $this->response->status(404)->json([
                'message' => 'User Not Found',
                'code' => 2,
            ]);
        }

        $verify = password_verify($password, $userInfo['password']);
        if (!$verify) {
            return $this->response->status(401)->json([
                'message' => 'Password Incorrect',
                'code' => 3,
            ]);
        }
        $session = $this->request->session;
        $session->id = $userInfo->id;
        $session->username = $userInfo->username;
        $session->save();
        $this->response->json([
            'message' => 'ok',
            'data' => $userInfo->toArray(),
        ]);
    }

    public function register()
    {
        $username = $this->request->body('username');
        $password = $this->request->body('password');
        $email = $this->request->body('email');
        $confirm = $this->request->body('confirm');
        if(!$username) {
            return $this->response->status(404)->json([
                'message' => 'Illegal Username',
                'code' => 1,
            ]);
        }
        if(!$password || strlen($password) < 5 || $password !== $confirm) {
            return $this->response->status(400)->json([
                'message' => 'Password Incorrect',
                'code' => 2,
            ]);
        }
        $user = new User();
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->email = $email;
        $user->created = time();
        $user->save();
        $userInfo = $user->toArray();
        $this->response->json([
            'message' => 'ok',
            'data' => $userInfo,
        ]);

    }
}