<?php

use PHPUnit\Framework\TestCase;

if (!function_exists('helloTest')) {
    function helloTest($str) {
        print($str);
    }
}

class FuncTest extends TestCase
{
    public function testHelloFunction()
    {
        // Test that hello function outputs correctly
        ob_start();
        helloTest("Hello World!");
        $output = ob_get_clean();
        
        $this->assertEquals("Hello World!", $output);
    }
}
