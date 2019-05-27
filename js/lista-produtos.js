let clickNome = false;
let clickQuantidade = false;
let clickEstadoCritico = false;

$("#parametroSemestre").on("change", function(){
	let semestre = $(this).val();
	let filtro = $("#parametroFiltro").val().toUpperCase();
	let val = $("#busca").val();

	if(val != ""){
		val = val.toUpperCase();
	}

	let url = "get-produto.php?busca=" + val + "&filtro=" + filtro + "&semestre=" + semestre + "&parametroOrdenacao=";

	var request = $.ajax({
		url: url,
		cache: false
	});

	request.done(function(msg) {
		$('table tbody').remove();
		$('table').append("<tbody>");
		$('table tbody').append(msg);
		$('table').append("</tbody>");
		bindDeleteIcons();
	});

	request.fail(function(jqXHR, textStatus) {
		alertify.error('Falha ao buscar produtos');
	});

});

$("#busca").on("keyup", function(event) {
	let val = $(this).val();
	let filtro = $("#parametroFiltro").val().toUpperCase();
	let semestre = $("#parametroSemestre").val();

	if(val != ""){
		val = val.toUpperCase();
	}

	let url = "get-produto.php?busca=" + val + "&filtro=" + filtro + "&semestre=" + semestre + "&parametroOrdenacao=";

	var request = $.ajax({
		url: url,
		cache: false
	});

	request.done(function(msg) {
		$('table tbody').remove();
		$('table').append("<tbody>");
		$('table tbody').append(msg);
		$('table').append("</tbody>");
		bindDeleteIcons();
	});

	request.fail(function(jqXHR, textStatus) {
		alertify.error('Falha ao buscar produtos');
	});

});

$(".ordenavel").on("click", function(event)
{
	let semestre = $("#parametroSemestre").val();
	let nomeCampo = $(this).text();

	if (nomeCampo != "")
	{
		nomeCampo = nomeCampo.toUpperCase();
	}

	let url = "get-produto.php?busca=&filtro=&semestre=" + semestre + "&parametroOrdenacao=";

	if(nomeCampo == "NOME"){
		if(clickNome == false){
			url += 1;
			$("#setaNome").attr("src","img/setaCima.png");
		}else{
			url += -1;
			$("#setaNome").attr("src","img/setaBaixo.png");
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
			bindDeleteIcons();
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}
	if(nomeCampo == "QUANTIDADE"){
		if(clickQuantidade == false){
			url += 7;
			$("#setaQuantidade").attr("src","img/setaCima.png");
		}else{
			url += -7;
			$("#setaQuantidade").attr("src","img/setaBaixo.png");
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
			bindDeleteIcons();
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}
	if(nomeCampo == "")
	{
		if(clickEstadoCritico == true){
			url += 8;
			$("#setaVazio").attr("src","img/setaCima.png");
		}else{
			url += -8;
			$("#setaVazio").attr("src","img/setaBaixo.png");
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
			bindDeleteIcons();
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}
});

function bindDeleteIcons(){
	$('.delete-icon').each(function(i, obj) {
		$(obj).on("click", function(event){
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
	});
}

bindDeleteIcons();
