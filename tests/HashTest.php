<?php

use PHPUnit\Framework\TestCase;

class HashTest extends TestCase
{
    public function testAssociativeArray()
    {
        $data = [
            "name" => "大泉",
            "gender" => "男性",
            "age" => 46
        ];
        
        $this->assertEquals("大泉", $data['name']);
        $this->assertEquals("男性", $data['gender']);
        $this->assertEquals(46, $data['age']);
    }
    
    public function testArrayKeys()
    {
        $data = [
            "name" => "大泉",
            "gender" => "男性",
            "age" => 46
        ];
        
        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('gender', $data);
        $this->assertArrayHasKey('age', $data);
        $this->assertArrayNotHasKey('children', $data);
    }
    
    public function testUndefinedKey()
    {
        $data = [
            "name" => "大泉",
            "gender" => "男性",
            "age" => 46
        ];
        
        // Test that accessing undefined key returns null
        $this->assertNull($data['children'] ?? null);
    }
}
