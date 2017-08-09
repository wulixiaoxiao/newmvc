<?php
/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/9
 * Time: 9:53
 * Notice:请保持渴望成功的心
 */

namespace customClass\DB;

use customClass\ComTrait;
use customClass\DbInterface;

class Redis implements DbInterface
{
    use ComTrait;

    public function connect()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        dd(1);
        dd($redis);
        return $redis;
    }


}