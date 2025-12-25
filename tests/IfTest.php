<?php

use PHPUnit\Framework\TestCase;

if (!function_exists('checkNumber')) {
    function checkNumber($num){
        if($num == 42) {
            return "Answer to the Ultimate Question of Life, the Universe, and Everything";
        }
        return "";
    }
}

class IfTest extends TestCase
{
    public function testIfCondition()
    {
        $num = 10;
        $result = false;
        
        if($num >= 10){
            $result = true;
        }
        
        $this->assertTrue($result);
    }
    
    public function testCheckFunction()
    {
        $result = checkNumber(42);
        $this->assertEquals("Answer to the Ultimate Question of Life, the Universe, and Everything", $result);
        
        // Test with different number
        $result2 = checkNumber(10);
        $this->assertEquals("", $result2);
    }
}
