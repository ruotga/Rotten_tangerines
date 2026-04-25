<?php

Abstract Class UserBase {
    Protected $id;
    Protected $nombre;
    Protected $password;
    Protected $rol;

    public function __construct($nombre, $password, $rol, $id=0){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->password=$password;
        $this->rol=$rol;
    }

    public function getId(){ return $this->id; }
    public function getNombre(){ return $this->nombre; }
    public function getPassword(){ return $this->password; }
    public function getRol(){ return $this->rol; }


    public function setId($id){ $this->id=$id; }
    public function setNombre($nombre){ $this->nombre=$nombre; }
    public function setPassword($password){ $this->password=$password; }
    public function setRol($rol){ $this->rol=$rol; }
}

?>