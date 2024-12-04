<?php
//namespace PROYECTO\MYAPI;
use PROYECTO\MYAPI\Formulario;

//include_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/myapi/Formulario.php';

// Creamos una instancia de la clase Empresas
$form = new Formulario('paginaods');

// Llamamos al método list para obtener la lista de empresas
$form->add();

// Devolvemos los datos en formato JSON sin escapar Unicode
echo json_encode($form->getData(), JSON_UNESCAPED_UNICODE);

?>
