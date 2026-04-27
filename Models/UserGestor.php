<?php
require_once 'Connection.php';

class UserGestor {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConn();
    }

    public function login($username, $password) {
    $sql = "SELECT * FROM user WHERE username = :u";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':u' => $username]);
    $row = $stmt->fetch();

    if ($row && password_verify($password, $row['password_hash'])) {
        return $row; 
    }
    return false;
}
}