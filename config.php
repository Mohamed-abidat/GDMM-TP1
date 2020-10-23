<?php
	$hostname = 'localhost';
	$dbase = 'tp1';
	$username = 'root';
	$password = '';
	$cnx = new PDO("mysql:host=$hostname;dbname=$dbase", $username, $password);
?>