//Verificar edad
function validarEdad() {
    var nombre = $("#id-edad");
    $("#container_edad").html(""); $('#error_mesagge_edad').hide();
    if (nombre.val() === ""){
        nombre.addClass("error-border");
        $("#container_edad").html("Inserte edad"); $('#error_mesagge_edad').show();
    }else if (parseInt(nombre.val()) < 0 || parseInt(nombre.val()) > 120){
        nombre.addClass("error-border");
        $("#container_edad").html("Edad invalida"); $('#error_mesagge_edad').show();
    }
}

function eliminarBorde(){
    var nombre = $("#id-edad");
    $("#container_edad").html(""); $('#error_mesagge_edad').hide();
    nombre.removeClass("error-border");
}

//Verificar Sexo