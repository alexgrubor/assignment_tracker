<?php 
   $dsn= 'mysql:host=localhost;dbname=assigment_tracker';
    $username = 'root';
    try{
        $db = new PDO($dsn, $username);
    } catch (PDOException $err){
        $error_message = "DB errors:";
        $error_message .= $err->getMessage();
        include('view/error.php');
        exit();
    }
