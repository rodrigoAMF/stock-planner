let clickNome = false;
let clickQuantidade = false;

$("#parametroSemestre").on("change", function(){
	
	let semestre = $(this).val();
	let filtro = 'NOME';
	let val = $("#busca").val();

	if(val != ""){
		val = val.toUpperCase();
	}

	let url = "get-produto-cadastrado-quantidade.php?busca=&filtro=&parametroOrdenacao=" + "&semestre=" + semestre;

	var request = $.ajax({
		url: url,
		cache: false
	});

	request.done(function(msg) {
		var obj = jQuery.parseJSON(msg);
		var valorTabela = "";
		$('table tbody').remove();
		$('table thead').remove();
		valorTabela += "<thead>";
		valorTabela += '<tr><th></th><th colspan="4">Quantidade</th></tr><tr><th class="sticky">Nome</th>';
		
		for (let index = 0; index < obj['semestre'].length; index++) {
			valorTabela += '<th class="ordenavel sticky" id="borda">'+ obj['semestre'][index] + "</th>";
		}
		valorTabela += "</tr></thead>";
		$('table').append(valorTabela);
		$('table').append("<tbody>");
		$('table tbody').append(obj['produtos']);
		$('table').append("</tbody>");
	});

	request.fail(function(jqXHR, textStatus) {
		alertify.error('Falha ao buscar produtos');
	});

});

$("#busca").on("keyup", function(event) {
	let val = $(this).val();
	let filtro = 'NOME';

	if(val != ""){
		val = val.toUpperCase();
	}

	let url = "get-produto-cadastrado-quantidade.php?busca=" + val + "&filtro=" + filtro + "&semestre=&parametroOrdenacao=";

	var request = $.ajax({
		url: url,
		cache: false
	});

	request.done(function(msg) {
		var obj = jQuery.parseJSON(msg);
		var valorTabela = "";
		$('table tbody').remove();
		$('table thead').remove();
		valorTabela += "<thead>";
		valorTabela += '<tr><th></th><th colspan="4">Quantidade</th></tr><tr><th class="ordenavel sticky">Nome<img src="img/setaBaixo.png" id="setaNome"></th>';
		
		for (let index = 0; index < obj['semestre'].length; index++) {
			valorTabela += '<th class="ordenavel sticky" id="borda">'+ obj['semestre'][index] + "</th>";
		}
		valorTabela += "</tr></thead>";
		$('table').append(valorTabela);
		$('table').append("<tbody>");
		$('table tbody').append(obj['produtos']);
		$('table').append("</tbody>");
	});

	request.fail(function(jqXHR, textStatus) {
		alertify.error('Falha ao buscar produtos');
	});
	

});

$(".ordenavel").on("click", function(event)
{

	let nomeCampo = "NOME";

	let url = "get-produto-cadastrado-quantidade.php?busca=&filtro=&semestre=&parametroOrdenacao=";

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
			console.log(msg);
			var obj = jQuery.parseJSON(msg);
			$('table tbody').remove();
			$('table').append("<tbody>");
			$('table tbody').append(obj['produtos']);
			$('table').append("</tbody>");
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}	
});