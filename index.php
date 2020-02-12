<?php
include 'include'.DIRECTORY_SEPARATOR.'header.php';
?>
    <form action="" method="post" id="rows_needed">
        <p class="bold">Задайте колко сфетофара Ви трябват:</p> <input type="text" name="countLight" placeholder="Брой Сфетофара"><br />
        <input type="submit" name="addCount" value="Задай">
    </form>
<?php
if (!empty($_POST['countLight'])) {
    $countLight = $_POST['countLight'];
    echo "<style> #rows_needed{display: none;}</style>";
    if (!empty($countLight)) {
        echo "<style> .hide{display: inline;}</style>";
    }
    ?>
    <form class="hide" action="checkUserInput.php" method="post">
    <p class="bold">Моля спазвайте следния синтакс: <span class="bold">12, 22</span></p>
    <?php
    for ($i = 1; $i <= $countLight;) {
        echo "<p class='bold'>Моля въвдете данните за сфетофар " . $i . ": <input type='text' name='lengthLight[$i]' placeholder='example   24, 7'></p>";
        $i++;
    }
} elseif (!empty($_POST['addCount']) && empty($_POST['countLight'])) {
    echo "Please enter a valid input";
}
?>

    <input class="hide" type="submit" name="sendLight" value="Пресметни">
    </form>
<?php
include 'include'.DIRECTORY_SEPARATOR.'footer.php';
?>