<?php

use PHPUnit\Framework\TestCase;

class VarTest extends TestCase
{
    public function testVariables()
    {
        $hello = "Hello, PHP!";
        $num = 42;
        
        $this->assertEquals("Hello, PHP!", $hello);
        $this->assertEquals(42, $num);
    }
    
    public function testArrays()
    {
        $customers = ["侍　太郎","侍　次郎","侍　三郎"];
        
        $this->assertCount(3, $customers);
        $this->assertEquals("侍　太郎", $customers[0]);
        $this->assertEquals("侍　次郎", $customers[1]);
        $this->assertEquals("侍　三郎", $customers[2]);
    }
    
    public function testArrayPush()
    {
        $data = [1,2,3];
        array_push($data,4);
        
        $this->assertCount(4, $data);
        $this->assertEquals(4, $data[3]);
    }
    
    public function testArrayAccess()
    {
        $numlist = ["one" , "two" , "three"];
        
        $this->assertEquals("two", $numlist[1]);
    }
    
    public function testEmptyArray()
    {
        $stringlist = [];
        array_push($stringlist,"samurai");
        
        $this->assertEquals("samurai", $stringlist[0]);
    }
}
