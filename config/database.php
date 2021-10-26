<?php

$dbhost = 'localhost';
$dbname = 'spectacle';
$dbuser = 'root';
$dbpass = 'root';

try {
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
} catch (PDOException $e) {
    die($e);
}

?>