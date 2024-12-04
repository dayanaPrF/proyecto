<?php
//Estos archivos son provisionales para hacer pruebas en lo que se hace lo de vendor
namespace PROYECTO\MYAPI;

use PROYECTO\MYAPI\DataBase;

require_once __DIR__ . '/../DataBase.php';

class Formulario extends DataBase {
    private $response = [];

    public function __construct($db, $user = 'root', $pass = '12345678a') {
        parent::__construct($db, $user, $pass);
        
        $this->conexion->set_charset('utf8mb4');  // Mejor opción que utf8 general para manejar todos los caracteres
    }

    public function add($respForm) {
        // Respuesta predeterminada
        $response = array(
            'status' => 'error',
            'message' => 'Error al insertar el formulario'
        );

        $this->conexion->set_charset("utf8");
        $sql = "INSERT INTO productos (id, edad, sexo, ocupacion, hc_1, hc_2, apud_1, apud_2, apud_3, apud_4, rr_1, rr_2, te_1, te_2, te_3, ccr_1, ccr_2, ccr_3, rpc) 
                VALUES (null, '{$respForm['edad']}', '{$respForm['sexo']}', '{$respForm['ocupacion']}', '{$respForm['hc_1']}', 
                '{$respForm['hc_2']}', '{$respForm['apud_1']}', '{$respForm['apud_2']}', '{$respForm['apud_3']}', '{$respForm['apud_4']}',
                '{$respForm['rr_1']}', '{$respForm['rr_2']}', '{$respForm['te_1']}', '{$respForm['te_2']}', '{$respForm['te_3']}', '{$respForm['ccr_1']}',
                '{$respForm['ccr_2']}', '{$respForm['ccr_3']}', '{$respForm['rpc']}')";

        if ($this->conexion->query($sql)) {
            $response['status'] = "success";
            $response['message'] = "¡Formulario agregado exitosamente!";
        } else {
            $response['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($this->conexion);
        }

        // Cerrar la conexión
        $this->conexion->close();

        return $response;
    }
    
    public function getData() {
        return $this->response;
    }
    }
?>
