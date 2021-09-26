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
            Nome VARCHAR(100) NOT NULL,
            CPF VARCHAR(150) NOT NULL UNIQUE,
            RG VARCHAR(15) NOT NULL,
            Matricula VARCHAR(10) NOT NULL UNIQUE,
            Email VARCHAR(100) NOT NULL UNIQUE,
            Fone VARCHAR(20) NOT NULL,
            Curso VARCHAR(100) NOT NULL,
            Turma VARCHAR(10) NOT NULL,
            AnoEntrada VARCHAR(4) NOT NULL,
            Nascimento VARCHAR(10) NOT NULL,
            Edital VARCHAR(3) NOT NULL,
            Bolsa VARCHAR(4) NOT NULL,
            Procur VARCHAR(4) NOT NULL,
            PeriodoTotal VARCHAR(23) NOT NULL,
            CargaTotal VARCHAR(3) NOT NULL,
            Parcelas VARCHAR(1) NOT NULL,
            Senha VARCHAR(150) NOT NULL,
            Token VARCHAR(150)
        )';
        $conn->exec($sql);

        $senha =password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $cpf = base64_encode($_POST['cpf']);

        $stmt = $conn->prepare("INSERT INTO Bolsistas (Nome, CPF, RG, Matricula, Email, Fone, Curso, Turma, AnoEntrada, Nascimento, Edital, Bolsa, Procur, PeriodoTotal, CargaTotal, Parcelas, Senha)
                                            VALUES (:nome, :cpf, :rg, :matricula, :email, :fone, :curso, :turma, :anoEntrada, :nascimento, :edital, :bolsa, :procur, :periodototal, :cargatotal, :parcelas, :senha)");
        $stmt->bindParam(':nome', $_POST['nome']);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $_POST['rg']);
        $stmt->bindParam(':matricula', $_POST['matricula']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':fone', $_POST['fone']);
        $stmt->bindParam(':curso', $_POST['curso']);
        $stmt->bindParam(':turma', $_POST['turma']);
        $stmt->bindParam(':anoEntrada', $_POST['anoEntrada']);
        $stmt->bindParam(':nascimento', $_POST['nascimento']);
        $stmt->bindParam(':edital', $_POST['edital']);
        $stmt->bindParam(':bolsa', $_POST['bolsa']);
        $stmt->bindParam(':procur', $_POST['proc']);
        $stmt->bindParam(':periodototal', $_POST['vigencia']);
        $stmt->bindParam(':cargatotal', $_POST['ch']);
        $stmt->bindParam(':parcelas', $_POST['parcelas']);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        echo '<script> alert("Dados Cadastrados com Sucesso!")</script>';
        echo '<script> location = "../../index.php";</script>';

    } catch(PDOException $e) {
        echo $sql . '<br>' . $e->getMessage();
    }
    $conn = null;
?>