<?php
    require('credenciais.php');

    try {
        $senha =password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $token = $_POST['token'];
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE Bolsistas SET Senha='$senha', Token='' WHERE Token='$token'");
        $stmt->execute();
        echo "<script>
                alert('Senha Modificada')
                window.location.href = '../../index.php'
            </script>";
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>