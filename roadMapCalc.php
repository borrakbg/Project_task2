<?php

include "include" . DIRECTORY_SEPARATOR . "header.php";

if (!isset($_SESSION['roadLength'])) {
    header("Location: index.php");
    exit;
} else {
    $roadMap = $_SESSION['roadLength'];
    $seconds = 0;
    $redLight = 0;
    $meters = 0;
    for ($i = 1; $i <= count($roadMap); $i++) {
        var_dump($roadMap[$i]);
        $seconds = $seconds + $roadMap[$i][0] - $meters;
        $meters = $roadMap[$i][0];
        $redLight = $roadMap[$i][1];
        if (($seconds / $redLight) % 2 != 0) {
            $seconds = (int) ($seconds / $redLight + 1) * $redLight;
        } else {
            $seconds = $seconds;
        }
    }
    echo "The seconds that you will need to pass all traffic lights is:   <b>" . $seconds . "</b>";
}

include "include" . DIRECTORY_SEPARATOR . "footer.php";
