<?php
/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/10
 * Time: 11:49
 * Notice:请保持渴望成功的心
 */

Interface SuperMakeInterface
{
    public function activate();
    public function boom($size);
}

// 钢铁侠
class PowerA implements SuperMakeInterface
{
    public function activate()
    {
        echo "获得钢铁侠能力<br>";
    }
    public function boom($size)
    {
        echo "使用{$size}毫米激光<br>";
    }
}

// 孙悟空
class PowerB implements SuperMakeInterface
{
    public function activate()
    {
        echo "获得孙悟空能力<br>";
    }

    public function boom($size)
    {
        echo "使用{$size}米金箍棒<br>";
    }
}

// 哪吒
class PowerC implements SuperMakeInterface
{
    public function activate()
    {
        echo "获得哪吒能力<br>";
    }
    public function boom($size)
    {
        echo "使用{$size}米混天绫<br>";
    }
}

// 英雄建造器
class Superman
{
    public $power;
    public function __construct(SuperMakeInterface $modules)
    {
        $this->power = $modules;
    }
}

echo '<pre>';
$modules = new PowerA();                //实例化钢铁侠
$gangtiexia = new Superman($modules);     //注入生产
$gangtiexia->power->activate();           //激活钢铁侠
$gangtiexia->power->boom(100);       //使用技能


$modules = new PowerB();                //实例化孙悟空
//// 吹毫毛
//for ($i = 0; $i < 10; $i++) {
//    $wukong[] = new Superman($modules);     //注入生产
//}
$wukong = new Superman($modules);     //注入生产
$wukong->power->activate();           //激活孙悟空
$wukong->power->boom(100);       //使用技能
