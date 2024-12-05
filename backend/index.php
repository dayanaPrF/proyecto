<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PROYECTO\MYAPI\READ\Read;
use PROYECTO\MYAPI\CREATE\Create;

require __DIR__ . '/../vendor/autoload.php';
//require __DIR__ . '/vendor/autoload.php';

$app = new \Slim\App();

// Ruta de prueba que muestra "¡Hola, mundo!"
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("¡Hola, mundo!");
    return $response;
});

$app->get('/answers', function (Request $request, Response $response, $args) {
    $form = new Read('paginaods');
    $form->listAnswers();
    $response->getBody()->write(json_encode($form->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/listemp', function (Request $request, Response $response, $args) {
    $empresas = new Read('paginaods');
    $empresas->list();
    $response->getBody()->write(json_encode($empresas->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});


$app->get('/empresas/{id}', function (Request $request, Response $response, $args) {
    $empresaId = $args['id'];
    if ($empresaId) {
        $empresas = new Read('paginaods');
        $empresas->getDetails($empresaId); 
        $response->getBody()->write($empresas->getData());
        return $response->withHeader('Content-Type', 'application/json');
    } else {
        $response->getBody()->write(json_encode(['error' => 'ID de empresa no proporcionado']));
        return $response->withHeader('Content-Type', 'application/json');
    }
});

$app->post('/agregar', function ($request, $response, $args) {
    $data = $request->getParsedBody();
    $form = new Create('paginaods');
    $form->add($data);
    return $response->withJson($form->getData(), 200);
});

$app->get('/resprcp', function ($request, $response, $args) {
    $form = new Read('paginaods');
    $form->listReflexion();
    return $response->withJson($form->getData(), 200);
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
