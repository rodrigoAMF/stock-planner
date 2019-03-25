var frm = $('.formulario-produto');
var nome = $('#nome');
var catmat = $('#catmat');
var identificacao = $('#identificacao');
var estoque_ideal = $('#estoque_ideal');
var quantidade = $('#quantidade');
var categoria = $('#categoria');
var posicao = $('#posicao');
var descricao = $('#descricao');

function ehNumerico(campo){
    let string = campo.val();
    let size = string.length;

    for(let i = 0; i < size; i++){
            if(!(string[i] >= '0' && string[i] <= '9')){
                return false;
            }
        }
        return true;
    }

frm.submit(function (e) {

    e.preventDefault();

    //alert("Cheguei");

    let erros = false;

    if(identificacao.val() == ""){
        erros = true;
        identificacao.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-identificacao').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-identificacao').text('Digite uma identificação');
    }
    else{
        identificacao.removeClass("is-invalid").addClass("is-valid");
        $('#feedback-identificacao').removeClass('feedback invalid-feedback').addClass('valid-feedback');
        $('#feedback-identificacao').text('Okay!');
    }

    if(posicao.val() == ""){
        erros = true;
        posicao.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-posicao').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-posicao').text('Digite uma posição');
    }
    else{
        posicao.removeClass("is-invalid").addClass("is-valid");
        $('#feedback-posicao').removeClass('feedback invalid-feedback').addClass('valid-feedback');
        $('#feedback-posicao').text('Okay!');
    }

    if(descricao.val() == ""){
        erros = true;
        descricao.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-descricao').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-descricao').text('Digite uma descrição');
    }
    else{
        descricao.removeClass("is-invalid").addClass("is-valid");
        $('#feedback-descricao').removeClass('feedback invalid-feedback').addClass('valid-feedback');
        $('#feedback-descricao').text('Okay!');
    }

    if(nome.val() == ""){
        erros = true;
        nome.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-nome').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-nome').text('Digite um nome');
    }
    else{
        nome.removeClass("is-invalid").addClass("is-valid");
        $('#feedback-nome').removeClass('feedback invalid-feedback').addClass('valid-feedback');
        $('#feedback-nome').text('Okay!');
    }

    if(catmat.val() == "" || !ehNumerico(catmat)){
        erros = true;
        catmat.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-catmat').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-catmat').text('Digite um número');
    }
    else{
        catmat.removeClass("is-invalid").addClass("is-valid");
        $('#feedback-catmat').removeClass('feedback invalid-feedback').addClass('valid-feedback');
        $('#feedback-catmat').text('Okay!');
    }

    if(estoque_ideal.val() == "" || !ehNumerico(estoque_ideal)){
        erros = true;
        estoque_ideal.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-estoque_ideal').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-estoque_ideal').text('Digite um número');
    }
    else{
        estoque_ideal.removeClass("is-invalid").addClass("is-valid");
        $('#feedback-estoque_ideal').removeClass('feedback invalid-feedback').addClass('valid-feedback');
        $('#feedback-estoque_ideal').text('Okay!');
    }

    if(quantidade.val() == "" || !ehNumerico(quantidade)){
        erros = true;
        quantidade.removeClass("is-valid").addClass("is-invalid");
        $('#feedback-quantidade').removeClass('feedback valid-feedback').addClass('invalid-feedback');
        $('#feedback-quantidade').text('Digite um número');
    }
    else{
        quantidade.removeClass("is-invalid").addClass("is-valid");
        $('#feedback-quantidade').removeClass('feedback invalid-feedback').addClass('valid-feedback');
        $('#feedback-quantidade').text('Okay!');
    }

    if(!erros){
        var request = $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            dataType: "html"
        });

        request.done(function(msg) {
            alert("Produto editado com Sucesso!");
        });

        request.fail(function(jqXHR, textStatus) {
            alert("Falha ao editar produto: " + textStatus);
        });
    }


});
