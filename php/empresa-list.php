<?php
//namespace PROYECTO\MYAPI;
use PROYECTO\MYAPI\empresas;

//include_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'myapi' . DIRECTORY_SEPARATOR . 'empresas.php';

// Creamos una instancia de la clase Empresas
$empresas = new Empresas('paginaods');

// Llamamos al método list para obtener la lista de empresas
$empresas->list();

// Devolvemos los datos en formato JSON
echo json_encode($empresas->getData());
?>
