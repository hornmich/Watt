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
		if ($_SESSION['state'] == 'inputData' || $_SESSION['state'] == 'checkData') {
			$_SESSION['state'] = 'checkData';
			$name = $_POST['name'];
			$place = $_POST['place'];
			$work = $_POST['work'];
			$start = $_POST['startTime'];
			$end = $_POST['endTime'];
			$date = $_POST['date'];
			$advance = $_POST['advance'];
			$allright=true;

			$TIME24HOURS_PATTERN = "/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/";

			if ($name == "") {
				echo "Jmeno nesmi byt prazdne";		
				$allright=false;	
			}
			if ($place == "") {
				echo "Misto nesmi byt prazdne";			
				$allright=false;	
			}
			if ($work == "") {
				echo "Popis prace nesmi byt prazdny";			
				$allright=false;	
			}
			if (!preg_match($TIME24HOURS_PATTERN, $start)) {
				echo "Cas zacatku je spatne zadany. Musi byt ve formatu hh:mm .";			
				$allright=false;	
			}
			if (!preg_match($TIME24HOURS_PATTERN, $end)) {
				echo "Cas zacatku je spatne zadany. Musi byt ve formatu hh:mm .";			
				$allright=false;	
			}
			
			if ($allright) { ?>
				<p>Vsechno je spravne, muzete informace ulozit.</p>
				<form name="dataform" action="save.php" method="POST">
					<input type="submit" name="submit" value="Ulozit">
				</form>
			<?php }
			else { ?>
				<p>Je chyba v zadani, kteou musite opravit.</p>
				<h1>Zadejte udaje</h1>
				<form name="dataform" action="check.php" method="POST">
					<p>Jmeno: <input type="text" name="name" value="<?php echo $name ?>"></input> </p>					<p>Misto (adresa): <input type="text" name="place" value="<?php echo $place ?>"></input> </p>
					<p>Ucel prace: <input type="text" name="work" value="<?php echo $work ?>"></input> </p>
					<p>Cas zacatku: <input type="text" name="startTime" value="<?php echo $start ?>"></input> </p>
					<p>Cas konce: <input type="text" name="endTime" value="<?php echo $end ?>"></input> </p>
					<p>Datum: <input type="text" name="date" id="date" value="<?php echo $date ?>"><a href="javascript:NewCal('date','ddmmyyyy')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></p>
					<p>Zaloha: <input type="text" name="advance" value="<?php echo $advance ?>"></input>Kc </p>
					<input type="submit" name="submit" value="Zkontrolovat">
				</form>
			<?php } ?>
		<?php }
		else {
			echo "Tady nemate byt. jdete na index.php.";	
		}
	?>



</body>
</html>
