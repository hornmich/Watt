<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="description" content="Work attendance">
   <meta name="keywords" content="HTML, tags, commands">
   <title>Docházka</title>
</head>
<body>
	<?php
	session_start();  
	$_SESSION['state'] = 'selectName';
	$activity = $_POST['group1'];
	$page="";
	if ($activity == "Add") {
		$page="input.php";
	}
	else if ($activity == "Show") {
		$page="show.php";
	}
	else if ($activity == "Manage") {
		$page="manage.php";
	}
	else {
		echo "index.php";
	}
	if ($_SESSION['state'] == 'selectName') { ?>
		<h1>Zvolte jmeno:</h1>
		<?php require_once 'phpmysqlconnect.php';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = 'SELECT name FROM Emploees';
		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC); ?>
		<form name="myform" action="<?php echo $page ?>" method="POST">
			<select size="6" name="selectedName">
			<?php while ($r = $q->fetch()): ?>
				<option value="<?php echo htmlspecialchars($r['name']) ?>"> <?php echo htmlspecialchars($r['name']) ?> </option>
			<?php endwhile; ?>
			</select>
			<input type="submit" name="submit" value="Další">
		</form>
	<?php } ?>
</body>

</html>
