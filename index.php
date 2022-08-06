<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Form_PAPE</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico"/>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.21.1/docxtemplater.js"></script>
  <script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
  <script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip-utils.js"></script>
  <script src="assets/js/index.js"></script>
</head>

<body>
    <section class="login-dark" style="height: 1000px;">
        <form method="post" id="form" action="gerador.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-door-open-fill">
                    <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"></path>
                </svg>
            </div>
            <div class="form-group d-flex justify-content-center">
                <div id="buttonDiv"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="button" id="botao" onclick="enviar_aut()">
                    <span class="spinner-border spinner-border-sm sr-only" id="carregar" role="status" aria-hidden="true"></span>
                    Prosseguir
                </button>
            </div>

            <div class="form-group sr-only">
                <input class="form-control form-control-sm" type="text" id="sub" name="sub">
                <input class="form-control form-control-sm" type="text" id="email" name="email">
                <input class="form-control form-control-sm" type="text" id="nome" name="nome">
            </div>
        </form>
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>

    <script>
        function handleCredentialResponse(response) {
            const data = jwt_decode(response.credential)
            document.getElementById("sub").value = data.sub
            document.getElementById("email").value = data.email
            document.getElementById("nome").value = data.name
        }
        window.onload = function () {
            google.accounts.id.initialize({
                client_id: "287410761451-449avt3lg3ppb729n8u23lqgdj3unok9.apps.googleusercontent.com",
                callback: handleCredentialResponse
            });
            google.accounts.id.renderButton(
                document.getElementById("buttonDiv"),
                { theme: "outline", size: "large" }
            );
            // google.accounts.id.prompt(); // also display the One Tap dialog
        }
    </script>
</body>
</html>