<?php
namespace PROYECTO\MYAPI;

use PROYECTO\MYAPI\DataBase;
use PROYECTO\MYAPI\Empresas;


require_once __DIR__ . '/../DataBase.php';

class Read extends DataBase {
    
    public function __construct($db) {
        parent::__construct($db);
    }
        // Método para obtener la lista de productos
        public function list() {
            $this->response = [];
        
            // Realizamos la consulta a la base de datos
            if ($result = $this->conexion->query("SELECT * FROM empresas")) {
                // Obtenemos los resultados
                $rows = $result->fetch_all(MYSQLI_ASSOC);
        
                if (!is_null($rows)) {
                    // Codificamos a UTF-8 los datos y los mapeamos al arreglo de respuesta
                    foreach ($rows as $num => $row) {
                        foreach ($row as $key => $value) {
                            $this->response[$num][$key] = mb_convert_encoding($value, 'UTF-8', 'auto');
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: ' . mysqli_error($this->conexion));
            }
        }
        


    // Buscar empresa o producto por ID
    public function single($id) {
        $this->response = [
            'status'  => 'error',
            'message' => 'No se encontró la empresa o producto'
        ];

        // Verificamos si se ha recibido un ID
        if (isset($id)) {
            $id = intval($id);  // Asegurarse de que el ID sea un entero para evitar inyecciones SQL

            // Realizamos la consulta SQL para buscar la empresa por ID
            $sql = "SELECT * FROM empresas WHERE id = {$id} AND eliminado = 0";
            if ($result = $this->conexion->query($sql)) {
                if ($result->num_rows > 0) {
                    $empresa = $result->fetch_assoc();
                    // Convertimos los valores a UTF-8 y guardamos la empresa en el array
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
        } else {
            $this->response['message'] = 'No se proporcionó un ID';
        }

        return $this->response;
    }

    function listAnswers(){
        $this->response = [];

        // Realizamos la consulta a la base de datos
        if ($result = $this->conexion->query("SELECT * FROM cuestionario")) {
            // Obtenemos los resultados
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // Mapear los resultados
                $this->response = $rows;
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }

        // Cerramos la conexión
        $this->conexion->close();
    }
}
?>
