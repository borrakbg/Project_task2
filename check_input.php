<?php
include 'include/header.php';

if(!empty($_POST['roadMap'])){
	$roadMap = $_POST['roadMap'];
}
else{
	header("Location: index.php");
}
$imploded_roadMap = NULL;
$exploded_roadMap = [];
$user_errors = NULL;

$imploded_roadMap = implode(', ', $roadMap);
$exploded_roadMap = explode(', ', $imploded_roadMap);
for ($j=1; $j < count($exploded_roadMap);) { 
		if(!is_numeric($exploded_roadMap[$j])){
			echo "<p class='bold'>Невалидни дани!!!Моля използвайте само числа!!!<p>";
			echo "<p class='bold'>Моля попълнете данните си отново <a href='index.php'>Начало</a><p>";
			$user_errors = TRUE;
			break;
		}
		else{
			$user_errors = FALSE;
		}
	$j++;
}
if($user_errors == FALSE){
	$_SESSION['roadMap'] = $roadMap;
	header("Location: road_map.php");
}

include 'include/footer.php';