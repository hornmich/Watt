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
		session_start();  
		if ($_SESSION['state'] == 'checkData') {
			$_SESSION['state'] = 'save';
			$name = $_POST['name'];
			$place = $_POST['place'];
			$work = $_POST['work'];
			$start = $_POST['startTime'];
			$end = $_POST['endTime'];
			$date = $_POST['date'];
			$advance = $_POST['advance'];
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
			?>
				<form name="savedform" action="index.php" method="POST">
					<input type="submit" name="submit" value="OK">
				</form>
		<?php
		}
		else {
			echo "Tady nemate byt. jdete na index.php.";	
		}
	?>



</body>
</html>
