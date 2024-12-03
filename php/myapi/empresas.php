<?php
namespace PROYECTO\MYAPI;

namespace PROYECTO\MYAPI;

use PROYECTO\MYAPI\DataBase;

require_once 'DataBase.php';

class Empresas extends DataBase {
    private $response = [];

    public function __construct($db, $user = 'root', $pass = '12345678a') {
        parent::__construct($db, $user, $pass);
        
        $this->conexion->set_charset('utf8mb4');  // Mejor opción que utf8 general para manejar todos los caracteres
    }

    public function list() {
        $this->response = [];

        // Realizamos la consulta a la base de datos
        if ($result = $this->conexion->query("SELECT id, nombre, imagen, area_interes, fuente_consumo, emisiones, medidas FROM empresas")) {
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

    public function getDetails($id) {
        $this->response = [];
    
        // Realizamos la consulta para obtener los detalles de la empresa por ID
        if ($result = $this->conexion->query("SELECT * FROM empresas WHERE id = $id")) {
            $rows = $result->fetch_assoc();
            
            if ($rows) {
                $this->response = $rows;
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }
    
        return $this->response;
    }


    public function getData() {
        return $this->response;
    }
}

?>
