$(document).ready(function () {
    // Capturamos el evento click del botón
    $("#btnFormulario").click(function (e) {
        e.preventDefault(); // Evita el comportamiento por defecto
        //redirigir

        window.location.href = "src/html/formulario.php";
    });
});

// Obtener todas las empresas
function listarEmpresas() {
    console.log('Obteniendo la lista de empresas...');
    $.ajax({
        url: '/proyecto/php/empresa-list.php',
        type: 'GET',
        success: function(response) {
            console.log(`Respuesta de listar empresas: ${response}`);
            try {
                let empresas = JSON.parse(response);

                // Verificamos que la respuesta es un array de empresas
                if (Array.isArray(empresas)) {
                    let template = '';
                    empresas.forEach(empresa => {
                        let descripcion = '';
                        descripcion += '<li>Área de interés: ' + empresa.area_interes + '</li>';
                        descripcion += '<li>Fuente de consumo: ' + empresa.fuente_consumo + '</li>';
                        descripcion += '<li>Emisiones: ' + empresa.emisiones + '</li>';
                        descripcion += '<li>Medidas adoptadas: ' + empresa.medidas + '</li>';
                        template += `
                            <tr empresaId="${empresa.id}">
                                <td>${empresa.id}</td>
                                <td><a href="javascript:void(0);" class="empresa-item">${empresa.nombre}</a></td>
                                <td>${descripcion}</td>
                                <td>
                                    <button class="empresa-delete btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#empresas').html(template);
                } else {
                    console.error('La respuesta no es un arreglo:', empresas);
                }
            } catch (error) {
                console.error('Error al parsear JSON:', error);
                console.log('Respuesta recibida:', response);
            }
        }
    });
}



// Obtener una empresa por ID
$(document).on('click', '.empresa-item', function() { 
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('empresaId');
    console.log(`Obteniendo la empresa con ID: ${id}`);
    
    // Hacemos la petición GET para obtener la empresa por su ID
    $.get('backend/empresa-single.php', { id }, function(response) {   
        console.log(`Respuesta de obtener empresa: ${response}`);
        const empresa = JSON.parse(response);

        // Verificamos si el estado de la respuesta es "success"
        if (empresa.status === 'success') {
            console.log('Empresa obtenida:', empresa);

            // Rellenar los campos de la empresa
            $('#nombre').val(empresa.empresa.nombre);
            $('#area_interes').val(empresa.empresa.area_interes);
            $('#fuente_consumo').val(empresa.empresa.fuente_consumo);
            $('#emisiones').val(empresa.empresa.emisiones);
            $('#medidas').val(empresa.empresa.medidas);
            $('#direccion').val(empresa.empresa.direccion);
            $('#telefono').val(empresa.empresa.telefono);
            $('#correo').val(empresa.empresa.correo);
            $('#imagen').val(empresa.empresa.imagen);
            $('#empresa-id').val(empresa.empresa.id);

            edit = true;
        } else {
            $('#container').html(empresa.message);  // En caso de error, muestra el mensaje
            $('#empresa-result').show();
        }
    });
});
