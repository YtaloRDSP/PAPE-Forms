<?php

    require('credenciais.php');
    session_start();

    $token = '';

    require_once('src/PHPMailer.php');
    require_once('src/SMTP.php');
    require_once('src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    try {
        $email = $_POST['email'];
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Bolsistas WHERE Email='".$email."'");
        $stmt->execute();
        $result = $stmt->fetch();
        if($result){
            $nome = $result['Nome'];
            echo $nome + ' ';
            $token= uniqid();
            echo $token + ' ';
            $stmt = $conn->prepare("UPDATE Bolsistas SET Token='$token' WHERE Email='$email'");
            $stmt->execute();

            $usuario = getenv("Usuario");
            $senha = getenv("Senha");

            $mail = new PHPMailer(true);

            try{
                //configuração de servidor
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;//habilita debug
                $mail->isSMTP();//confirma que é SMTP
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username=$usuario;
                $mail->Password=$senha;
                $mail->Port = 587;

                $mail->setFrom($usuario, 'PAPE Forms');//quem envia
                $mail->addAddress($email);//quem recebe

                $mail->isHTML(true);
                $mail->Subject = 'Recuperar Senha';
                $mail->Body="<h1>Solicitação de Recuperação de Senha - PAPE Forms</h1>
                            <p>Olá, $nome <br>Recebemos uma solicitação de alteração de senha no Gerador de Relatórios do PAPE em seu nome.<br>
                            Para alterar clique no link abaixo, se não foi você, desconsidere essa mensagem.</p>
                            <a href='http://localhost/PAPE-Forms/PAPE/modificar.php?email=$email&token=$token'>Ir para a página</a>";
                $mail->AltBody='Solicitação de Troca de Senha';
                echo $mail;
                if($mail->send()){
                    echo 'sucesso';
                }

            } catch(Exception $e){
                echo 'Falha de Envio do Email';
            }
        } else{
            echo "invalido";
        }
    } catch(PDOException $e) {
        echo 'Falha no Banco de Dados';
    }
    $conn = null;
?>