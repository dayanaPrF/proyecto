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
        return false;
    }else{
        quitarError(nombre);
        return true;
    }
}

function verificarRadio(nombre){
    if (!$("input[name='"+nombre+"']:checked").val()) {
        visualizarError(nombre, "Seleccione una opción de la lista");
        return false;
    }else {
        quitarError(nombre);
        return true;
    }
}


//Verificar edad
function validarEdad() {
    quitarContainerError("edad");
    if ($("#id-edad").val() === ""){
        visualizarError("edad","Inserte edad");
        return false;
    }else if (parseInt($("#id-edad").val()) < 0 || parseInt($("#id-edad").val()) > 120){
        visualizarError("edad","Edad invalida");
        return false;
    }
    return true;
}
function eliminarBordeEdad(){
    quitarError("edad");
}

//Verificar Sexo
function validarSexo(){
    return verificarListas("sexo", "Seleccione un campo de la lista sexo");
}

function eliminarBordeSexo(){
    quitarError("sexo");
}

//Verificar Ocupacion
function validarOcupacion(){
    return verificarListas("ocupacion", "Seleccione un campo de la lista ocupacion");
}

function eliminarBordeOcupacion(){
    quitarError("ocupacion");
}

//Verificar apud_1
function validarapud_1(){
    return verificarListas("apud_1", "Seleccione un campo de la lista");
}

function eliminarBordeapud_1(){
    quitarError("apud_1");
}

//Verificar apud_2
function validarapud_2(){
    return verificarListas("apud_2", "Seleccione un campo de la lista");
}

function eliminarBordeapud_2(){
    quitarError("apud_2");
}

//Verificar apud_3
function validarapud3() {
    return verificarRadio("apud_3");
}

function quitarContainerErrorapud_3(){
    quitarContainerError("apud_3");
}

//Verificar apud_4
function validarapud4() {
    return verificarRadio("apud_4");
}

function quitarContainerErrorapud_4(){
    quitarContainerError("apud_4");
}

//Verificar te_1
function validarte_1(){
    return verificarListas("te_1", "Seleccione un campo de la lista");
}

function eliminarBordete_1(){
    quitarError("te_1");
}

//Verificar te_2
function validarte_2() {
    return verificarRadio("te_2");
}

function quitarContainerErrorte_2(){
    quitarContainerError("te_2");
}

//Verificar te_3
function validarte_3() {
    quitarContainerError("te_3");
    if ($("#id-te_3").val() === ""){
        visualizarError("te_3","Inserte el numero de dispositivos");
        return false;
    }else if (parseInt($("#id-te_3").val()) < 0 || parseInt($("#id-te_3").val()) > 100){
        visualizarError("te_3","Cantidad invalida");
        return false;
    }
    return true;
}
function eliminarBordete_3(){
    quitarError("te_3");
}

//Verificar hc_1
function validarhc_1() {
    return verificarRadio("hc_1");
}

function quitarContainerErrorhc_1(){
    quitarContainerError("hc_1");
}

//Verificar hc_2
function validarhc_2() {
    return verificarRadio("hc_2");
}

function quitarContainerErrorhc_2(){
    quitarContainerError("hc_2");
}

//Verificar rr_1
function validarrr_1() {
    return verificarRadio("rr_1");
}

function quitarContainerErrorrr_1(){
    quitarContainerError("rr_1");
}

//Verificar rr_2
function validarrr_2(){
    return verificarListas("rr_2", "Seleccione un campo de la lista");
}

function eliminarBorderr_2(){
    quitarError("rr_2");
}

//Verificar ccr_1
function validarccr_1() {
    return verificarRadio("ccr_1");
}

function quitarContainerErrorccr_1(){
    quitarContainerError("ccr_1");
}

//Verificar ccr_2
function validarccr_2(){
    return verificarListas("ccr_2", "Seleccione un campo de la lista");
}

function eliminarBordeccr_2(){
    quitarError("ccr_2");
}

//Verificar ccr_3
function validarccr_3() {
    return verificarRadio("ccr_3");
}

function quitarContainerErrorccr_3(){
    quitarContainerError("ccr_3");
}

//Verificar rpc
function validarrpc() {
    quitarContainerError("rpc");
    if ($("#id-rpc").val().length > 300) {
        visualizarError("rpc", "Texto demasiado largo");
        return false;
    }
    return true;
}

function eliminarBorderpc(){
    quitarError("rpc");
}

function submmitBotton(event){
    //Radios
    const apud_3 = validarapud3();
    const apud_4 = validarapud4();
    const te_2 = validarte_2();
    const hc_1 = validarhc_1();
    const hc_2 = validarhc_2();
    const rr_1 = validarrr_1();
    const ccr_1 = validarccr_1();
    const ccr_3 = validarccr_3();
    //Listas
    const sexo = validarSexo();
    const ocupacion =validarOcupacion();
    const apud_1 = validarapud_1();
    const apud_2 = validarapud_2();
    const te_1 = validarte_1();
    const rr_2 = validarrr_2();
    const ccr_2 = validarccr_2();
    //inputs
    const edad = validarEdad();
    const te_3 = validarte_3();
    const rcp = validarrpc();
    if (!edad || !te_3 || !rcp || !sexo || !ocupacion || !apud_1 || !apud_2 || !te_1 || !rr_2 || !ccr_2 ||
        !apud_3 || !apud_4 || !te_2 || !hc_1 || !hc_2 || !rr_1 || !ccr_1 || !ccr_3){
        alert("¡Algo salio mal! Algun dato es invalido")
        event.preventDefault();
        return false;
    }
    alert("¡Registro exitoso!");
    eliminarBordeEdad();
    eliminarBordeSexo();
    eliminarBordeOcupacion();
    eliminarBordeapud_1();
    eliminarBordeapud_2();
    quitarContainerErrorapud_3();
    quitarContainerErrorapud_4();
    eliminarBordete_1();
    quitarContainerErrorte_2();
    eliminarBordete_3();
    quitarContainerErrorhc_1();
    quitarContainerErrorhc_2();
    quitarContainerErrorrr_1();
    eliminarBorderr_2();
    quitarContainerErrorccr_1();
    eliminarBordeccr_2();
    quitarContainerErrorccr_3();
    eliminarBorderpc();
    $("#formulario")[0].reset();
    return true;
}