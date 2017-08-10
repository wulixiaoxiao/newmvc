<?php

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

class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        array_unshift($parameters, $this);
        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}

echo '<pre>';
$container = new Container();

$container->bind('powera', function ($contariner) {
    return new PowerA();
});
$container->bind('powerb', function ($contariner) {
    return new PowerB();
});

$callback = function ($container, $moduleName) {
    return new Superman($container->make($moduleName));
};
$container->bind('superman', $callback);


$superman1 = $container->make('superman', ['powera']);
$superman2 = $container->make('superman', ['powerb']);
$superman1->power->activate();
$superman1->power->boom(100);