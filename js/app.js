$(document).ready(function () {
    // Capturamos el evento click del botón
    $("#btnFormulario").click(function (e) {
        e.preventDefault(); // Evita el comportamiento por defecto
        //redirigir

        window.location.href = "src/html/formulario.php";
    });
});

function init() {
    agregar();
}

function listarEmpresas() {
    console.log('Obteniendo la lista de empresas...');
    $.ajax({
        url: '/proyecto/php/empresa-list.php',
        type: 'GET',
        success: function(response) {
            console.log(`Respuesta de listar empresas: ${response}`);
            try {
                let empresas = JSON.parse(response);
                let template = '';
                empresas.forEach(empresa => {   

                    console.log('Imagen:', empresa.imagen);

                    let logo = empresa.imagen ? `/proyecto/img/img_Empresas/${empresa.imagen}` : '/proyecto/img/logoBimbo.png';
                    
                    // Verifica la ruta de la imagen en la consola para depurar
                    console.log(`Ruta del logo para ${empresa.nombre}: ${logo}`);
                    
                    template += `
                        <li>
                            <a href="javascript:void(0);" class="empresa-item" data-id="${empresa.id}">
                                <img src="${logo}" alt="${empresa.nombre}" width="40" height="40"> ${empresa.nombre}
                            </a>
                        </li>
                    `;
                });
                $('#empresas').html(template);

                // Agregar el evento click para mostrar más información
                $('.empresa-item').on('click', function() {

                    let empresaId = $(this).data('id');  // Obtén el ID correctamente
                    console.log('click en: '+empresaId);
                    mostrarDetallesEmpresa(empresaId);  // Pasa el ID correctamente
                });
            } catch (error) {
                console.error('Error al parsear JSON:', error);
                console.log('Respuesta recibida:', response);
            }
        }
    });
}

function mostrarDetallesEmpresa(id) {
    console.log('Obteniendo detalles de la empresa con ID:', id);

    if (id === undefined) {
        console.error('No se ha proporcionado un ID válido');
        return;  // No continúa si el ID es inválido
    }

    $.ajax({
        url: `../../php/empresa-detalles.php?id=${id}`,
        type: 'GET',
        success: function(response) {
            console.log('Respuesta recibida:', response);  // Agrega esta línea para ver qué estás recibiendo
            try {
                let empresa = JSON.parse(response);

                // Información de la empresa
                let template = `
                    <h2>${empresa.nombre}</h2>
                    <p><strong>Área de interés:</strong> ${empresa.area_interes}</p>
                    <p><strong>Fuente de consumo:</strong> ${empresa.fuente_consumo}</p>
                    <p><strong>Emisiones:</strong> ${empresa.emisiones}</p>
                    <p><strong>Medidas adoptadas:</strong> ${empresa.medidas}</p>
                `;
                $('#empresaDetails').html(template);

                // Información de contacto (si lo tienes)
                let contactTemplate = `
                    <ul>
                        <li><strong>Correo:</strong> ${empresa.correo}</li>
                        <li><strong>Teléfono:</strong> ${empresa.telefono}</li>
                    </ul>
                `;
                $('#contactInfo').html(contactTemplate);

            } catch (error) {
                console.error('Error al parsear los detalles:', error);
                $('#empresaDetails').html('<p>No se pudo cargar la información de la empresa.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud:', error);
            $('#empresaDetails').html('<p>No se pudo obtener la información de la empresa.</p>');
        }
    });
}

function agregar() {
    $('#formulario').submit(function(e) {
        e.preventDefault();
        let postData = {
            edad: $('#edad').val(),
            sexo: $('#sexo').val(),
            ocupacion: $('#ocupacion').val(),
            hc_1: $('#hc_1').val(),
            hc_2: $('#hc_2').val(),
            apud_1: $('#apud_1').val(),
            apud_2: $('#apud_2').val(),
            apud_3: $('#apud_3').val(),
            apud_4: $('#apud_4').val(),
            rr_1: $('#rr_1').val(),
            rr_2: $('#rr_2').val(),
            te_1: $('#te_1').val(),
            te_2: $('#te_2').val(),
            te_3: $('#te_3').val(),
            ccr_1: $('#ccr_1').val(),
            ccr_2: $('#ccr_2').val(),
            ccr_3: $('#ccr_3').val(),
            rpc: $('#rpc').val()
        };        
        //let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
        $.ajax({
            url: '/../php/Respuestas-add.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(postData),
            success: function(response) {
                alert(response);
                console.log(response);
                let result = typeof response === 'string' ? JSON.parse(response) : response;
                if (result.status === "success") {
                    //listarProductos();
                    $('#formulario').trigger('reset');
                }
                alert(result.message);
            },
            error: function(xhr, status, error) {
                alert("Error en la solicitud: " + error);
            }
        });
    });
}