<?php

class Review {
    private $id;
    private $user_id;
    private $movie_id;
    private $score;

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->user_id = $data['user_id'] ?? null;
        $this->movie_id = $data['movie_id'] ?? null;
        $this->score = $data['score'] ?? null;
    }

    public function getUserId() { return $this->user_id; }
    public function getMovieId() { return $this->movie_id; }
    public function getScore() { return $this->score; }
}

?>