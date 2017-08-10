<?php
/**
 * Created by PhpStorm.
 * User: 为了自由
 * Date: 2017/8/10
 * Time: 11:49
 * Notice:请保持渴望成功的心
 */

class FightA
{
    protected $fighta;
    public function __construct($a, $b)
    {
        $this->fighta = $a * $b;
    }
}
class FightB
{
    protected $fightb;
    public function __construct($b)
    {
        $this->fightb = $b;
    }
}
class FightC
{
    protected $fightc;
    public function __construct($c)
    {
        $this->fightc = $c;
    }
}


class SuperFactory
{
    public function makeSuper($type, $options)
    {
        switch ($type) {
            case 'fighta':
                return new FightA(...$options);
            case 'fightb':
                return new FightB(...$options);
            case 'fightc':
                return new FightC(...$options);
        }
    }
}

class Superman
{
    protected $power;

    public function __construct(array $modules)
    {
        $superFactory = new SuperFactory();
        foreach ($modules as $moduleName => $moduleOptions) {
            $this->power[] = $superFactory->makeSuper($moduleName, $moduleOptions);
        }
//        $this->power[] = $superFactory->makeSuper('fighta',[999,100]);
//        $this->power[] = $superFactory->makeSuper('fightc',[888]);
//        $this->power[] = new FightA(999, 100);
//        $this->power[] = new FightB(888);
//        $this->power[] = new FightC(777);
    }

}


$superMan = new Superman([
    'fighta' => [999,100],
    'fightb' => [666],
    'fightc' => [888],
]);
echo '<pre>';
var_dump($superMan);