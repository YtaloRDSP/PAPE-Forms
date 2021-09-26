<!DOCTYPE html>
<html lang="en">
    <?php
        require('credenciais.php');

        try {
            $email = $_GET['email'];
            $token = $_GET['token'];

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT Token FROM Bolsistas WHERE Email='$email'");
            $stmt->execute();
            $result = $stmt->fetch();
            if($token != $result['Token']){
                echo "<script>
                        alert('Token Invalido')
                        window.location.href = 'index.php'
                    </script>";
            }
        } catch(PDOException $e) {
            echo $stmt . '<br>' . $e->getMessage();
        }
        $conn = null;
    ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Form_PAPE</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico"/>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
  <section class="login-dark" style="height: 750px;">
    <form method="post" action="assets/database/nova_senha.php">
      <h2 class="sr-only">Login Form</h2>
      <div class="illustration"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
          fill="none">
          <path
            d="M6 12C6 12.5523 5.55228 13 5 13C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11C5.55228 11 6 11.4477 6 12Z"
            fill="currentColor"></path>
          <path
            d="M9 13C9.55228 13 10 12.5523 10 12C10 11.4477 9.55228 11 9 11C8.44771 11 8 11.4477 8 12C8 12.5523 8.44771 13 9 13Z"
            fill="currentColor"></path>
          <path
            d="M14 12C14 12.5523 13.5523 13 13 13C12.4477 13 12 12.5523 12 12C12 11.4477 12.4477 11 13 11C13.5523 11 14 11.4477 14 12Z"
            fill="currentColor"></path>
          <path d="M20 11H16V13H20V11Z" fill="currentColor"></path>
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M2 6C0.895431 6 0 6.89543 0 8V16C0 17.1046 0.89543 18 2 18H22C23.1046 18 24 17.1046 24 16V8C24 6.89543 23.1046 6 22 6H2ZM22 8H2L2 16H22V8Z"
            fill="currentColor"></path>
        </svg></div>
      <div class="form-group"><input class="form-control" type="password" name="senha" id="senha" placeholder="Insira a Nova Senha"></div>
      <div class="form-group"><input class="form-control" type="password" name="confirma" id="confirma" placeholder="Confirme a Nova Senha"></div>
      <div class="form-group sr-only"><input class="form-control" type="text" name="token" value='<?=$token?>'></div>
      <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Alterar Senha</button></div>
    </form>
  </section>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>