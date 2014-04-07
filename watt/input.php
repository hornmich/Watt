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
		if ($_SESSION['state'] == 'selectName') {
			$_SESSION['state'] = 'inputData';
			$name = $_POST['selectedName']; ?>
			<h1>Zadejte udaje</h1>
			<form name="dataform" action="check.php" method="POST">
				<p>Jmeno: <input type="text" name="name" value="<?php echo $name ?>" READONLY></input> </p>
				<p>Misto (adresa): <input type="text" name="place"></input> </p>
				<p>Ucel prace: <input type="text" name="work"></input> </p>
				<p>Cas zacatku: <input type="text" name="startTime"></input> </p>
				<p>Cas konce: <input type="text" name="endTime"></input> </p>
				<p>Datum: <input type="text" name="date" id="date" READONLY><a href="javascript:NewCal('date','yyyymmdd')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></p>
				<p>Zaloha: <input type="text" name="advance"></input>Kc </p>
				<input type="submit" name="submit" value="Zkontrolovat">
			</form>
		<?php }
		else {
			echo "Tady nemate byt. jdete na index.php.";	
		}
	?>



</body>
</html>
