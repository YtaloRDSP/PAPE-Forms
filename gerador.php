<!DOCTYPE html>
<html lang="en">

<script>
  var post_sub = "<?=$_POST['sub']?>"
  var post_email = "<?=$_POST['email']?>"
  var post_nome = "<?=$_POST['nome']?>"
</script>

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
  <script src="assets/js/gerador.js"></script>
</head>

<body>
  <section class="login-dark" style="height: 1000px;">
    <form method="post">
      <h2 class="sr-only">Login Form</h2>
      <div class="illustration"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
          viewBox="0 0 16 16" class="bi bi-door-open-fill">
          <path
            d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z">
          </path>
        </svg>
      </div>
      <div class="form-group">
        <input class="form-control" type="text" id="nome" name="nome" disabled>
      </div>
      <div class="form-group"><select class="form-control" name="doc" id="doc" style="color: #6f7a85;">
          <option value="" selected="" disabled="disabled">Escolha o Documento</option>
          <option value="rel">Relatório Mensal</option>
          <option value="plano">Plano de Trabalho</option>
        </select></div>
      <div id="plano">
        <div class="form-group"><select class="form-control" id="tutor" style="color: #6f7a85;">
            <option value="" selected="" disabled="disabled">Escolha o Tutor</option>
            <option value="Jeanne">Jeanne Moreira de Sousa</option>
            <option value="Jose">José Carlos Ferreira Souza</option>
            <option value="Luana">Luana Monteiro da Silva</option>
          </select></div>
      </div>
      <div id="relatorio">
        <div class="form-group">
          <input class="form-control" type="text" id="parcela" placeholder="Parcela do Mês Atual" name="parcela">
        </div>
        <div class="form-group">
          <input class="form-control" type="text" id="periodoMensal" placeholder="Período Mensal" name="periodoMensal">
        </div>
        <div class="form-group">
          <input class="form-control" type="text" id="chMensal" placeholder="Carga Horária Mensal" name="chMensal">
        </div>
      </div>
      <div class="form-group sr-only">
        <input class="form-control" type="text" id="sub" name="sub">
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="button" id="botao" onclick="geraDoc()">
          <span class="spinner-border spinner-border-sm sr-only" id="carregar" role="status" aria-hidden="true"></span>
          Gerar Documento
        </button>
      </div>
    </form>
  </section>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#parcela').mask("0")
      $('#periodoMensal').mask('00/00/0000 a 00/00/0000')
      $('#chMensal').mask("00")
      $('#relatorio').hide()
      $('#tutor').hide()
      $('#doc').change()
    });
    $('#doc').change(function(){
      tipoDoc = $('#doc').val();
      
      if(tipoDoc == "rel"){
        $('#tutor').hide(250);
        $('#relatorio').show(250);
      }
      if(tipoDoc == "plano"){
        $('#relatorio').hide(250);
        $('#tutor').show(250);
      }
    }).change();

    document.getElementById("nome").value = post_nome
    document.getElementById("sub").value = post_sub

  </script>
</body>

</html>