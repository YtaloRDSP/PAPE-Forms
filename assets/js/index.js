function enviar_aut() {
    if(document.getElementById("nome").value == '' || document.getElementById("email").value == '' || document.getElementById("sub").value == ''){
        alert("Autenticação Google não foi Realizada")
        return
    }
    else {
        var envio = new XMLHttpRequest();
        envio.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == '0') {
                    document.getElementById("form").action = "cadastro.php"
                    document.getElementById("form").submit()
                } else {
                    document.getElementById("form").submit()
                }
            }
        };
        envio.open("GET", "assets/database/check_bolsista.php?sub=" + sub.value, true);
        envio.send();
    }
}