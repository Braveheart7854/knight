<?php
/**
 * @license https://github.com/racecourse/courser/license.md
 * @copyright Copyright (c) 2017
 * @author: bugbear
 * @date: 2017/6/17
 * @time: 下午6:14
 */

define('APP_ROOT', dirname(dirname(__FILE__)));
require APP_ROOT . '/vendor/autoload.php';

use Courser\Helper\Config;
use Courser\Helper\Env;

Env::add(['env' => 'production']);
Config::load(APP_ROOT . '/api/config');
require APP_ROOT . '/api/server.php';