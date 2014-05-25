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
	<h2>Sprava uzivatelu</h2>
	<?php
		require_once 'phpmysqlconnect.php';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = 'SELECT * FROM `Emploees`';
		try {
			$q = $conn->query($sql);
			if($q !== false) {
				$cols = $q->columnCount();           // Number of returned columns
				$q->setFetchMode(PDO::FETCH_ASSOC);
				echo '<h3>Seznam uzivatelu</h2>';
				echo '<table border="1" CELLPADDING="4"><tr><th>Jmeno</th><th>Akce</th></tr>';
				foreach($q as $row) {
					echo '<tr>';
						echo '<td>'.$row['name'].'</td>';
						?>
						<td>
							<form name="dataform" action="userrename.php" method="POST">
							<input type="hidden" name="userid" value="<?php echo $row['id'] ?>">		
							<p>Nove jmeno: <input type="text" name="name" value="<?php echo $row['name'] ?>"></input> </p>
							<input type="submit" name="submit" value="Prejmenovat">
						</form>
						<hr></hr>
						<form name="dataform" action="userrm.php" method="POST">
							<input type="hidden" name="userid" value="<?php echo $row['id'] ?>">
							<input type="submit" name="submit" value="Smazat">
						</form>
						</td>
						<?php
					echo '</tr>';
				}
				echo '</table>';
			}
			else {
				echo "<p>Chyba pri pristupu do databaze.</p>";
			}
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		} 			
	?>
	<h3>Novy uzivatel</h3>
	<p>
	<form name="savedform" action="useradd.php" method="POST">
		<p>Jmeno noveho uzivatele: <input type="text" name="username"></p>
		<input type="submit" name="submit" value="Pridat uzivatele">
	</form>
	</p>
	<p>
	<form name="savedform" action="index.php" method="POST">
		<input type="submit" name="submit" value="Zpet">
	</form>
	</p>
</body>

</html>
