<?php

use tecweb\MyApi\Empresas;

include_once __DIR__ . '/vendor/autoload.php';

// Creamos una instancia de la clase Empresas
$empresas = new Empresas('marketzone');

// Llamamos al método list para obtener la lista de empresas
$empresas->list();

// Devolvemos los datos en formato JSON
echo $empresas->getData();
?>
