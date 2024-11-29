$(document).ready(function () {
    // Capturamos el evento click del botón
    $("#btnFormulario").click(function (e) {
        e.preventDefault(); // Evita el comportamiento por defecto
        //redirigir

        window.location.href = "src/html/formulario.php";
    });
});
