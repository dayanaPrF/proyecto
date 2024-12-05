<?php
require_once 'vendor/autoload.php';
use PROYECTO\MYAPI\READ\Read;
// Obtener el ID de la empresa desde la URL
$empresaId = isset($_GET['id']) ? $_GET['id'] : null;

if ($empresaId) {
    $empresas = new Read('paginaods');
    $empresas->getDetails($empresaId); 

    // Devuelve la información como JSON
    echo $empresas->getData();
} else {
    echo json_encode(['error' => 'ID de empresa no proporcionado']);
}
?>
