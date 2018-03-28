<?php

// Infos de serveur MYSQL
$error    = '';
$host     = 'localhost';
$database = 'hiremebytom';
$hostname = 'tom';
$hostpass = '@tom';

// Connexion au serveur MySQL avec PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $hostname, $hostpass);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}