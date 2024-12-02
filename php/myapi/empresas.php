<?php
namespace PROYECTO\MYAPI;

use PROYECTO\MYAPI\empresas;
//use tecweb\MyApi\DataBase;
require_once __DIR__ . DIRECTORY_SEPARATOR . 'empresas.php';

require_once 'DataBase.php';

class empresas extends DataBase {
    private $response = [];

    public function __construct($db, $user = 'root', $pass = '12345678a') {
        parent::__construct($db, $user, $pass);
    }

    // Método para listar las empresas
    public function list() {
        $this->response = [];

        // Realizamos la consulta a la base de datos
        if ($result = $this->conexion->query("SELECT nombre FROM empresas")) {
            // Obtenemos los resultados
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // Codificamos a UTF-8 los datos y los mapeamos al arreglo de respuesta
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }

        // Cerramos la conexión
        $this->conexion->close();
    }

    // Método para obtener los detalles de una empresa por su ID
    public function single($id) {
        $this->response = [
            'status'  => 'error',
            'message' => 'No se encontró la empresa'
        ];

        if (!empty($id)) {
            $sql = "SELECT * FROM empresas WHERE id = {$id} AND eliminado = 0";
            if ($result = $this->conexion->query($sql)) {
                if ($result->num_rows > 0) {
                    $empresa = $result->fetch_assoc();

                    // Convertimos los valores a UTF-8 y los almacenamos
                    foreach ($empresa as $key => $value) {
                        $this->response['empresa'][$key] = utf8_encode($value);
                    }

                    $this->response['status'] = 'success';
                    $this->response['message'] = 'Empresa encontrada';
                } else {
                    $this->response['message'] = 'Empresa no encontrada o eliminada';
                }
                $result->free();
            } else {
                $this->response['message'] = "Error en la consulta: " . mysqli_error($this->conexion);
            }

            // Cerramos la conexión a la base de datos
            $this->conexion->close();
        } else {
            $this->response['message'] = 'No se proporcionó un ID';
        }
    }

    public function getData(){
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
?>
