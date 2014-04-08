<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="description" content="Work attendance">
   <meta name="keywords" content="HTML, tags, commands">
   <title>Docházka</title>
</head>
<body>
	<h1>System pro zaznam pracovnich cinnosti</h1>
	<h2>Mazani uzivatel</h2>
	<?php
		$name = $_POST['userid']; 
		require_once 'phpmysqlconnect.php';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		try {
			$sql = 'DELETE FROM `WorkRecord` WHERE `Employee`=\''.$name.'\'';
			$q = $conn->query($sql);
			if($q == false) {
				echo "Chyba pri mazani dat uzivatele.";
			}
			$sql = 'DELETE FROM `Emploees` WHERE `id`=\''.$name.'\'';

			$q = $conn->query($sql);
			if($q == false) {
				echo "Chyba pri mazani uzivatele, zkontrolujte databazi.";
			}
			else {
				echo "Uzivatel a jeho data smazana.";
			}
		}
		catch (PDOException $e) {
  			echo $e->getMessage();
		} 
	?>
	<form name="savedform" action="index.php" method="POST">
		<input type="submit" name="submit" value="OK">
	</form>
</body>
</html>
