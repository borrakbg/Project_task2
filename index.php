<?php
include 'include' . DIRECTORY_SEPARATOR . 'header.php';

if (!$_POST) {
    ?>
    <form action="" method="post" id="rows_needed">
        <p class="bold">Задайте колко сфетофара Ви трябват:</p> <input type="text" name="countLight" placeholder="Брой Сфетофара"><br />
        <input type="submit" name="addCount" value="Задай">
    </form>
    <?php
}

if (isset($_POST['countLight'])) {
    $countLight = $_POST['countLight'];
    if (empty($countLight) || !is_numeric($countLight) || $countLight <= 0) {
        echo "<p class='bold'>Моля попълнете коректно данните !!!!<p>";
        header("Refresh: 2; url=index.php");
        exit;
    }
    ?>
    <form  action="checkUserInput.php" method="post">
        <p class="bold">Моля спазвайте следния синтакс: <span class="bold">10,7</span></p>
        <?php
        for ($i = 1; $i <= $countLight; $i++) {
            echo "<p class='bold'>Моля въвдете данните за сфетофар " . $i . ": <input class='form-control' type='text' name='lengthLight[$i]' placeholder='example 10,7'></p>";
        }
        ?>
        <input type="submit" name="send" value="Пресметни">
    </form>
    <?php
}

include 'include' . DIRECTORY_SEPARATOR . 'footer.php';

