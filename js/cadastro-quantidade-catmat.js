let clickNome = false;

$("#busca").on("keyup", function(event) {
	let val = $(this).val();
	let filtro = $("#parametroFiltro").val().toUpperCase();
	let semestre = $("#parametroSemestre").text();
	//alert(val);
	if(val != ""){
		val = val.toUpperCase();
	}

	let url = "get-produto-cadastrado.php?busca=" + val + "&filtro=" + filtro + "&parametroOrdenacao=";
	//alert(url);
	var request = $.ajax({
		url: url,
		cache: false
	});

	request.done(function(msg) {
		$('table tbody').remove();
		$('table').append("<tbody>");
		$('table tbody').append(msg);
		$('table').append("</tbody>");
		bindDoubleClickTable();
		bindCheckIcons();
	});

	request.fail(function(jqXHR, textStatus) {
		alertify.error('Falha ao buscar produtos');
	});

});

$(".ordenavel").on("click", function(event)
{
	let semestre = $("#parametroSemestre").text();
	let nomeCampo = $(this).text();

	if (nomeCampo != "")
	{
		nomeCampo = nomeCampo.toUpperCase();
	}

	let url = "get-produto-cadastrado.php?busca=&filtro=&parametroOrdenacao=";

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
			bindDoubleClickTable();
			bindCheckIcons();
		});

		request.fail(function(jqXHR, textStatus) {
			alertify.error('Falha ao ordenar produtos');
		});
	}
	
	
});
function bindDoubleClickTable(){
	$("#tabelaEditavel td").dblclick(function () {
		if($(this).attr('class') === "nomeNaoEditavel"){
			return;
		}
		var conteudoOriginal = $(this).text();

		$(this).addClass("celulaEmEdicao");
		$(this).html("<input type='text' value='" + conteudoOriginal + "' class='form-control' width='100%' />");
		$(this).children().first().focus();
		
		$(this).children().first().keypress(function (e) {
			if (e.which == 13) {
				var novoConteudo = $(this).val();
				$(this).parent().text(novoConteudo);
				$(this).parent().removeClass("celulaEmEdicao");
			}
		});
		
		$(this).children().first().blur(function(){
			$(this).parent().text(conteudoOriginal);
			$(this).parent().removeClass("celulaEmEdicao");
		});
		
	});
}


function bindCheckIcons(){
	$('.check_circle_outline').each(function(i, obj) {
		$(obj).on("click", function(event){
			event.preventDefault();
			let catmat = $("#catmat").text();
			let quantidade = $("#quantidade").text();
			let btn = $(this);
			let url = $(this).attr('href') + "&catmat=" + catmat + "&quantidade=" + quantidade;
			alertify.confirm().set('resizable',true).resizeTo(500,250);
			alertify.confirm('Confirmar','Deseja realmente salvar este item?',
				function(){

					var request = $.ajax({
						url: url,
						cache: false
					});
					request.done(function(msg) {
						btn.parent().parent().remove();
						alertify.success('Produto salvo com sucesso!');
					});

					request.fail(function(jqXHR, textStatus) {
						alertify.error('Falha ao salvar produto.');
						alert("Falha ao salvar produto: " + textStatus);
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

bindCheckIcons();
bindDoubleClickTable();