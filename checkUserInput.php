<?php
include 'include/header.php';
if (!empty($_POST['lengthLight'])) {
    $lengthLight = $_POST['lengthLight'];
} else {
    echo "<p class='bold'>Моля попълнете всички полета !!!!<p>";
    header("Refresh: 2; url=index.php");
    exit;
}


$lengthLightImpload = null;
$lengthLightExpload = [];
$errorCheck = null;

$lengthLightImpload = implode(', ', $lengthLight);
$lengthLightExpload = explode(', ', $lengthLightImpload);
for ($i = 1; $i < count($lengthLightExpload);) {
    if (!is_numeric($lengthLightExpload[$i])) {
        $errorCheck = true;
        echo "<p class='bold'>Невалидни дани!!!<br />Моля използвайте само числа!!!<br />Спазвайте синтакса!!!<p>";
        echo "<p class='bold'>Моля попълнете данните си отново <br /><a href='index.php'>Начало</a><p>";
        break;
    }
    $i++;
}
$length = count($lengthLight);
$roadMapArray = [];
for ($j = 1; $j <= $length; $j++) {
    $roadMapArray[$j] = explode(", ", $lengthLight[$j]);
}
if ($errorCheck == false) {
    $_SESSION['roadLength'] = $roadMapArray;
    header("Location: roadMapCalc.php");
}

include 'include/footer.php';