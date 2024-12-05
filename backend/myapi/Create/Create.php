<?php
    namespace PROYECTO\MYAPI\CREATE;
    use PROYECTO\MYAPI\DataBase;
    require_once __DIR__ . '/../DataBase.php';
    class Create extends DataBase{
        public function __construct($db){
            parent::__construct($db);
        }

        public function add($respForm) {
            $response = [ // Respuesta predeterminada
                'status' => 'error',
                'message' => 'Error al insertar el formulario'
            ];
            
            $sql = "INSERT INTO cuestionario 
                (edad, sexo, ocupacion, hc_1, hc_2, apud_1, apud_2, apud_3, apud_4, rr_1, rr_2, te_1, te_2, te_3, ccr_1, ccr_2, ccr_3, rpc) 
                VALUES ('{$respForm['edad']}', 
                '{$respForm['sexo']}', 
                '{$respForm['ocupacion']}', 
                '{$respForm['hc_1']}', 
                '{$respForm['hc_2']}', 
                '{$respForm['apud_1']}',
                '{$respForm['apud_2']}',
                '{$respForm['apud_3']}',
                '{$respForm['apud_4']}',
                '{$respForm['rr_1']}',
                '{$respForm['rr_2']}',
                '{$respForm['te_1']}',
                '{$respForm['te_2']}',
                '{$respForm['te_3']}',
                '{$respForm['ccr_1']}',
                '{$respForm['ccr_2']}',
                '{$respForm['ccr_3']}',
                '{$respForm['rpc']}')";
            $this->conexion->set_charset("utf8");
            if ($this->conexion->query($sql)) {
                $response = [
                    'status' => 'success',
                    'message' => '¡Respuestas agregadas exitosamente!'
                    ];
            } else {
                $response['message'] = "Error al preparar la consulta: " . $this->conexion->error;
            }
            $this->conexion->close();
            $this->data = $response;
        }    
    
    }
?>