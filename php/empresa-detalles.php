<?php

use PROYECTO\MYAPI\empresas;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'myapi' . DIRECTORY_SEPARATOR . 'empresas.php';
// Obtener el ID de la empresa desde la URL
$empresaId = isset($_GET['id']) ? $_GET['id'] : null;

if ($empresaId) {
    $empresas = new Empresas('paginaods');
    $empresaDetails = $empresas->getDetails($empresaId); 

    // Devuelve la información como JSON
    echo json_encode($empresaDetails);
} else {
    echo json_encode(['error' => 'ID de empresa no proporcionado']);
}
?>
