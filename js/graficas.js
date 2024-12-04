$(document).ready(function () {
    // Genera la lista de preguntas
    getListOfQuestions();
});

// Lista de preguntas y sus identificadores asociados
const categoriasPreguntas = {
    "Alimentación y Productos de Uso Diario": [
        { question: "¿Prefieres comprar productos frescos en mercados locales o en supermercados grandes?", id: "apud_1" },
        { question: "¿Qué haces con los restos de comida?", id: "apud_2" },
        { question: "¿Compras productos orgánicos?", id: "apud_3" },
        { question: "¿Compras en empaques reutilizables o sin empaque?", id: "apud_4" }
    ],
    "Transporte y Energía": [
        { question: "¿Cómo sueles transportarte?", id: "te_1" },
        { question: "¿Intentas reducir el consumo de energía en casa?", id: "te_2" },
        { question: "¿Cuántos dispositivos electrónicos utilizas en casa?", id: "te_3" }
    ],
    "Hábitos de Consumo": [
        { question: "¿Con qué frecuencia compras productos de marcas locales?", id: "hc_1" },
        { question: "¿Sueles leer las etiquetas para conocer el origen y los materiales de los productos?", id: "hc_2" }
    ],
    "Residuos y Reciclaje": [
        { question: "¿Separas la basura en orgánica e inorgánica en tu hogar?", id: "rr_1" },
        { question: "¿Qué haces con la ropa o artículos que ya no usas?", id: "rr_2" }
    ],
    "Conocimiento sobre Consumo Responsable": [
        { question: "¿Sabes qué es el 'consumo responsable'?", id: "ccr_1" },
        { question: "¿Qué tan importante es para ti el impacto ambiental al comprar?", id: "ccr_2" },
        { question: "¿Estarías dispuesto a pagar más por productos sostenibles?", id: "ccr_3" }
    ]
};

function getListOfQuestions() {
    const lista = $('#listaPreguntas');
    lista.empty();
    const indication = $(`<p class="format-information"><b>Seleccione una opción de la lista para mostrar la gráfica</b></p>`);
    lista.append(indication);
    Object.keys(categoriasPreguntas).forEach((categoria) => {
        const categoriaElemento = $(`<li><strong>${categoria}</strong></li>`);
        const subLista = $('<ul></ul>');
        categoriasPreguntas[categoria].forEach((item) => {
            const preguntaElemento = $(`<li class="pregunta-item format-information">${item.question}</li>`);
            // Evento para resaltar el texto al pasar el cursor sobre él
            preguntaElemento.on('mouseenter', function() {
                $(this).css('background-color', '#278b1d');
                $(this).css('color', 'white');
                $(this).css('cursor', 'pointer');
            }).on('mouseleave', function() {
                $(this).css('background-color', '');
                $(this).css('color', '#666666');
            });

            // Manejamos el clic en la pregunta
            preguntaElemento.on('click', function() {
                // Primero, eliminamos el resaltado de cualquier otra pregunta seleccionada
                $('.pregunta-item').removeClass('selected');
                
                // Luego, aplicamos el resaltado a la pregunta seleccionada
                $(this).addClass('selected');

                // Llamamos a la función para mostrar el gráfico
                showGraph(item.id);
            });

            subLista.append(preguntaElemento);
        });
        categoriaElemento.append(subLista);
        lista.append(categoriaElemento);
    });
}


function showGraph(questionId) {
    console.log("Se hizo clic en la pregunta con ID: ", questionId);
    // Verificamos si existe un gráfico anterior y lo destruimos
    // $('#mensajeGrafico').remove();
    $('#mensajeGrafico').hide(); // Ocultamos el mensaje si existe
    $('#mensajeSinDatos').hide();
    $('#graficas').show();
    if (window.chart) {
        window.chart.destroy();
    }
    // Verificar si el canvas con id 'graficas' existe en el DOM
    const ctx = document.getElementById('graficas')?.getContext('2d');
    if (!ctx) {
        console.error("No se pudo obtener el contexto del canvas.");
        return;
    }
    $.ajax({
        url: '/proyecto/php/Respuestas-list.php',
        type: 'GET',
        success: function(response) {
            try {
                let respuestas = JSON.parse(response);
                // Si no hay datos, mostramos el mensaje "Aún no hay datos registrados"
                if (respuestas.length === 0) {
                    $('#graficas').hide(); // Ocultamos el canvas
                    $('#mensajeGrafico').hide(); // Mostramos el mensaje
                    $('#mensajeSinDatos').show();
                    console.log("Mensaje insertado en #graficas");
                } else {
                    // Si hay datos, generamos el gráfico
                    if (shouldUseBarChart(questionId)) {
                        createBarChart(respuestas, questionId, ctx);
                    } else {
                        createPieChart(respuestas, questionId, ctx);
                    }
                }
            } catch (error) {
                console.error('Error al parsear JSON:', error);
                console.log('Respuesta recibida:', response);
            }
        }
    });
}


function shouldUseBarChart(questionId) {
    const preguntasParaBarra = [
        "apud_3","apud_4", "te_1", "te_3", "hc_1", "rr_2", "ccr_2", "ccr_3"
    ]; //IDs de preguntas que prefieren grafico de barras
    return preguntasParaBarra.includes(questionId);
}

function createBarChart(respuestas, questionId, ctx) {
    let labels = [];
    let data = [];
    let respuestasContadas = {};
    respuestas.forEach((respuesta) => {
        let valor = respuesta[questionId];
        if (!respuestasContadas[valor]) {
            respuestasContadas[valor] = 0;
        }
        respuestasContadas[valor]++;
    });
    for (let valor in respuestasContadas) {
        labels.push(valor);
        data.push(respuestasContadas[valor]);
    }
    // Crear gráfico de barras
    window.chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad de respuestas',
                data: data,
                backgroundColor: 'rgba(39, 139, 29, 0.5)',
                borderColor: 'rgba(39, 139, 29, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function createPieChart(respuestas, questionId, ctx) {
    let labels = [];
    let data = [];
    let respuestasContadas = {};
    respuestas.forEach((respuesta) => {
        let valor = respuesta[questionId];
        if (!respuestasContadas[valor]) {
            respuestasContadas[valor] = 0;
        }
        respuestasContadas[valor]++;
    });
    for (let valor in respuestasContadas) {
        labels.push(valor);
        data.push(respuestasContadas[valor]);
    }

    // Crear gráfico de pastel
    window.chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(39, 139, 29, 0.5)', 
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
}