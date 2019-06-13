var frm = $('.nova-senha');
var senha = $('#senha');
var senhaConfirma = $('#senhaConfirma');
var email = localStorage.getItem("emailRecuperacao");

frm.submit(function (e) {
    e.preventDefault();

    let erros = false;

    if(senha.val() == senhaConfirma.val() && !erros)
    {  
        let url = 'processa-nova-senha.php?email='+email+"&senha="+senha.val();
        var request = $.ajax({
            type: frm.attr('method'),
            url: url,
            data: frm.serialize(),
            dataType: "html"
        });

        request.done(function(msg) {
            if (msg === "1") {
                
                alertify.sucess("Senha atualizada!")
            }else{
                alertify.error("A senha não foi atualizada!")
            }
        });

        request.fail(function(jqXHR, textStatus) {
            let mensagem = "Falha ao cadastrar usuario: " + textStatus;
            alertify.alert('Mensagem de sistema', mensagem).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
        });

        window.location.href = "index.php";
    }
    else{
        alertify.error("A senha não foi atualizada!")
    }

    // if(!erros){
    //     var request = $.ajax({
    //         type: frm.attr('method'),
    //         url: frm.attr('action'),
    //         data: frm.serialize(),
    //         dataType: "html"
    //     });

    //     request.done(function(msg) {

    //         if (msg === "1") {
                
    //         }else{
    //             alert("E-mail não cadastrado no banco de dados!");
    //         }
    //     });

    //     request.fail(function(jqXHR, textStatus) {
    //         let mensagem = "Falha ao cadastrar usuario: " + textStatus;
    //         alertify.alert('Mensagem de sistema', mensagem).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
    //     });
    // }else{
    //     email.removeClass("is-valid").addClass("is-invalid");
    //     $('#feedback-email').removeClass('feedback valid-feedback').addClass('invalid-feedback');
    //     $('#feedback-email').text('Digite um email');    
    // }
});