<?php
$hello = "Hello, PHP!";
$num = 42;
print($hello."\n");
print($num."\n");

$customers = ["侍　太郎","侍　次郎","侍　三郎"];

foreach ($customers as &$customers ){
    print($customers."\n");
}

$data = [1,2,"A"];
foreach($data as &$d){
   # print($d + 1 ."\n");
}
# "A" => ERROR

# array_push関数
$data = [1,2,3];
array_push($data,4);
var_dump($data);
var_dump(count($data));

print("--------------------------------\n");

$numlist = ["one" , "two" , "three"];
print($numlist[1]."\n");

print("--------------------------------\n");

$stringlist = [];
array_push($stringlist,"samurai");
print($stringlist[0]."\n");
?>