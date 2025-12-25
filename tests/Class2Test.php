<?php

use PHPUnit\Framework\TestCase;

if (!class_exists('HumanCounter')) {
    class HumanCounter
    {
        public static $class_call_count = 0;
        
        function __construct(){
            self::$class_call_count +=1;
        }
    }
}

if (!class_exists('Human2Base')) {
    class Human2Base{
        public $name;
        public $address;
        
        function __construct(){
            $this->name = null;
            $this->address = null;
        }
        function show(){
            return $this->name . "\n" . $this->address;
        }
    }
}

if (!class_exists('ActorClass')) {
    class ActorClass extends Human2Base{}
}

class Class2Test extends TestCase
{
    public function testHumanConstructor()
    {
        $initialCount = HumanCounter::$class_call_count;
        
        new HumanCounter();
        $this->assertEquals($initialCount + 1, HumanCounter::$class_call_count);
        
        new HumanCounter();
        $this->assertEquals($initialCount + 2, HumanCounter::$class_call_count);
    }
    
    public function testClassInheritance()
    {
        $actor = new ActorClass();
        $actor->name = "大泉";
        $actor->address = "北海道";
        
        $this->assertEquals("大泉", $actor->name);
        $this->assertEquals("北海道", $actor->address);
        $this->assertEquals("大泉\n北海道", $actor->show());
    }
}
