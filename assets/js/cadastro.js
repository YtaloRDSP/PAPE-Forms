function enviar() {
    if(document.getElementById("nome").value == ''){
        alert("Nome não Preenchido")
        return
    }
    document.getElementById("nome").value = document.getElementById("nome").value.toUpperCase()
    
    if(document.getElementById("cpf").value.length != 14){
        alert("CPF Incompleto")
        return
    }
    if(document.getElementById("rg").value.length == 0){
        alert("RG não Preenchido")
        return
    }
    if(document.getElementById("matricula").value.length != 10){
        alert("Matricula Incompleta")
        return
    }
    if(!document.getElementById("email").value.includes('@')){
        alert("Email Incorreto")
        return
    }
    if(document.getElementById("fone").value.length != 15){
        alert("Telefone Incompleto")
        return
    }
    if(document.getElementById("curso").value == ''){
        alert("Curso não Preenchido")
        return
    }
    if(document.getElementById("curso_fic").value == ''){
        alert("Curso não Preenchido")
        return
    }
    if(document.getElementById("turma").value == ''){
        alert("Turma não Preenchida")
        return
    }
    document.getElementById("turma").value = document.getElementById("turma").value.toUpperCase()

    if(document.getElementById("anoEntrada").value.length != 4){
        alert("Ano de Entrada Incorreto")
        return
    }
    if(document.getElementById("nascimento").value.length != 10){
        alert("Data de Nascimento Incorreta")
        return
    }
    if(document.getElementById("edital").value.length != 3){
        alert("Numero de Edital Incorreto")
        return
    }
    if(document.getElementById("bolsa").value.length != 4){
        alert("Numero de Bolsa Incompleto")
        return
    }
    if(document.getElementById("proc").value.length != 4){
        alert("Numero de Proc Incompleto")
        return
    }
    if(document.getElementById("vigencia").value.length != 23){
        alert("Vigencia da Bolsa Incompleta")
        return
    }
    if(document.getElementById("ch").value.length < 2){
        alert("Carga Horária Incorreta")
        return
    }
    if(document.getElementById("parcelas").value == ''){
        alert("Número de Parcelas não Informado")
        return
    }
    if(document.getElementById("sub").value == ''){
        alert("Autenticação Google apresentou falha")
        return
    }
    document.getElementById("form").submit()
    return
}