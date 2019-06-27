var frm = $('.formulario-emprestimo');
var nome = $('#nome');
var dataEmprestimo = $('#dataEmprestimo');
var email = $('#email');
var documento = $('#documento');

frm.submit(function (e) {
    e.preventDefault();

    let erros = false;
    console.log(frm.serialize());

    //fazer um ajax para poder acessa a lista de produtos no processa-emprestimo

    if(nome.val() == "" || dataEmprestimo == "" || email == "" || documento == ""){
        erros = true;
    }
    if(!erros){


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

        if(dataEmprestimo.val() == ""){
            dataEmprestimo.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-dataEmprestimo').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-dataEmprestimo').text('Digite a data emprestimo');
        }
        else{
            dataEmprestimo.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-dataEmprestimo').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-dataEmprestimo').text('Okay!');
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

        if(documento.val() == ""){
            documento.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-senha').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-senha').text('Digite uma senha');
        }
        else{
            documento.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-senha').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-senha').text('Okay!');
        }
    }

});

