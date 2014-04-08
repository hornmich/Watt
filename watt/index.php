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
	<h2>Vyberte akci:</h2>
	<form name="actionform" action="selectname.php" method="POST">
		<hr>
		<input type="radio" name="group1" value="Add" checked> Pridat zaznam<br>
		<input type="radio" name="group1" value="Show"> Zobrazit zaznamy<br>
		<input type="radio" name="group1" value="Manage">Spravovat zaznamy<br>
		<input type="radio" name="group1" value="Users">Spravovat uzivatele<br>
		<hr>
		<input type="submit" name="submit" value="OK">
	</form>
</body>

</html>
