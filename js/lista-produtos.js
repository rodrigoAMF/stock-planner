let clickNome = false;
let clickQuantidade = false;
let clickEstadoCritico = false;

$("#busca").on("keyup", function(event) {
	let val = $(this).val();
	let filtro = $("#parametroFiltro").val().toUpperCase();

	if(val != ""){
		val = val.toUpperCase();
	}

	let url = "get-produto.php?busca=" + val + "&filtro=" + filtro + "&parametroOrdenacao=";

	var request = $.ajax({
		url: url,
		cache: false
	});

	request.done(function(msg) {
		$('table tbody').remove();
		$('table').append("<tbody>");
		$('table tbody').append(msg);
		$('table').append("</tbody>");
	});

	request.fail(function(jqXHR, textStatus) {
		alertify.error('Falha ao buscar produtos');
	});

});

$(".ordenavel").on("click", function(event)
{
	let nomeCampo = $(this).text();

	if (nomeCampo != "")
	{
		nomeCampo = nomeCampo.toUpperCase();
	}

	if(nomeCampo == "NOME"){
		let url = "get-produto.php?busca=&filtro=&parametroOrdenacao=";
		if(clickNome == false){
			url += 1;
		}else{
			url += -1;
		}

		clickNome = !clickNome;

		var request = $.ajax({
			url: url,
			cache: false
		});

		request.done(function(msg) {
			$('table tbody').remove();
			$('table').append("<tbody>");
			$('table tbody').append(msg);
			$('table').append("</tbody>");
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}
	if(nomeCampo == "QUANTIDADE"){
		let url = "get-produto.php?busca=&filtro=&parametroOrdenacao=";
		if(clickQuantidade == false){
			url += 7;
		}else{
			url += -7;
		}

		clickQuantidade = !clickQuantidade;

		var request = $.ajax({
			url: url,
			cache: false
		});

		request.done(function(msg) {
			$('table tbody').remove();
			$('table').append("<tbody>");
			$('table tbody').append(msg);
			$('table').append("</tbody>");
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}
	if(nomeCampo == "")
	{
		let url = "get-produto.php?busca=&filtro=&parametroOrdenacao=";
		if(clickEstadoCritico == false){
			url += 8;
		}else{
			url += -8;
		}

		clickEstadoCritico = !clickEstadoCritico;

		var request = $.ajax({
			url: url,
			cache: false
		});

		request.done(function(msg) {
			$('table tbody').remove();
			$('table').append("<tbody>");
			$('table tbody').append(msg);
			$('table').append("</tbody>");
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}

});

$(".delete-icon").on('click', function(event){
	event.preventDefault();

	let btn = $(this);
	let url = $(this).attr('href');

	alertify.confirm().set('resizable',true).resizeTo(500,250); 
	alertify.confirm('Confirmar','Deseja realmente excluir este item?',
		function(){

			var request = $.ajax({
	            url: url,
	            cache: false
	        });

	        request.done(function(msg) {
	        	btn.parent().parent().remove();
	            alertify.success('Produto excluido com sucesso!');
	        });

	        request.fail(function(jqXHR, textStatus) {
	        	alertify.error('Falha ao exluir produto.');
	            alert("Falha ao cadastrar produto: " + textStatus);
	        });


		},
		function(){
			alertify.notify('Cancelado');
		}).setting({'labels':{ok:'Sim',cancel:'Não'},
					'transition':'zoom'
		});
});
