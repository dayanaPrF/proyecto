<?php

use tecweb\MyApi\Empresas;

//include_once __DIR__ . '/vendor/autoload.php';

// Creamos una instancia de la clase Empresas
$empresas = new Empresas('marketzone');

// Llamamos al método single para obtener la información de una empresa
$empresas->single($_GET['id']);  // Aquí tomamos el ID de la empresa desde la URL

// Devolvemos los datos en formato JSON
echo $empresas->getData();
?>
