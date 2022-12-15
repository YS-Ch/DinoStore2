<?php
    $dsn = 'mysql:host=localhost;dbname=dinostore_shop1';
	$host = "localhost";
	$database = "dinostore_shop1";
    # use 'dino_manager' and 'password' as username and password
    $username = 'dino_manager';
    $password = 'password';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>