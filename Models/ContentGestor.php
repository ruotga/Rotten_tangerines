<?php

class ContentGestor {
    private $db;
    
    public function __construct(){
        $this->db = Connection::getInstance()->getConn(); 
    }

}

?>