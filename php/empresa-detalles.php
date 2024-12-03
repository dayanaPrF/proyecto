<?php
require_once __DIR__ . '/../myapi/empresas.php';

// Obtener el ID de la empresa desde la URL
$empresaId = isset($_GET['id']) ? $_GET['id'] : null;

if ($empresaId) {

    $empresas = new Empresas('paginaods');
    $empresaDetails = $empresas->getDetails($empresaId); 

    // Verifica si los detalles fueron encontrados
    if (empty($empresaDetails)) {
        echo json_encode(['error' => 'No se encontraron detalles para la empresa']);
    } else {
        echo json_encode($empresaDetails);
    }
} else {
    echo json_encode(['error' => 'ID de empresa no proporcionado']);
}
?>
