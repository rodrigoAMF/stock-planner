
$('#finalizar-semestre').on('click', function(event){

	alertify.confirm().set('resizable',true).resizeTo(500,250);

	alertify.confirm('Confirmar', 'Deseja realmente finalizar o semestre atual?', 
    function onOk() {
        //delay showing the confirm again 
        //till the first confirm is actually closed.
        setTimeout(function () {
            alertify.confirm('Confirmar','Esta ação não pode ser revertida! Deseja realmente finalizar o semestre atual?',
        		function(){
        			//chamafuncao
        			let url = "processa-semestre.php";

        			var request = $.ajax({
			            url: url,
			            cache: false
			        });

			        request.done(function(msg) {
			        	alertify.success('Semestre finalizado com sucesso!');
			        	$("#id-semestre").text(msg);
			        });

			        request.fail(function(jqXHR, textStatus) {
			        	alertify.error('Falha ao finalizar semestre.');
			        });


    				
    			},
    			function(){
    				alertify.error('Cancelado');
    			});
        }, 100);
    },
    function onCancel() {
        //no delay, this will fail to show!
        alertify.error('Cancelado');
    }
);

	
	var request = $.ajax({
	        url: url,
	        cache: false
	});

});

