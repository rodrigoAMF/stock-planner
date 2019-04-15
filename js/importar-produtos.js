$(document).ready(function(){
  $("#file").on("change", function(e){
    var files = $(this)[0].files;

    var filename = e.target.value.split('\\').pop();
    $("#label-nomeArquivo").text(filename);
  });

});
