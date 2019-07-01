let clickNome = false;
let clickQuantidade = false;

$("#parametroSemestre").on("change", function(){
	
	let semestre = $(this).val();
	//alert(semestre);
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
		//console.log(msg);
		var obj = jQuery.parseJSON(msg);
		console.log(obj);
		$('table tbody').remove();
		$('table').append("<tbody>");
		$('table tbody').append(msg);
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
		$("table tbody").remove();
		$("table").append("<tbody>");
		$("table tbody").append(msg);
		$("table").append("</tbody>");
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