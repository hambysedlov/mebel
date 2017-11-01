<?php

echo "<b>Выберите те фирмы, о новостях которых вы хотите получать сообщения на почту</b><br><br>";

echo "<p style='font-size:20px;'><b>Все фирмы:</b></p>";

echo "<form method='POST' action='on.php'>";

$sections= mysqli_query("SELECT * FROM `section`", $connection);
while($row = mysqli_fetch_array($sections)){
	
	$name=$row['section_name'];
	$id=$row['id'];
	$check="";
	if(mb_strstr ($sections_id, $id)){$check="checked";}
	
	
			echo "<input $check type='checkbox' name='chb[]' value='$id' type='checkbox'><span style='font-size:15px;'><a href='product.php?firm=$name'>$name</a></span><br>";
	
}

echo "<br><input type='submit' name='submit'  value='Подписаться'><br>";

if($sections_id!=""){
					echo "<br><a href='on.php?sub=no'>Отписаться от всего</a>";
				}else{
					echo "<b>Текущих подписок нет</b>";
				}

echo "</form>";

?>

	
	
	
	
