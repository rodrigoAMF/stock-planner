var frm = $('.formulario-produto');

frm.submit(function (e) {
    e.preventDefault();

    var request = $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        dataType: "html"
    });

    request.done(function(msg) {
        alert("Produto cadastrado com Sucesso!");
        frm.trigger("reset");
    });

    request.fail(function(jqXHR, textStatus) {
        alert("Falha ao cadastrar produto: " + textStatus);
    });

});
