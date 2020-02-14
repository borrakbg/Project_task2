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
        break;
    }
    $i++;
}
$length = count($lengthLight);
$roadMapArray = [];


for ($j = 1; $j <= $length; $j++) {
    $roadMapArray[$j] = explode(", ", $lengthLight[$j]);
}


for ($k = 1; $k < count($roadMapArray); $k++) {
    for ($m = 0; $m < count($roadMapArray[$k]); $m++) {
        if (count($roadMapArray[$k]) != 2 && is_numeric($roadMapArray[$m][isset($k)])) {
            $errorCheck = true;
            echo "<p class='bold'>Невалидни дани!!!<br />Моля използвайте само числа!!!<p>";
            break;
        } else {
            $nextRules = 0;
            for ($n = 0; $n < count($roadMapArray); $n++) {
                if ($roadMapArray[$nextRules][0] > $roadMapArray[$nextRules + 1][0]) {
                    echo "<p class='bold'>Невалидни дани!!!<br />Няма как за толкова малко време да минете няколко сфетофара!!!<p>";
                    $errorCheck = true;
                    break;
                }
                if ($nextRules+1 == count($roadMapArray)) {
                    echo "<p class='bold'>Невалидни дани!!!<br />Неможе да използвате три параметъра или един!!!<p>";
                    $errorCheck = true;
                    break;
                } else {
                    $nextRules++;
                }
            }
        }
    }
}

if ($errorCheck == false) {
    $_SESSION['roadLength'] = $roadMapArray;
    header("Location: roadMapCalc.php");
} else {
    echo "<hr /><p class='bold'>Моля попълнете данните си отново <br /><a href='index.php'>Начало</a><p>";
}

include 'include/footer.php';
