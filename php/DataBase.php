<?php
namespace PROYECTO\MYAPI;

abstract class DataBase {
    protected $conexion;
    protected $data;

    public function __construct($db, $user='root', $pass='dayprzf24') {
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