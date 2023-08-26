<?php

$dsn = 'mysql:dbname=yuuridb;host=localhost';
$user = 'root';
$password = '';

try{
	$dbh = new PDO($dsn, $user, $password);

	$sql = 'select * from login';
	foreach ($dbh->query($sql) as $row) {
			print($row['id'].',');
			print($row['name']);
			print('<br>');
	}
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}

$dbh = null;

?>