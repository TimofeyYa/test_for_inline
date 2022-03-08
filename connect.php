<?php
// Файл для соединения 
$DBLogin = 'root';
$DBPassword = 'root';
$DBHost = "localhost";
$DBName = "inline";


$connect = mysqli_connect($DBHost, $DBLogin, $DBPassword, $DBName);

if (!$connect){
    die('Falled connection!');
} 