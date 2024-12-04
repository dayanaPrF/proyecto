$(document).ready(function () {
    // Genera la lista de preguntas
    getListOfQuestions();
});

const categoriasPreguntas = {
    "Alimentación y Productos de Uso Diario": [
        "¿Prefieres comprar productos frescos en mercados locales o en supermercados grandes?",
        "¿Qué haces con los restos de comida?",
        "¿Compras productos orgánicos?",
        "¿Compras en empaques reutilizables o sin empaque?"
    ],
    "Transporte y Energía": [
        "¿Cómo sueles transportarte?",
        "¿Intentas reducir el consumo de energía en casa?",
        "¿Cuántos dispositivos electrónicos utilizas en casa?"
    ],
    "Hábitos de Consumo": [
        "¿Con qué frecuencia compras productos de marcas locales?",
        "¿Sueles leer las etiquetas para conocer el origen y los materiales de los productos?"
    ],
    "Residuos y Reciclaje": [
        "¿Separas la basura en orgánica e inorgánica en tu hogar?",
        "¿Qué haces con la ropa o artículos que ya no usas?"
    ],
    "Conocimiento sobre Consumo Responsable": [
        "¿Sabes qué es el 'consumo responsable'?",
        "¿Qué tan importante es para ti el impacto ambiental al comprar?",
        "¿Estarías dispuesto a pagar más por productos sostenibles?"
    ],
    "Información": [
        "¿Qué hábito crees que podrías mejorar para ser un consumidor más responsable?"
    ]
};

function getListOfQuestions() {
    const lista = $('#listaPreguntas');
    lista.empty();

    Object.keys(categoriasPreguntas).forEach((categoria) => {
        const categoriaElemento = $(`<li><strong>${categoria}</strong></li>`);
        const subLista = $('<ul></ul>');
        categoriasPreguntas[categoria].forEach((question, index) => {
            const questionKey = `${categoria}-${index}`;
            const preguntaElemento = $(`<li class="pregunta-item">${question}</li>`);
            // Evento para resaltar el texto al pasar el cursor sobre él
            preguntaElemento.on('mouseenter', function() {
                $(this).css('background-color', '#278b1d'); 
                $(this).css('color', 'white');
                $(this).css('cursor', 'pointer');
            }).on('mouseleave', function() {
                $(this).css('background-color', '');
                $(this).css('color', 'black');
            });
            // Manejamos el clic en la pregunta
            preguntaElemento.on('click', function() {
                showGraph(questionKey);
            });

            subLista.append(preguntaElemento);
        });
        categoriaElemento.append(subLista);
        lista.append(categoriaElemento);
    });
}

function showGraph(questionKey) {
    console.log("Se hizo clic en la pregunta: ", questionKey);
    // Aquí puedes agregar el código que debe ejecutarse cuando se haga clic en la pregunta
}
