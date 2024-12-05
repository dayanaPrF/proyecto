<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();

// Ruta de prueba que muestra "¡Hola, mundo!"
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("¡Hola, mundo!");
    return $response;
});

// Ejecutar la aplicación
$app->run();


// Crear la aplicación Slim
// $app = AppFactory::create();

// $app->setBasePath('/proyecto/backend');

// // Ruta de prueba
// $app->get('/test', function (Request $request, Response $response, $args) {
//     $response->getBody()->write('Test funcionando!');
//     return $response;
// });

// // Ruta principal
// $app->get('/', function (Request $request, Response $response, $args) {
//     $data = ['message' => 'Bienvenido al API RESTful'];
//     $response->getBody()->write(json_encode($data));
//     return $response->withHeader('Content-Type', 'application/json');
// });

// // Ruta para obtener respuestas
// $app->get('/answers', function (Request $request, Response $response, $args) {
//     $form = new Read('paginaods');
//     $form->listAnswers();
//     $response->getBody()->write(json_encode($form->getData()));
//     return $response->withHeader('Content-Type', 'application/json');
// });

// // Ejecutar la aplicación
// $app->run();
?>
