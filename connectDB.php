<?php
	$error = '';
	$host ='localhost';
    $database ='hiremebytom';
    $hostname ='tom';
	$hostpass ='@tom';

	//$error = "";
	//$host = 'localhost';
	//$hostname = 'bpt2255a';
	//$hostpass = 'bG2tD45n';

		//Connexion au serveur MySQL
		try { 
			$pdo = new PDO("mysql:host=$host;dbname=$database", $hostname, $hostpass);
		} 
		catch (Exception $e) { 
			die('Erreur : ' . $e->getMessage()); 
		}
?>