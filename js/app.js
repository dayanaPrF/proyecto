$(document).ready(function () {
    // Capturamos el evento click del botón
    $("#btnFormulario").click(function (e) {
        e.preventDefault(); // Evita el comportamiento por defecto
        //redirigir

        window.location.href = "src/html/formulario.php";
    });
});

// Obtener todos los productos
function listarProductos() {
    console.log('Obteniendo la lista de productos...');
    $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function(response) {
            console.log(`Respuesta de listar productos: ${response}`);
            try {
                let products = JSON.parse(response);
                let template = '';
                products.forEach(product => {
                    let descripcion = '';
                    descripcion += '<li>precio: ' + product.precio + '</li>';
                    descripcion += '<li>unidades: ' + product.unidades + '</li>';
                    descripcion += '<li>modelo: ' + product.modelo + '</li>';
                    descripcion += '<li>marca: ' + product.marca + '</li>';
                    descripcion += '<li>detalles: ' + product.detalles + '</li>';
                    template += `
                        <tr productId="${product.id}">
                            <td>${product.id}</td>
                            <td><a href="javascript:void(0);" class="product-item">${product.nombre}</a></td>
                            <td>${descripcion}</td>
                            <td>
                                <button class="product-delete btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
                $('#products').html(template);
            } catch (error) {
                console.error('Error al parsear JSON:', error);
                console.log('Respuesta recibida:', response);
            }
        }
    });
}

// Obtener un Producto por ID
$(document).on('click', '.product-item', function() { 
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('productId');
    console.log(`Obteniendo el producto con ID: ${id}`);
    
    // Hacemos la petición GET para obtener el producto por su ID
    $.get('backend/product-single.php', { id }, function(response) {   
        console.log(`Respuesta de obtener producto: ${response}`);
        const product = JSON.parse(response);

        // Verificamos si el estado de la respuesta es "success"
        if (product.status === 'success') {
            console.log('Producto obtenido:', product);

            // Rellenar los campos del producto
            $('#name').val(product.producto.nombre);
            $('#marca').val(product.producto.marca);
            $('#modelo').val(product.producto.modelo);
            $('#precio').val(product.producto.precio);
            $('#detalles').val(product.producto.detalles);
            $('#unidades').val(product.producto.unidades);
            $('#imagen').val(product.producto.imagen);
            $('#product-id').val(product.producto.id);

            edit = true;
        } else {
            $('#container').html(product.message);  // En caso de error, muestra el mensaje
            $('#product-result').show();
        }
    });
});
