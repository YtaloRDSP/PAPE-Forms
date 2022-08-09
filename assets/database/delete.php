<?php
    require('credenciais.php');
    session_start();

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $database";
        $conn->exec($sql);
        $conn = null;

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'DROP TABLE Bolsistas';
        $conn->exec($sql);

    } catch(PDOException $e) {
        echo $sql . '<br>' . $e->getMessage();
    }
    $conn = null;
?>