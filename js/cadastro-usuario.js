var frm = $('.formulario-login');
var nome = $('#nome');
var username = $('#username');
var email = $('#email');
var senha = $('#senha');
var senhaConfirma = $('#senhaConfirma');

frm.submit(function (e) {
    e.preventDefault();

    let erros = false;

    if(nome.val() == "" || username.val() == "" || email.val() == "" || senha.val() == "" || senhaConfirma.val() == ""){
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
            console.log(msg);
            var obj = jQuery.parseJSON(msg);

            if (obj.status === 1) {
                nome.removeClass('is-valid is-invalid');
                $('#feedback-nome').removeClass('valid-feedback invalid-feedback').addClass('feedback');

                username.removeClass('is-valid is-invalid');
                $('#feedback-username').removeClass('valid-feedback invalid-feedback').addClass('feedback');

                email.removeClass('is-valid is-invalid');
                $('#feedback-email').removeClass('valid-feedback invalid-feedback').addClass('feedback');

                senha.removeClass('is-valid is-invalid');
                $('#feedback-senha').removeClass('valid-feedback invalid-feedback').addClass('feedback');

                senhaConfirma.removeClass('is-valid is-invalid');
                $('#feedback-senhaConfirma').removeClass('valid-feedback invalid-feedback').addClass('feedback');

                nome.val('');
                username.val('');
                email.val('');
                senha.val('');
                senhaConfirma.val('');
                alertify.alert('Mensagem de sistema', 'Usuário cadastrado com Sucesso!', function () {
                    document.location.href = "index.php";
                }).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
            }
            else if(obj.status === -1){
                nome.removeClass("is-invalid").addClass("is-valid");
                $('#feedback-nome').removeClass('feedback invalid-feedback').addClass('valid-feedback');
                $('#feedback-nome').text('Okay!');

                username.removeClass("is-invalid").addClass("is-valid");
                $('#feedback-username').removeClass('feedback invalid-feedback').addClass('valid-feedback');
                $('#feedback-username').text('Okay!');

                email.removeClass("is-invalid").addClass("is-valid");
                $('#feedback-email').removeClass('feedback invalid-feedback').addClass('valid-feedback');
                $('#feedback-email').text('Okay!');

                senha.removeClass("is-invalid").addClass("is-valid");
                $('#feedback-senha').removeClass('feedback invalid-feedback').addClass('valid-feedback');
                $('#feedback-senha').text('Okay!');

                senhaConfirma.removeClass("is-invalid").addClass("is-valid");
                $('#feedback-senhaConfirma').removeClass('feedback invalid-feedback').addClass('valid-feedback');
                $('#feedback-senhaConfirma').text('Okay!');

                for(let i = 0; i < obj.erros.length; i++){
                    if(obj.erros[i]['nome_do_campo'] == 'nome'){
                        nome.removeClass("is-valid").addClass("is-invalid");
                        $('#feedback-nome').removeClass('feedback valid-feedback').addClass('invalid-feedback');
                        $('#feedback-nome').text(obj.erros[i]['mensagem']);
                    }
                    if(obj.erros[i]['nome_do_campo'] == 'username'){
                        username.removeClass("is-valid").addClass("is-invalid");
                        $('#feedback-username').removeClass('feedback valid-feedback').addClass('invalid-feedback');
                        $('#feedback-username').text(obj.erros[i]['mensagem']);
                    }
                    if(obj.erros[i]['nome_do_campo'] == 'email'){
                        email.removeClass("is-valid").addClass("is-invalid");
                        $('#feedback-email').removeClass('feedback valid-feedback').addClass('invalid-feedback');
                        $('#feedback-email').text(obj.erros[i]['mensagem']);
                    }
                    if(obj.erros[i]['nome_do_campo'] == 'senha'){
                        senha.removeClass("is-valid").addClass("is-invalid");
                        $('#feedback-senha').removeClass('feedback valid-feedback').addClass('invalid-feedback');
                        $('#feedback-senha').text(obj.erros[i]['mensagem']);
                    }
                }
            }
            else if(obj.status === -2) {
                alertify.alert("Username duplicado");
            }else if(obj.status === -3) {
                alertify.alert("Email duplicado");
            }

        });

        request.fail(function(jqXHR, textStatus) {
            let mensagem = "Falha ao cadastrar usuario: " + textStatus;
            alertify.alert('Mensagem de sistema', mensagem).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
        });
    }else{
        if(nome.val() == ""){
            nome.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-nome').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-nome').text('Digite um nome');
        }
        else{
            nome.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-nome').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-nome').text('Okay!');
        }

        if(username.val() == ""){
            username.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-username').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-username').text('Digite um username');
        }
        else{
            username.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-username').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-username').text('Okay!');
        }

        if(email.val() == ""){
            email.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-email').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-email').text('Digite um email');
        }
        else{
            email.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-email').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-email').text('Okay!');
        }

        if(senha.val() == ""){
            senha.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-senha').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-senha').text('Digite uma senha');
        }
        else{

            senha.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-senha').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-senha').text('Okay!');
        }

        if(senhaConfirma.val() == ""){
            senhaConfirma.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-senhaConfirma').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-senhaConfirma').text('Digite uma senha para confirmação');
        }
        else{
            senhaConfirma.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-senhaConfirma').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-senhaConfirma').text('Okay!');
        }

    }
});