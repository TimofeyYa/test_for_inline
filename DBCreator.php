<?php 
    // Файл для создания базы данных
    $DBLogin = 'root';
    $DBPassword = 'root';
    $DBHost = "localhost";
    $DBName = "inline";
    
    
    $connect = mysqli_connect($DBHost, $DBLogin, $DBPassword);
    mysqli_query($connect,"SET NAMES 'utf8'");
    
    if (!$connect){
        die('Falled connection!');
    }

    $res = mysqli_query($connect,"CREATE DATABASE $DBName");
    if(!$res)exit(mysql_error()); 

    $connect = mysqli_connect($DBHost, $DBLogin, $DBPassword, $DBName);

    mysqli_query($connect, "CREATE TABLE posts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(90) NOT NULL,
        body VARCHAR(300) NOT NULL
        ) ");

    mysqli_query($connect, "CREATE TABLE comments (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            postid INT(6) NOT NULL,
            names VARCHAR(90) NOT NULL,
            email VARCHAR(300) NOT NULL,
            body VARCHAR(300) NOT NULL
        ) ");


    // Анализ json

    $comments_json = 'https://jsonplaceholder.typicode.com/comments';
    $posts_json = 'https://jsonplaceholder.typicode.com/posts';

    $comments_data = json_decode(file_get_contents("$comments_json"), true);
    $posts_data = json_decode(file_get_contents("$posts_json"), true);
    

    foreach ($comments_data as $key){
        $names = $key["name"];
        $postId = $key['postId'];
        $email = $key['email'];
        $body = $key['body'];
        
        mysqli_query($connect, "INSERT INTO `comments` (`id`, `postid`, `names`, `email`, `body`) VALUES (NULL, '$postId', '$names', '$email', '$body') ");
        
    }

    foreach ($posts_data as $key){
        $title = $key['title'];
        $body = $key['body'];
        
        mysqli_query($connect, "INSERT INTO `posts` (`id`, `title`, `body`) VALUES (NULL, '$title', '$body') ");
    }

    print_r("Загружено ".count($posts_data)." записей и ".count($comments_data)." комментариев".PHP_EOL);



?>