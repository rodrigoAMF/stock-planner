var frm = $('.recupera-senha');
var email = $('#email');
var codigoDigitado = $('#codigo');
var codigoGerado;

$('#btnConfere').on('click',function(){
    if(codigoDigitado.val() == codigoGerado)
    {
        window.location.href = "nova-senha.php";
    }
    else{
        alertify.error('Código errado!');
    }   
})

frm.submit(function (e) {
    e.preventDefault();

    let erros = false;

    if(email.val() == ""){
        erros = true;
        
    }
    
    if(!erros){
        localStorage.setItem("emailRecuperacao",email.val());
        var request = $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            dataType: "html"
        });

        request.done(function(msg) {

            if (msg === "1") {
                document.getElementById('div1').style.visibility = 'hidden';
                document.getElementById('div2').style.visibility = 'visible';
                // criar outro request para criar numero aleatorio e enviar o email
                var request2 = $.ajax({
                    type: frm.attr('method'),
                    url: "gera-codigo.php",
                    data: frm.serialize(),
                    cache: false
                });

                request2.done(function(msg2){
                    codigoGerado = msg2;
                    
                });

                request2.fail(function(jqXHR, textStatus){
                    let mensagem = "Falha ao enviar e-mail!";
                    alertify.alert('Mensagem de sistema', mensagem).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
                });
            }else{
                alert("E-mail não cadastrado no banco de dados!");
            }
        });

        request.fail(function(jqXHR, textStatus) {
            let mensagem = "Falha ao cadastrar usuario: " + textStatus;
            alertify.alert('Mensagem de sistema', mensagem).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
        });
    }else{
        email.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-email').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-email').text('Digite um email');    
    }
});



