<?php
require_once __DIR__ . '/../myapi/empresas.php';

// Obtener el ID de la empresa desde la URL
$empresaId = isset($_GET['id']) ? $_GET['id'] : null;

if ($empresaId) {
    // Crear la instancia de la clase Empresas y obtener la información
    $empresas = new Empresas('paginaods');
    $empresaDetails = $empresas->getDetails($empresaId);  // Asegúrate de crear este método en la clase

    // Devuelve la información como JSON
    echo json_encode($empresaDetails);
} else {
    echo json_encode(['error' => 'ID de empresa no proporcionado']);
}
?>
