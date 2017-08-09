<?php
/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/8
 * Time: 18:00
 * Notice:请保持渴望成功的心
 */

namespace customClass\DB;


use customClass\ComTrait;
use customClass\DbInterface;

class Mysql implements DbInterface
{
    use ComTrait;

    public function connect()
    {
        try{
            $pdo = new \PDO("mysql:host=localhost;dbname=newmvc", "root", "root");
            return $pdo;
        }catch (\PDOException $exception) {
            print "Error!: " . $exception->getMessage() . "<br/>";
            die();
        }
    }

}