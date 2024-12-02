<?php
//ESTE CODIGO ES EL QUE USA EL LOGIN 😛
namespace PROYECTO\MYAPI;

use PROYECTO\MYAPI\DataBase;
require_once __DIR__ . '/DataBase.php';

//  control de entrada del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];  // Recibir los datos del formulario
    $contraseña = $_POST['password'];

    // Crear instancia de la clase Data
    $db = new Data("paginaods");
    $db->registrarUsuario($correo, $contraseña); 
}

class Data extends DataBase {
    private $data;

    public function __construct($db, $user='root', $pass='12345678a') {
        $this->data = array();
        parent::__construct($db, $user, $pass);
    }

        public function registrarUsuario($correo, $contraseña) {
            $sql = "INSERT INTO user (correo, contraseña) VALUES (?, ?)";
            $stmt = $this->conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die(json_encode(['status' => 'error', 'message' => 'SQL error: ' . $this->conn->error]));
            }
    
            // Hashear la contraseña antes de guardarla
            $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
            $stmt->bind_param("ss", $correo, $hashedPassword);
    
            if ($stmt->execute()) {
                // Si se registra correctamente, enviar una respuesta exitosa
                return ['status' => 'success', 'message' => 'Registrado correctamente'];
            } else {
                if ($this->conn->errno === 1062) {
                    // El correo ya existe
                    return ['status' => 'error', 'message' => 'El correo ya ha sido registrado'];
                } else {
                    return ['status' => 'error', 'message' => 'Error: ' . $this->conn->errno . ' ' . $this->conn->error];
                }
            }
            $stmt->close();
        }
}
?>
