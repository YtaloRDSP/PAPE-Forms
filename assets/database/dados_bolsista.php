<?php
    require('credenciais.php');
    session_start();

    try {
        $sub = $_GET['sub'];
        
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Bolsistas WHERE Sub='".$sub."'");
        $stmt->execute();
        $result = $stmt->fetch();
        $result['CPF'] = base64_decode($result['CPF']);
        echo json_encode($result);
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>