<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="description" content="Work attendance">
   <meta name="keywords" content="HTML, tags, commands">
   <title>Docházka</title>
	<?php
		ini_set('display_errors', 'On');
	?>
</head>
<body>
	<h1>System pro zaznam pracovnich cinnosti</h1>
	<h2>Prejmenovani uzivatele</h2>
	<?php
		require_once 'phpmysqlconnect.php';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$name = $_POST['name'];
		$userid = $_POST['userid'];
		if ($name == "") {
			echo "<p> Neplatne jmeno uzivatele.</p>";
		}
		else {
			$sql = 'UPDATE `Emploees` set `name` = \''.$name.'\' where `id` = \''.$userid.'\'';
			try {
				$q = $conn->query($sql);
				if($q !== false) {
					echo "<p>Ulozeno.</p>";
				}
				else {
					echo "<p>Chyba pri pristupu do databaze.</p>";
				}
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			} 			
		}
		?>
	<form name="savedform" action="index.php" method="POST">
		<input type="submit" name="submit" value="OK">
	</form>
</body>

</html>
