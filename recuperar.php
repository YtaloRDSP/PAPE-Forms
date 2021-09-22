<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Form_PAPE</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico"/>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <script src="assets/js/recuperar.js"></script>
</head>

<body>
    <section class="login-dark" style="height: 750px;">
        <form id="form">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-earmark-lock2-fill">
                    <path d="M7 7a1 1 0 0 1 2 0v1H7V7z"></path>
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0z"></path>
                </svg></div>
            <div class="form-group"><input class="form-control" type="email" name="email" id="email" placeholder="Insira o E-mail"></div>
            <div class="form-group"><input class="form-control" type="email" name="confirma" id="confirma" placeholder="Confirme o E-mail"></div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" id="botao" type="button" onclick="enviar()">
                    <span class="spinner-border spinner-border-sm sr-only" id="carregar" role="status" aria-hidden="true"></span>
                    Enviar E-mail
                </button>
            </div>
        </form>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>