<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="description" content="Work attendance">
   <meta name="keywords" content="HTML, tags, commands">
   <script language="javascript" type="text/javascript" src="datetimepicker.js">
		//Date Time Picker script- by TengYong Ng of http://www.rainforestnet.com
		//Script featured on JavaScript Kit (http://www.javascriptkit.com)
		//For this script, visit http://www.javascriptkit.com 
	</script>
    <title>Docházka</title>
</head>
<body>
	<h1>System pro zaznam pracovnich cinnosti</h1>
	<h2>Ukladani noveho uzivatele <?php echo $name ?></h2>
	<?php
		$name = $_POST['username']; 
		require_once 'phpmysqlconnect.php';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		
		$sql = 'SELECT `id` FROM `Emploees` WHERE `name` = \''.$name.'\'';
		try {
			$q = $conn->query($sql);
			if($q !== false) {
				$rows = $q->rowCount();
				if ($rows != 0) {
					echo "Uzivatel uz existuje, zvolte jine jmeno.";
				}
				else {
					$sql = 'INSERT INTO `Emploees`(`name`) VALUES (\''.$name.'\')';
					$q = $conn->query($sql);
					if($q !== false) {
						echo "Uzivatel ulozen.";
					}
					else {
						echo "Ukladani selhalo.";
					}
				}
			}
			else {
				echo "Chyba pri pristupu k databazi.";
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
