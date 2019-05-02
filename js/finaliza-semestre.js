
$('#finalizar-semestre').on('click', function(event){

	let verifica = 0;
	alertify.confirm().set('resizable',true).resizeTo(500,250);
	alertify.confirm('Confirmar','Deseja realmente finalizar o semestre atual?',
		function(){

	        request.done(function(msg) {
	        	alertify.success('Semestre finalizado com sucesso');
	        	
	        });

	        request.fail(function(jqXHR, textStatus) {
	        	alertify.error('Falha ao finalizar o semestre.');
	            alert("Falha ao finalizar o semestre: " + textStatus);
	        });


		},
		function(){
			alertify.error('Cancelado');
		}).setting({'labels':{ok:'Sim',cancel:'Não'},
					'transition':'zoom'
		});

});

