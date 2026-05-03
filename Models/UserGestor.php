<?php

class UserGestor {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConn();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data && password_verify($password, $data['password_hash'])) {
            if ($data['rol'] == 1) {
                return new Admin($data);
            } else {
                return new User($data);
            }
        }
    return false;
    }


    public function register($username, $email, $password, $rol = 0) {
        $sql = "INSERT INTO user (username, email, password_hash, rol) 
                VALUES (:username, :email, :password, :rol)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindValue(':rol', $rol); 
        
        return $stmt->execute();
    }


    public function SearchByEmail($email) {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            if ($data['rol'] == 1) {
                return new Admin($data);
            } else {
                return new User($data);
            }
        }
        
        return null;
    }

}

?>