<?php
	$connected=false;
	require_once 'dbconfig.php';
	try {
	    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	    $connected=true;
	} catch (PDOException $pe) {
	    die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
?>





