//Funciones generales
function visualizarError(nombre,mensaje){
    $("#id-"+nombre).addClass("error-border");
    $("#container_"+nombre).html(mensaje); $('#error_mesagge_'+nombre).show();
}

function quitarError(nombre){
    $("#container_"+nombre).html(""); $('#error_mesagge_'+nombre).hide();
    $("#id-"+nombre).removeClass("error-border");
}

function quitarContainerError(nombre){
    $("#container_"+nombre).html(""); $('#error_mesagge_'+nombre).hide();
}

function verificarListas(nombre, mensaje){
    if ($("#id-"+nombre).val() === ""){
        visualizarError(nombre,mensaje)
    }else{
        quitarError(nombre);
    }
}

function verificarRadio(nombre){
    if (!$("input[name='"+nombre+"']:checked").val()) {
        visualizarError(nombre, "Seleccione una opción de la lista");
    }else {
        quitarError(nombre);
    }
}


//Verificar edad
function validarEdad() {
    quitarContainerError("edad")
    if ($("#id-edad").val() === ""){
        visualizarError("edad","Inserte edad");
    }else if (parseInt($("#id-edad").val()) < 0 || parseInt($("#id-edad").val()) > 120){
        visualizarError("edad","Edad invalida");
    }
}
function eliminarBordeEdad(){
    quitarError("edad");
}

//Verificar Sexo
function validarSexo(){
    verificarListas("sexo", "Seleccione un campo de la lista sexo");
}

function eliminarBordeSexo(){
    quitarError("sexo");
}

//Verificar Ocupacion
function validarOcupacion(){
    verificarListas("ocupacion", "Seleccione un campo de la lista ocupacion");
}

function eliminarBordeOcupacion(){
    quitarError("ocupacion");
}

//Verificar apud_1
function validarapud_1(){
    verificarListas("apud_1", "Seleccione un campo de la lista");
}

function eliminarBordeapud_1(){
    quitarError("apud_1");
}

//Verificar apud_2
function validarapud_2(){
    verificarListas("apud_2", "Seleccione un campo de la lista");
}

function eliminarBordeapud_2(){
    quitarError("apud_2");
}

//Verificar apud_3
function validarapud3() {
    verificarRadio("apud_3");
}

function quitarContainerErrorapud_3(){
    quitarContainerError("apud_3");
}

//Verificar apud_4
function validarapud4() {
    verificarRadio("apud_3");
}

function quitarContainerErrorapud_3(){
    quitarContainerError("apud_3");
}