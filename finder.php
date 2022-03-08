<?php
    // Файл для поиска постов
    include_once './connect.php';


    $txt = $_GET['txt'];
    $getAll = mysqli_query($connect, "SELECT * FROM `comments`");

    $postid = array();
    $data = array();
    $indexPost = 0;

    while ($item = mysqli_fetch_array( $getAll)){
        if (strpos($item['body'], $txt)){
            $postid[$index] = $item['id'];
            $index = $index + 1;
        } else {
            
        }
    }

    

    for ($i = 0; $i < $index; $i++){
        $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = '$postid[$i]'");
        $post = mysqli_fetch_assoc($post);
        $data[$i] = $post;
    }

    
    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    print_r($json);