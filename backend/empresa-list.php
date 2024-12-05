<?php
require_once 'vendor/autoload.php';
use PROYECTO\MYAPI\READ\Read;
// Creamos una instancia de la clase Empresas
$empresas = new Read('paginaods');

// Llamamos al método list para obtener la lista de empresas
$empresas->list();

// Devolvemos los datos en formato JSON sin escapar Unicode
echo $empresas->getData();

?>
