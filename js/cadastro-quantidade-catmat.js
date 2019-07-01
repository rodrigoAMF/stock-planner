let clickNome = false;

$("#busca").on("keyup", function(event) {
	let val = $(this).val();
	let semestre = $("#parametroSemestre").text();
	//alert(val);
	if(val != ""){
		val = val.toUpperCase();
	}

	let url = "get-produto-cadastrado.php?busca=" + val;
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

	let url = "get-produto-cadastrado.php?busca=";

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

function bindDoubleClickTable() {
	$("#tabelaEditavel td").click(function () {
		if($(this).attr('class') === "nomeNaoEditavel"){
			return;
		}
		var conteudoOriginal = $(this).text();
		let who = $(this).attr('id');

		$(this).addClass("celulaEmEdicao");
		$(this).html("<input type='text' value='" + conteudoOriginal + "' class='form-control input-table' width='100%' />");
		//bindInputTable($(".input-table").val(), $(this));
		$(this).children().first().focus();

		$(this).children().first().keydown(function (e) {
			let code = e.keyCode || e.which;
			if (code === 9 || code === 13) {
				var novoConteudo = $(this).val();
				$(this).parent().text(novoConteudo);
				$(this).parent().removeClass("celulaEmEdicao");
				//$(this).parent().children("#quantidade").html("<input type='text' value='" + conteudoOriginal + "' class='form-control input-table' width='100%' />");
				//$(this).parent().children("#quantidade").children().first().focus();
				//$(this).parent().children("#quantidade").trigger("click");
			}
		});
		
		$(this).children().first().blur(function(){

			$(this).parent().text($(this).val());
			$(this).parent().removeClass("celulaEmEdicao");
		});
		
	});
}

function bindInputTable(valorInput, objeto){
	$(".input-table").keydown(function(e) {
		let code = e.keyCode || e.which;

		if (code === 9){
			e.preventDefault();
			//objeto.html(valorInput);
			alert("Funcionou!");
		}
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

//$( "#busca" ).focus();