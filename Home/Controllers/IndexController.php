<?php

/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/8
 * Time: 17:08
 * Notice:请保持渴望成功的心
 */

namespace Home\Controllers;

use customClass\DbFactory;

class IndexController
{
    public function index()
    {
        $db = DbFactory::getDb('mysql');
        dd($db);
    }
}