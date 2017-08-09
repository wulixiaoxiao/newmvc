<?php
/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/8
 * Time: 14:15
 * Notice:请保持渴望成功的心
 */
error_reporting(1);
require 'customClass/Comments.php';
require 'vendor/autoload.php';

$c = ucwords($_REQUEST['c']);
$a = ucwords($_REQUEST['a']);

try{
    $cPath = "Home\Controllers\\".$c.'Controller';
    $controller = new $cPath();

    $class = new ReflectionClass($cPath);
    $isMethod = $class->hasMethod($a);
    if ($isMethod) {
        $controller->$a();
    } else {
        echo "action {$a} is not exists";
    }
}catch (Exception $exception) {
    dd($exception);
}




