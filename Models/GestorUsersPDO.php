<?php
require_once 'Connection.php';

class GestorUsersPDO {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConn();
    }

    public function register(UserBase $user) {
        $sql = "INSERT INTO user (username, email, password_hash, rol) VALUES (:u, :e, :p, :r)";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':u' => $user->getUsername(),
            ':e' => $user->getEmail(),
            ':p' => $user->getPassword(),
            ':r' => $user->getRol()
        ]);
    }
}