<?php
abstract class UserBase {
    protected $id;
    protected $username;
    protected $email;
    protected $rol;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->rol = $data['rol'];
    }

    // Getters comunes
    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getRol() { return $this->rol; }
}
?>