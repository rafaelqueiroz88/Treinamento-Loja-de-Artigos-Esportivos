$(document).ready(function(){
	
});
/* Bootbox */
$("#myModal").on("show", function(){
	$("#myModal a.btn").on("click", function(e) {
	console.log("button pressed");
	$("#myModal").modal('hide');
	});
});
$("#myModal").on("hide", function(){
	$("#myModal a.btn").off("click");
});
$("#myModal").on("hidden", function(){
	$("#myModal").remove();
});
$("#myModal").modal({
	"backdrop"  : "static",
	"keyboard"  : true,
	"show"      : true
});
/* Fim do Bootbox */

/* Bootbox confirmar desativação de objeto */
$(document).on('click', '#funcao', function(){
    var funcao = $(this).attr('action');
    var id = $(this).attr('delete-id');
    var objeto = $(this).attr('data-name');
    if(funcao=="apagar-produto"){
        bootbox.confirm({
            title: "<h4> <span class='glyphicon glyphicon-alert'></span> AVISO </h4>",
            message: "O objeto "+objeto+" será desativado. Têm certeza que deseja continuar?",
            buttons: {
                confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Sim',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '<span class="glyphicon glyphicon-remove"></span> Não',
                    className: 'btn-primary'
                }
            },
            callback: function (result){ 
                if(result==true){
                    $.post('./?pagina=Admin&admin=Index', {produto_id: id}, function(data){
                        location.reload();
                    }).fail(function() {
                        alert('Não foi possível deletar o arquivo!');
                    });
                }
            }
        });
        return false;
    }
    else if(funcao=="apagar-categoria")
    {
        bootbox.confirm({
            title: "<h4> <span class='glyphicon glyphicon-alert'></span> AVISO </h4>",
            message: "O objeto "+objeto+" será desativado. Têm certeza que deseja continuar?",
            buttons: {
                confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Sim',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '<span class="glyphicon glyphicon-remove"></span> Não',
                    className: 'btn-primary'
                }
            },
            callback: function (result){ 
                if(result==true){
                    $.post('./?pagina=Admin&admin=Index', {categoria_id: id}, function(data){
                        location.reload();
                    }).fail(function() {
                        alert('Não foi possível deletar o arquivo!');
                    });
                }
            }
        });
        return false;
    }
    else if(funcao=="apagar-marca")
    {        
        bootbox.confirm({
            title: "<h4> <span class='glyphicon glyphicon-alert'></span> AVISO </h4>",
            message: "O objeto "+objeto+" será desativado. Têm certeza que deseja continuar?",
            buttons: {
                confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Sim',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '<span class="glyphicon glyphicon-remove"></span> Não',
                    className: 'btn-primary'
                }
            },
            callback: function (result){ 
                if(result==true){
                    $.post('./?pagina=Admin&admin=Index', {marca_id: id}, function(data){
                        location.reload();
                    }).fail(function() {
                        alert('Não foi possível deletar o arquivo!');
                    });
                }
            }
        });
        return false;
    }
});
/* Fim da confirmação de desativação */