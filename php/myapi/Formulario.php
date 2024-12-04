<?php
//Estos archivos son provisionales para hacer pruebas en lo que se hace lo de vendor
namespace PROYECTO\MYAPI;

use PROYECTO\MYAPI\DataBase;

require_once 'DataBase.php';

class Formulario extends DataBase {
    private $response = [];

    public function __construct($db, $user = 'root', $pass = '12345678a') {
        parent::__construct($db, $user, $pass);
        
        $this->conexion->set_charset('utf8mb4');  // Mejor opción que utf8 general para manejar todos los caracteres
    }
    public function add($respForm) {
        $this->response = [ // Respuesta predeterminada
            'status' => 'error',
            'message' => 'Error al insertar el formulario'
        ];
        $sql = "INSERT INTO cuestionario 
                (edad, sexo, ocupacion, hc_1, hc_2, apud_1, apud_2, apud_3, apud_4, rr_1, rr_2, te_1, te_2, te_3, ccr_1, ccr_2, ccr_3, rpc) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param(
                'ssssssssssssssssss',
                $respForm['edad'],
                $respForm['sexo'],
                $respForm['ocupacion'],
                $respForm['hc_1'],
                $respForm['hc_2'],
                $respForm['apud_1'],
                $respForm['apud_2'],
                $respForm['apud_3'],
                $respForm['apud_4'],
                $respForm['rr_1'],
                $respForm['rr_2'],
                $respForm['te_1'],
                $respForm['te_2'],
                $respForm['te_3'],
                $respForm['ccr_1'],
                $respForm['ccr_2'],
                $respForm['ccr_3'],
                $respForm['rpc']
            );
            if ($stmt->execute()) {
                $this->response = [
                    'status' => 'success',
                    'message' => '¡Formulario agregado exitosamente!'
                ];
            } else {
                $this->response['message'] = "Error en la ejecución: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $this->response['message'] = "Error al preparar la consulta: " . $this->conexion->error;
        }
        $this->conexion->close();
    }    
    
        public function getData() {
            return $this->response;
        }
}
?>
