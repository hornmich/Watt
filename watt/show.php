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
	<h2>Vypis udaju</h2>
	<form name="dataform" action="show.php" method="POST">
		<p>	Od: <input type="text" name="dateFrom" id="dateFrom"><a href="javascript:NewCal('dateFrom','yyyymmdd')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
			do: <input type="text" name="dateTo" id="dateTo"><a href="javascript:NewCal('dateTo','yyyymmdd')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
			<input type="submit" name="submit" value="Filtrovat">
		</p>
	</form>
	<?php
		$name = $_POST['selectedName']; 
		$dateFrom = $_POST['dateFrom']; 
		$dateTo = $_POST['dateTo'];
		require_once 'phpmysqlconnect.php';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		if ($dateFrom == "" || $dateTo == "") {
			$sql = 'SELECT * FROM `WorkRecord`' ;
		}
		else {
			$sql = 'SELECT * FROM `WorkRecord` WHERE `date` BETWEEN \''.$dateFrom.'\' AND \''.$dateTo.'\'';
		}
		echo $sql;
/*		try {
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
			$sql = 'INSERT INTO `WorkRecord`(`employee`, `workPlace`, `workType`, `date`, `startTime`, `stopTime`, `advance`) VALUES ('.$nameId.',\''.$place.'\',\''.$work.'\',\''.$date.'\',\''.$start.'\',\''.$end.'\','.$advance.')';
			$q = $conn->query($sql);
			if($q !== FALSE) {
				echo "<p>Ulozeno.</p>";
			}
			else {
				echo "<p>Chyba pri pristupu do databaze.</p>";
			}
		}
		catch (PDOException $e) {
  			echo $e->getMessage();
		} 			

		*/
	?>
</body>

</html>
