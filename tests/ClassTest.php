<?php

use PHPUnit\Framework\TestCase;

if (!class_exists('HumanBasic')) {
    class HumanBasic
    {
        static $class_nam = "Human";
        
        function init(){
            $this->name = "大泉";
        }
        public function show(){
            print($this->name."\n");
        }
    }
}

class ClassTest extends TestCase
{
    public function testHumanClass()
    {
        // Test that Human class has the correct static property
        $this->assertEquals("Human", HumanBasic::$class_nam);
    }
}
