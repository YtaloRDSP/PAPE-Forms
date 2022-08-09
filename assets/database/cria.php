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
        $sql = 'CREATE TABLE IF NOT EXISTS Bolsistas (
            ID INT PRIMARY KEY AUTO_INCREMENT,
            Sub VARCHAR(100) NOT NULL UNIQUE,
            Nome VARCHAR(100) NOT NULL,
            CPF VARCHAR(150) NOT NULL UNIQUE,
            RG VARCHAR(15) NOT NULL,
            Matricula VARCHAR(10) NOT NULL UNIQUE,
            Email VARCHAR(100) NOT NULL UNIQUE,
            Fone VARCHAR(20) NOT NULL,
            Curso VARCHAR(100) NOT NULL,
            CursoFIC VARCHAR(100) NOT NULL,
            Turma VARCHAR(10) NOT NULL,
            AnoEntrada VARCHAR(4) NOT NULL,
            Nascimento VARCHAR(10) NOT NULL,
            Edital VARCHAR(3) NOT NULL,
            Bolsa VARCHAR(4) NOT NULL,
            Procur VARCHAR(4) NOT NULL,
            PeriodoTotal VARCHAR(23) NOT NULL,
            CargaTotal VARCHAR(3) NOT NULL,
            Parcelas VARCHAR(1) NOT NULL
        )';
        $conn->exec($sql);
        
    } catch(PDOException $e) {
        echo $sql . '<br>' . $e->getMessage();
    }
    $conn = null;
?>