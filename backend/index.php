<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
require __DIR__ . '/vendor/autoload.php';
$app = AppFactory::create();

// Establecer la base URL de la aplicación si es necesario
$app->setBasePath('http://localhost/proyecto/backend/');

$app->get('/test', function ($request, $response, $args) {
    $response->getBody()->write('Test funcionando!');
    return $response;
});
// Ruta principal para comprobar que el API funciona
$app->get('/', function ($request, $response, $args) {
    $data = ['message' => 'Bienvenido al API RESTful'];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/answers', function ($request, $response, $args) {
    $form = new Read('paginaods');
    $form->listAnswers();
    $response->getBody()->write(json_encode($form->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$app->run();
?>