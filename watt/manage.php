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
	<?php
		$name = $_POST['selectedName']; 
		$dateFrom = $_POST['dateFrom']; 
		$dateTo = $_POST['dateTo'];
	?>
	<h1>System pro zaznam pracovnich cinnosti</h1>
	<h2>Sprava udaju uzivatele <?php echo $name ?></h2>
	<form name="dataform" action="show.php" method="POST">
		<p>	Od: <input type="text" name="dateFrom" id="dateFrom" READONLY><a href="javascript:NewCal('dateFrom','yyyymmdd')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
			do: <input type="text" name="dateTo" id="dateTo" READONLY><a href="javascript:NewCal('dateTo','yyyymmdd')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
			<input type="hidden" name="selectedName" value=<?php echo $name ?>>
			<input type="submit" name="submit" value="Filtrovat">
		</p>
	</form>
	<?php
		require_once 'phpmysqlconnect.php';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		
		$sql = 'SELECT `id` FROM `Emploees` WHERE `name` = \''.$name.'\'';
		try {
			$q = $conn->query($sql);
			if($q !== false) {
				$cols = $q->columnCount();           // Number of returned columns
				$q->setFetchMode(PDO::FETCH_ASSOC);
				// pick the first ID
				foreach($q as $row) {
					$nameId= $row['id'];
					break;
				}
			}
			else {
				echo "<p>Chyba pri pristupu do databaze.</p>";
			}
			if ($dateFrom == "" || $dateTo == "") {
				$sql = 'SELECT * FROM `WorkRecord` WHERE `employee`=\''.$nameId.'\'';
			}
			else {
				$sql = 'SELECT * FROM `WorkRecord` WHERE `employee`=\''.$nameId.'\' AND (`date` BETWEEN \''.$dateFrom.'\' AND \''.$dateTo.'\')';
			}

			$q = $conn->query($sql);
			if($q !== false) {
				$cols = $q->columnCount();           // Number of returned columns
				$q->setFetchMode(PDO::FETCH_ASSOC);
				// pick the first ID
				echo '<table border="1" CELLPADDING="4"><tr><th>Misto</th><th>Ucel prace</th><th>Cas zacatku</th><th>Cas konce</th><th>Datum</th><th>Zaloha</th><th>Akce</th></tr>';
				foreach($q as $row) {
					echo '<tr>';
						echo '<td>'.$row['workPlace'].'</td>';
						echo '<td>'.$row['workType'].'</td>';
						echo '<td>'.$row['startTime'].'</td>';
						echo '<td>'.$row['stopTime'].'</td>';
						echo '<td>'.$row['date'].'</td>';
						echo '<td>'.$row['advance'].'</td>';
						?>
						<td>
						<form name="savedform" action="deleteRecord.php" method="POST">
							<input type="hidden" name="recordId" value="<?php echo $row['id'] ?>">
							<input type="submit" name="submit" value="Smazat zaznam">
						</form>
						<form name="savedform" action="editRecord.php" method="POST">
							<input type="hidden" name="recordId" value="<?php echo $row['id'] ?>">
							<input type="submit" name="submit" value="Upravit zaznam">
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
	<form name="savedform" action="index.php" method="POST">
		<input type="submit" name="submit" value="Zpet">
	</form>
</body>

</html>
