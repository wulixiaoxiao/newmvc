<?php
/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/9
 * Time: 14:12
 * Notice:请保持渴望成功的心
 */

namespace customClass;

trait ComTrait
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
            return self::$instance;
        }
        if (self::$instance instanceof self) {
            return self::$instance;
        }
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

}