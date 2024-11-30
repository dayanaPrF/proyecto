<?php
//ESTE CODIGO ES EL QUE USA EL LOGIN 😛
namespace PROYECTO\MYAPI;

use PROYECTO\MYAPI\DataBase;
require_once __DIR__ . '/DataBase.php';

class Data extends DataBase {
    private $data;

    public function __construct($db, $user='root', $pass='12345678a') {
        $this->data = array();
        parent::__construct($db, $user, $pass);
    }

    public function registrarUsuario($correo, $contrasena) {
        $sql  = "INSERT INTO user (correo, contraseña) VALUES (?, ?)";
        $stmt = $this->conn->stmt_init();

        if (!$stmt->prepare($sql)) {
            die("SQL error: " . $this->conn->error);
        }

        $stmt->bind_param("ss", $correo, $contrasena);

        if ($stmt->execute()) {
            echo "Registrado correctamente";
        } else {
            if ($this->conn->errno === 1062) {
                die("El correo ya ha sido registrado");
            } else {
                die("Error: " . $this->conn->errno . " " . $this->conn->error);
            }
        }

        $stmt->close();
    }
}
?>
