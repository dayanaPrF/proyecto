<?php
namespace PROYECTO\MYAPI\READ;
use PROYECTO\MYAPI\DataBase;
require_once __DIR__ . '/../DataBase.php';

class Read extends DataBase {
    
    public function __construct($db) {
        parent::__construct($db);
    }

    public function list() {
        $this->response = [];
        if ($result = $this->conexion->query("SELECT id, nombre, imagen, area_interes, fuente_consumo, emisiones, medidas FROM empresas")) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if (!is_null($rows)) {
                $this->response = $rows;
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }
        $this->conexion->close();
        $this->data = $response;
    }
        
    function listAnswers(){
        $this->response = [];
        if ($result = $this->conexion->query("SELECT * FROM cuestionario")) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if (!is_null($rows)) {
                $this->response = $rows;
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }
        $this->conexion->close();
        $this->data = $response;
    }

    public function getDetails($id) {
        $this->response = [];
        if ($result = $this->conexion->query("SELECT * FROM empresas WHERE id = $id")) {
            $rows = $result->fetch_assoc();
            if ($rows) {
                $this->response = $rows;
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }
        $this->conexion->close();
        $this->data = $response;
    }

    function listReflexion(){
        $this->response = [];
        if ($result = $this->conexion->query("SELECT rpc FROM cuestionario")) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if (!is_null($rows)) {
                $this->response = $rows;
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }
        $this->conexion->close();
        $this->data = $response;
    }
}
?>
