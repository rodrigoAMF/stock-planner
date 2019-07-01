var listaDeProdutos = [];

$('#emprestar').on('click',function(){
    //Ficticio
    
    var produto1 = JSON.stringify({
        Id: 1,
        Quantidade: 25
    });
    var produto2 = JSON.stringify({
        Id : 2,
        Quantidade : 25
    });
    listaDeProdutos.push(produto1);
    listaDeProdutos.push(produto2);
    //Real
    sessionStorage.setItem("listaDeProdutos", JSON.stringify(listaDeProdutos));
    window.location.href = "formulario-emprestimo.php";
});





