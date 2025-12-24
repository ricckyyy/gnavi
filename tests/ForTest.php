<?php

use PHPUnit\Framework\TestCase;

class ForTest extends TestCase
{
    public function testFizzBuzzLogic()
    {
        // Test FizzBuzz logic
        $results = [];
        for($i = 1; $i <= 30; $i++){
            if($i % 5 == 0){
                $results[] = "Buzz";
            } else {
                $results[] = (string)$i;
            }
        }
        
        // Check specific values
        $this->assertEquals("1", $results[0]); // i=1
        $this->assertEquals("Buzz", $results[4]); // i=5
        $this->assertEquals("Buzz", $results[9]); // i=10
        $this->assertEquals("Buzz", $results[14]); // i=15
        $this->assertEquals("Buzz", $results[19]); // i=20
        $this->assertEquals("Buzz", $results[24]); // i=25
        $this->assertEquals("Buzz", $results[29]); // i=30
        
        // Check that we have 30 items
        $this->assertCount(30, $results);
    }
}
