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
  <script src="assets/js/cadastro.js"></script>
</head>

<body>
  <section class="login-dark" style="height: 1500px;font-weight: bold;">
    <form method="post" id="form" style="width: 412px;height: auto;" action="assets/database/cad_bolsista.php">
      <h2 class="sr-only">Login Form</h2>
      <div class="illustration" style="padding-top: 0px;padding-bottom: 5px;"><svg xmlns="http://www.w3.org/2000/svg"
          width="1em" height="1em" viewBox="0 0 24 24" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M8 11C10.2091 11 12 9.20914 12 7C12 4.79086 10.2091 3 8 3C5.79086 3 4 4.79086 4 7C4 9.20914 5.79086 11 8 11ZM8 9C9.10457 9 10 8.10457 10 7C10 5.89543 9.10457 5 8 5C6.89543 5 6 5.89543 6 7C6 8.10457 6.89543 9 8 9Z"
            fill="currentColor"></path>
          <path
            d="M11 14C11.5523 14 12 14.4477 12 15V21H14V15C14 13.3431 12.6569 12 11 12H5C3.34315 12 2 13.3431 2 15V21H4V15C4 14.4477 4.44772 14 5 14H11Z"
            fill="currentColor"></path>
          <path d="M18 7H20V9H22V11H20V13H18V11H16V9H18V7Z" fill="currentColor"></path>
        </svg></div><span class="text-center"
        style="margin: auto;"><br>Digite&nbsp;os&nbsp;dados&nbsp;de&nbsp;acordo&nbsp;com&nbsp;o
        Termo&nbsp;de&nbsp;Concessão&nbsp;de&nbsp;Bolsa<br></span>
      <div>
        <div class="text-center" id="alerta"></div>
        <hr style="color: var(--gray);border-color: var(--gray);">
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="nome" name="nome" placeholder="Nome Completo">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="cpf" name="cpf" placeholder="CPF">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="rg" name="rg" placeholder="RG">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="matricula" name="matricula" placeholder="Matricula">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="E-mail">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="fone" name="fone" placeholder="Telefone">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="curso" name="curso" placeholder="Curso" value="Engenharia de Controle e Automação">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="turma"  name="turma" placeholder="Turma">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="anoEntrada" name="anoEntrada" placeholder="Ano de Entrada">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="nascimento" name="nascimento" placeholder="Data de Nascimento">
        </div>
        <hr style="border-color: var(--secondary);">
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="edital" name="edital" placeholder="Número do Edital">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="bolsa" name="bolsa" placeholder="Número do Termo de Bolsa">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="proc" name="proc" placeholder="Número de Proc.">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="vigencia" name="vigencia" placeholder="Vigência do Contrato">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="ch" name="ch" placeholder="Carga Horária">
        </div>
        <div class="form-group">
          <input class="form-control form-control-sm" type="text" id="parcelas" name="parcelas" placeholder="Parcelas">
        </div>
        <div class="form-group sr-only">
          <input class="form-control form-control-sm" type="text" id="sub" name="sub">
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block" type="button" onclick="enviar()">Cadastrar Bolsista</button>
        </div>
      </div>
    </form>
  </section>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#cpf').mask('000.000.000-00')
      $('#rg').mask('000000000000')
      $('#matricula').mask('0000000000')
      $('#fone').mask('(00) 00000-0000')
      $('#anoEntrada').mask('0000')
      $('#nascimento').mask('00/00/0000')
      $('#edital').mask('000')
      $('#bolsa').mask('0000')
      $('#proc').mask('0000')
      $('#vigencia').mask('00/00/0000 a 00/00/0000')
      $('#ch').mask('000')
      $('#parcelas').mask('0')
    });

    document.getElementById("sub").value = post_sub
    document.getElementById("email").value = post_email
    document.getElementById("nome").value = post_nome
    // sub.value = post_sub
    // email.value = post_email
    // nome.value = post_nome
  </script>
</body>

</html>