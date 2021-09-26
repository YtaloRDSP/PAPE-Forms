function enviar(){
    $( "#carregar" ).removeClass( "sr-only" )
    $("#botao").prop("disabled", true);

    var request = ''
    email = document.getElementById("email").value
    confirma = document.getElementById("confirma").value
    if(email == confirma && email.includes('@')){
        request = $.ajax({
            url: "assets/database/email.php",
            type: "post",
            data: "email="+email
        });
        request.done(function (response, textStatus, jqXHR){
            console.log(response);
            if(response=='sucesso'){
                alert('E-mail enviado');
                window.location.href="index.php";
            } else{
                alert('E-mail não se encontra no nosso sistema');
            }
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $( "#carregar" ).addClass( "sr-only" )
            $("#botao").prop("disabled", false);
        });
    } else{
        $( "#carregar" ).addClass( "sr-only" )
        $("#botao").prop("disabled", false);
        alert("Dados incorretos");
    }
}