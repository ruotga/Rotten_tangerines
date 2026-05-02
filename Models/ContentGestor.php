<?php

class ContentGestor {
    private $db;
    
    public function __construct(){
        $this->db = Connection::getInstance()->getConn(); 
    }

    public function create(Movie $movie) {
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

    public function read() {
        $listado = [];
        
        $query = 'SELECT * FROM movie';
        $stmt = $this->db->query($query);

        while ($value = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $listado[] = new Movie($value);
        }

        return $listado;
    }

    public function update(Movie $movie) {
        $sql = "UPDATE movie SET 
                    title = :title, 
                    genre = :genre, 
                    synopsis = :synopsis, 
                    release_date = :release_date, 
                    poster_url = :poster_url, 
                    runtime_minutes = :runtime_minutes 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':title', $movie->getTitle());
        $stmt->bindValue(':genre', $movie->getGenre());
        $stmt->bindValue(':synopsis', $movie->getSynopsis());
        $stmt->bindValue(':release_date', $movie->getReleaseDate());
        $stmt->bindValue(':poster_url', $movie->getPosterUrl());
        $stmt->bindValue(':runtime_minutes', $movie->getRuntime());
        $stmt->bindValue(':id', $movie->getId());
        
        return $stmt->execute();
    }


    public function delete($id){
        $sql = "DELETE FROM movie WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    public function searchById($id) {
        $sql = "SELECT * FROM movie WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new Movie($data) : null;
    }

    
}

?>