<?php 
$allowed = array('gif', 'png', 'jpg', 'jpeg', 'GIF', 'PNG', 'JPG', 'JPEG');
	$filename = $_FILES['userpic']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$name = $_POST['name'];
	if($name == '') {
		echo 'Заполните имя!<br>';
	}
	else if(!file_exists($_FILES['userpic']['tmp_name'])){
		echo "Выберите файл!<br>";
		
}
	
	//else if(!in_array($ext, $allowed)) {
	//	echo 'Выберите файл PNG, JPG, JPEG или GIF!';
	//}
	else if($_FILES['userpic']['type'] != 'image/jpeg'){
		echo 'Выберите файл PNG, JPG, JPEG или GIF!';
	}
	else {
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$text = $_POST['text'];
		
		$link = mysqli_connect(localhost,'root','',task3);
		$query = mysqli_query($link, "SELECT max(number) FROM form");
		$image_row = mysqli_fetch_row($query);
		if($image_row == '') {
			$max_number = 1;
		}
		else {
			$max_number = $image_row[0] + 1;
		}
		
		$image = $max_number.".".$ext;
		$insert = mysqli_query($link, "INSERT INTO form (name, sex, text, image) VALUES ('$name', '$sex', '$text', '$image')");
		copy($_FILES['userpic']['tmp_name'], "Images/$image");
		mysqli_close($link);
		require('bd.php');
	}
?>