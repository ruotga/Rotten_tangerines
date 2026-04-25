<?php
require_once 'UserBase.php';

class Admin extends UserBase {
    
    public function __construct($nombre, $password, $id = 0) {
        parent::__construct($nombre, $password, "admin", $id);
    }

    public function añadirPelicula($datos) {
        //sql añadir una pliclua desde un formulario
    }

    public function eliminarUsuario($idUsuario) {
        //sql para borrar usuario por id
    }
}