<?php
use PROYECTO\MYAPI\Formulario;
require_once __DIR__ . DIRECTORY_SEPARATOR . 'myapi' . DIRECTORY_SEPARATOR . 'Formulario.php';
$form = new Formulario('paginaods');
$form->add(json_decode(file_get_contents('php://input'), true));
echo json_encode($form->getData(), JSON_UNESCAPED_UNICODE);
?>