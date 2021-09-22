<?php
    require('credenciais.php');
    session_start();

    try {
        $id = $_GET['id'];
        $senha = $_GET['senha'];

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Senha FROM Bolsistas WHERE ID='".$id."'");
        $stmt->execute();
        $result = $stmt->fetch();
        if(password_verify($_GET['senha'], $result['Senha'])){
            $stmt = $conn->prepare("SELECT * FROM Bolsistas WHERE ID='$id'");
            $stmt->execute();
            $result = $stmt->fetch();
            $result['CPF'] = base64_decode($result['CPF']);
            echo json_encode($result);
        }
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>