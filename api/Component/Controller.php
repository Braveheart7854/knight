<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/20
 * @time      : 下午8:20
 */

namespace Knight\Component;


use Courser\Http\Request;
use Courser\Http\Response;

class Controller
{
    public $request;

    public $response;

    public function __construct(Request $req, Response $res)
    {
        $this->request = $req;
        $this->response = $res;
    }
}