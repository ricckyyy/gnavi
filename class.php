<?php
/*
class Car
{
    static $class_name = "Car";
    
    function init(){
        $this->name="";
    }
    
    public function show(){
        print($this->name."\n");
    }
}

$car = new Car();

$car->name = "セダン";

$car->show();

print(Car::$class_name);
*/
class Human
{
    static $class_nam = "Human";
    
    function init(){
        $this->name = "大泉";
    }
    public function show(){
        print($this->name."\n");
    }
}
print(Human::$class_nam)
?>