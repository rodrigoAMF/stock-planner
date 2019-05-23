let frm = $('#formulario-login');

frm.submit(function (e) {
    e.preventDefault();

    let request = $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        dataType: "html"
    });

    request.done(function(msg) {
        if(msg === "1"){
            window.location.href = "inicio.php";
        }else{
            alertify.alert("Email ou senha incorretos!");
        }

    });
});