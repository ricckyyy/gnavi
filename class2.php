<?php
class Human
{
    public static $class_call_count = 0;
    
    #humanクラスのインスタンスが作られるたびに、class_call_countが増えていく
    function __construct(){
        self::$class_call_count +=1;
    }
}

new Human();
print Human::$class_call_count;

class Human2{
    function __construct(){
        $this->name = null;
        $this->address = null;
    }
    function show(){
        print($this->name."\n");
        print($this->address);
    }
}

class Act extends Human2{}
    $actor = new Act();
    
    $actor->name = "大泉";
    $actor->address = "北海道";
    $actor->show();
?>