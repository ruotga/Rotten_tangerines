<?php

class ContentGestor {
    private $db;
    
    public function __construct(){
        $this->db = Connection::getInstance()->getConn(); 
    }

    public function listar() {
        $listado = [];
        
        $query = 'SELECT * FROM movie';
        $stmt = $this->db->query($query);

        while ($value = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $listado[] = new Movie($value);
        }

        return $listado;
    }

    public function crear(Movie $movie) {
    $sql = "INSERT INTO movie (title, genre, synopsis, release_date, poster_url, runtime_minutes) 
            VALUES (:title, :genre, :synopsis, :release_date, :poster_url, :runtime_minutes)";
    
    $stmt = $this->db->prepare($sql);
    
    $stmt->bindValue(':title', $movie->getTitle());
    $stmt->bindValue(':genre', $movie->getGenre());
    $stmt->bindValue(':synopsis', $movie->getSynopsis());
    $stmt->bindValue(':release_date', $movie->getReleaseDate());
    $stmt->bindValue(':poster_url', $movie->getPosterUrl());
    $stmt->bindValue(':runtime_minutes', $movie->getRuntime());
    
    return $stmt->execute();
}
}

?>