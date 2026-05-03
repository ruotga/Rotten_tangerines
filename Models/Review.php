<?php

class Review {
    private $id;
    private $userId;
    private $movieId;
    private $score;

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->userId = $data['userId'] ?? null;
        $this->movieId = $data['movieId'] ?? null;
        $this->score = $data['score'] ?? null;
    }

    public function getUserId() { return $this->userId; }
    public function getMovieId() { return $this->movieId; }
    public function getScore() { return $this->score; }
}

?>