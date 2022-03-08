<?php
    $DBLogin = 'root';
    $DBPassword = 'root';
    $DBHost = "";
    $DBName = "inline";


    $connect = mysqli_connect($DBHost, $DBLogin, $DBPassword);
    
    if (!$connect){
        die('Falled connection!');
    } else {

    }
    $res = mysqli_query($connect,"DROP DATABASE $DBName");
    if(!$res)exit(mysql_error());else echo 'All Clear'; 