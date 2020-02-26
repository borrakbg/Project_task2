<?php

include "include" . DIRECTORY_SEPARATOR . "header.php";
if (!isset($_SESSION['roadLength'])) {
    header("Location: index.php");
    exit;
} else {
    $roadMap = $_SESSION['roadLength'];
    //var_dump($roadMap);
    //exit;
    $seconds = 0;
    $redLight = 0;
    $meters = 0;

    for ($i = 1; $i <= count($roadMap); $i++) {
        // Необходимо време за достигане на последния сфетофар
        $seconds = $seconds + $roadMap[$i][0] - $meters;

        // Дистанцията от началото до червения сфетофар
        $meters = (int) $roadMap[$i][0];

        // Вземае честота на сфетофара
        $redLight = (int) $roadMap[$i][1];

        // Проверете дали секундите, разделени на честотата на промяна на цвета, са нечетни
        if (($seconds / $redLight) % 2 != 0) {
            // Добавете секундите, където пътниците трябва да стоят на червена светлина
            $seconds = (int) ($seconds / $redLight + 1) * $redLight;
        } else {
            // Не се променя ако светлината е зелена
            $seconds = (int) $seconds;
        }
    }
    echo "<p class='font-weight-bold'>Времето, които ще трябва да преминете през всички светофари, са: " . $seconds . "</p>";
    echo " <p class='font-weight-bold'>За нова проверка :  <a href='index.php'>Начало</a></p>";
}
include "include" . DIRECTORY_SEPARATOR . "footer.php";
