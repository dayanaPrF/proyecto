<?php
namespace PROYECTO\MYAPI;

abstract class DataBase {
    protected $conexion;
    protected $data;

    public function __construct($db, $user='root', $pass='12345678a') {
        $this->data = array();
        $this->conexion = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );

        /**
         * NOTA: si la conexión falló $conexion contendrá false
         **/
        if(!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }

    public function getData() {
        return json_encode($this->data);
    }
}
?>