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