var frm = $('.recupera-senha');
var email = $('#email');

frm.submit(function (e) {
    e.preventDefault();

    let erros = false;

    if(email.val() == ""){
        erros = true;
    }

    if(!erros){
        var request = $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            dataType: "html"
        });

        request.done(function(msg) {

            if (msg === "1") {
                // criar outro request para criar numero aleatorio e enviar o email
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