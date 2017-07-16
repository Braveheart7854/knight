<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/18
 * @time      : 下午5:48
 */
namespace Knight\Component;

use Mews\Model;
use Ben\Config;

class Dao extends Model
{
    protected $table = '';

    public function __construct()
    {
        parent::__construct();
        $config = Config::get('db');
        $this->init($config);
    }

}