<?php

class GestorPDO {
    private $db;
    
    public function __construct(){
        $this->db = Connection::getInstance()->getConn(); 
    }

}

?>