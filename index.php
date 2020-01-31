<?php
include 'include/header.php';
?>
	<form action="#" method="post" id="request_row">
		Колко елемента искате да имате:<input type="text" name="elements">
		<input type="submit" name="request_row_submit" value="Задай">
	</form>
	<?php 
		if(!empty($_POST['elements']) && !is_int($_POST['elements'])){
			$elements = $_POST['elements'];
			echo "<style> #request_row{display: none;}</style>";
			if(!empty($elements)){
				echo "<style> .hide{display: inline;}</style>";
			}
			?>
			<form class="hide" action="check_input.php" method="post">
				<p class="bold">Попълнете полетата както е показано: <span class="bold">20, 5</span></p>
		<?php 
				for ($i=1; $i <= $elements ;) {
					echo "<p>Напишете ". $i ." първия варянт: <input type='text' name='roadMap[$i]' placeholder='example   20, 5'></p>";
					$i++;
				}
		}
		elseif(!empty($_POST['request_row_submit']) && empty($_POST['elements'])){
			echo "<p class='bold'>Моля използвайте само числа!!!</p>";
		}
		?>
	
	<input class="hide" type="submit" name="submit" value="Изпрати">
	</form>
<?php
include 'include/footer.php';
?>