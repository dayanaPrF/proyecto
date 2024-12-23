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
    listarReflexion();
}

function listarEmpresas() {
    console.log('Obteniendo la lista de empresas...');
    $.ajax({
        url: 'http://localhost/proyecto/backend/listemp',
        type: 'GET',
        success: function(response) {
            try {
                let empresas = JSON.parse(response);
                let template = '';
                empresas.forEach(empresa => {   
                    console.log('Imagen:', empresa.imagen);
                    let logo = empresa.imagen.startsWith('http') ? empresa.imagen : `/proyecto/img/img_Empresas/${empresa.imagen}`;
                    template += `
                    <li style="list-style-type: none; padding-left: 0;">
                        <a href="javascript:void(0);" class="empresa-item" data-id="${empresa.id}">
                            <img src="${logo}" width="40" height="40"> ${empresa.nombre}
                        </a>
                    </li>
                `;
                });
                $('#empresas').html(template);
                // Agregar el evento click para mostrar más información
                $('.empresa-item').css('color', 'green');
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
        url: `http://localhost/proyecto/backend/empresas/${id}`,
        type: 'GET',
        success: function(response) {
            console.log('Respuesta recibida:', response);  // Agrega esta línea para ver qué estás recibiendo
            try {
                let empresa = response;//JSON.parse(response);

                // Información de la empresa
                let template = `
                    <h2 style="color: green;">${empresa.nombre}</h2>
                    <p class="format-list"><strong>Área de interés:</strong> ${empresa.area_interes}</p>
                    <p class="format-list"><strong>Fuente de consumo:</strong> ${empresa.fuente_consumo}</p>
                    <p class="format-list"><strong>Emisiones:</strong> ${empresa.emisiones} tCO₂e</p>
                    <p class="format-list"><strong>Medidas adoptadas:</strong> ${empresa.medidas}</p>
                `;
                $('#empresaDetails').html(template);

                // Información de contacto (si lo tienes)
                let contactTemplate = `
                    <ul style="list-style-type: none !important; padding-left: 0 !important;">
                        <li style="list-style-type: none !important; padding-left: 0 !important;"> <strong>Correo:</strong> ${empresa.correo}</li>
                        <li style="list-style-type: none !important; padding-left: 0 !important;"> <strong>Teléfono:</strong> ${empresa.telefono}</li>
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
            edad: $('#id-edad').val(),
            sexo: $('#id-sexo').val(),
            ocupacion: $('#id-ocupacion').val(),
            hc_1: $("input[name='hc_1']:checked").val(),
            hc_2: $("input[name='hc_2']:checked").val(),
            apud_1: $('#id-apud_1').val(),
            apud_2: $('#id-apud_2').val(),
            apud_3: $("input[name='apud_3']:checked").val(),
            apud_4: $("input[name='apud_4']:checked").val(),
            rr_1: $("input[name='rr_1']:checked").val(),
            rr_2: $('#id-rr_2').val(),
            te_1: $('#id-te_1').val(),
            te_2: $("input[name='te_2']:checked").val(),
            te_3: $('#id-te_3').val(),
            ccr_1: $("input[name='ccr_1']:checked").val(),
            ccr_2: $('#id-ccr_2').val(),
            ccr_3: $("input[name='ccr_3']:checked").val(),
            rpc: $('#id-rpc').val()
        }; 
        $.ajax({
            url: 'http://localhost/proyecto/backend/agregar',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(postData),
            success: function(response) {
                let result = typeof response === 'string' ? JSON.parse(response) : response;
                if (result.status === "success") {
                    $('#formulario').trigger('reset');
                }
                listarReflexion();
                alert(result.message);
            },
            error: function(xhr, status, error) {
                alert("Error en la solicitud: " + error);
            }
        });
    });
}

function listarReflexion() {
    $.ajax({
        url: '/proyecto/backend/resprcp',
        type: 'GET',
        success: function(response) {
            try {
                let respuestas = JSON.parse(response);
                if (!respuestas || respuestas.length === 0) {
                    $('#info-card-body').html('<p  style="font-size: 18px; color: #333; margin-bottom: 20px;" class="card-body-texto-inicio">Aun no hay respuestas. 😞</p>'); // Mensaje si no hay respuestas
                    return;
                }
                let todasVacias = respuestas.every(respuesta => !respuesta.rpc || respuesta.rpc.trim() === '');
                if (todasVacias) {
                    $('#info-card-body').html('<p style="font-size: 18px; color: #333; margin-bottom: 20px;" class="card-body-texto-inicio">Aun no hay respuestas. 😞</p>'); // Mensaje si todas las respuestas están vacías
                    return;
                }
                let template = '';
                template += '<p style="font-size: 18px; color: #333; margin-bottom: 20px;" class="card-body-texto-inicio">¡Conoce las opiniones de las personas! 😊</p>';
                respuestas.forEach(respuesta => {
                    if (respuesta.rpc && respuesta.rpc.trim() !== '') {
                        template += `
                            <div class="respuesta-item" style="background-color: #e5e3e3; border-radius: 10px; padding: 10px; margin-bottom: 10px;">
                                <p style="margin: 0; font-size: 16px; color: #333;" class="opiniones">${respuesta.rpc}</p>
                            </div>
                        `;
                    }
                });
                $('#info-card-body').html(template);
            } catch (error) {
                console.error('Error al parsear JSON:', error);
            }
        },
        error: function() {
            $('#info-card-body').html('< style="margin: 0; font-size: 16px; color: #333;" class="opiniones">Hubo un problema al obtener las respuestas. 😞</p>');
        }
    });
}