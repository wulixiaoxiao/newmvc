<?php
/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/9
 * Time: 9:57
 * Notice:请保持渴望成功的心
 */
namespace customClass;

use customClass\DB\Mysql;
use customClass\DB\Redis;

class DbFactory
{
    static public function getDb($Dbtype = 'mysql')
    {
        switch ($Dbtype) {
            case 'mysql':
                return Mysql::getInstance()->connect();
            case 'redis':
                return Redis::getInstance()->connect();
            default:
                return null;
        }
    }

}