<?php
    require('credenciais.php');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT ID, Nome FROM Bolsistas ORDER BY Nome");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($result){
            foreach($result as $linha){
                echo "<option value=".$linha["ID"].">".$linha["Nome"]."</option>";
            }
        }                
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>