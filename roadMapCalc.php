<?php
include "include/header.php";

$roadMap = $_SESSION['roadLength'];

//var_dump($roadMap);
$seconds= 0;
$redLight = 0;
$meters = 0;

for($i = 1; $i <= count($roadMap); $i++){
    $seconds =$seconds + $roadMap[$i][0] - $meters;
    $meters = (int)$roadMap[$i][0];
    $redLight = (int)$roadMap[$i][1];

	if (($seconds/$redLight) % 2 != 0){
        $seconds = (int)($seconds/$redLight + 1)* $redLight;
    }else{
        $seconds = $seconds;
    }
}
echo "Секундите, за които ще трябва да преминете всички светофари, са:   <span class='bold'>" . $seconds . "</span>";