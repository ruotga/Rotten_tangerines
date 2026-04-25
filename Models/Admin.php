<?php
require_once 'UserBase.php';
    
class Admin extends UserBase {
    public function __construct($username, $email, $password, $id = 0) {
        parent::__construct($username, $email, $password, 1, $id);
    }

    public function crearPelicula($titulo, $genero, $sinopsis) {
        
    }

    public function moderarReview($reviewId) {

    }
}