$(".delete-icon").on('click', function(event){
	event.preventDefault();

	let btn = $(this);
	let url = $(this).attr('href');

	
	alertify.confirm('Deseja realmente excluir','Excluir este item?', 
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
