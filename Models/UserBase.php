<?php

abstract class UserBase {
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $rol;

    public function __construct($username, $email, $password, $rol, $id = 0) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    // Getters
    public function getId(){ return $this->id; }
    public function getUsername(){ return $this->username; }
    public function getEmail(){ return $this->email; }
    public function getPassword(){ return $this->password; }
    public function getRol(){ return $this->rol; }

    // Setters
    public function setId($id){ $this->id = $id; }
    public function setUsername($username){ $this->username = $username; }
    public function setEmail($email){ $this->email = $email; }
    public function setPassword($password){ $this->password = $password; }
    public function setRol($rol){ $this->rol = $rol; }
}