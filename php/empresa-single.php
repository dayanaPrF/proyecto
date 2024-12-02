<?php

use PROYECTO\MYAPI\Empresas;

//include_once __DIR__ . '/vendor/autoload.php';

// Creamos una instancia de la clase Empresas
$empresas = new Empresas('paginaods');

// Llamamos al método single para obtener la información de una empresa
$empresas->single($_GET['id']);

// Devolvemos los datos en formato JSON
echo $empresas->getData();
?>
