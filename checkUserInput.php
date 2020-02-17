<?php

include "include" . DIRECTORY_SEPARATOR . "header.php";
if (!empty($_POST['lengthLight'])) {
    $lengthLight = $_POST['lengthLight'];
} else {
    echo "<p class='bold'>Моля попълнете всички полета !!!!<p>";
    header("Refresh: 2; url=index.php");
    exit;
}

$errorCheck = false;


// Make POST array to string
$lengthLightImpload = implode(", ", $lengthLight);

//Make tring to array
$lengthLightExpload = explode(", ", $lengthLightImpload);

for ($i = 0; $i < count($lengthLightExpload); $i++) {
    //var_dump($lengthLightExpload[$i]);
    if (!is_numeric($lengthLightExpload[$i])) {
        $errorCheck = true;
        echo "<p class='bold'>Моля използвайте само числа!!!!<p>";
        header("Refresh: 1; url=index.php");
        exit;
    }
}
if ($errorCheck == false) {
    $_SESSION['roadLength'] = $lengthLightExpload;
    header("Location:roadMapCalc.php");
} else {
    echo "<hr /><p class='bold'>Моля попълнете данните си отново <br /><a href='index.php'>Начало</a><p>";
}



include "include" . DIRECTORY_SEPARATOR . "footer.php";
