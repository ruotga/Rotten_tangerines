<?php
require_once 'UserBase.php';

class User extends UserBase {
    
    public function __construct($username, $email, $password, $id = 0) {
        parent::__construct($username, $email, $password, 0, $id);
    }

    public function crearCritica($movie_id, $score) {

    }
}