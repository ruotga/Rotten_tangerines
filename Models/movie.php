<?php

class Movie {
    public $id;
    public $title;
    public $genre;
    public $synopsis;
    public $release_date;
    public $poster_url;
    public $runtime_minutes;

    public function __construct($data) {
        $this->id = $data['id'] ?? 0;
        $this->title = $data['title'];
        $this->genre = $data['genre'];
        $this->synopsis = $data['synopsis'];
        $this->release_date = $data['release_date'];
        $this->poster_url = $data['poster_url'];
        $this->runtime_minutes = $data['runtime_minutes'];
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getGenre() { return $this->genre; }
    public function getSynopsis() { return $this->synopsis; }
    public function getReleaseDate() { return $this->release_date; }
    public function getPosterUrl() { return $this->poster_url; }
    public function getRuntime() { return $this->runtime_minutes; }

    public function getFormattedRuntime(): string {
        if (!$this->runtime_minutes) return " ";
        $hours = floor($this->runtime_minutes / 60);
        $minutes = $this->runtime_minutes % 60;
        return $hours . "h " . $minutes . "m";
    }
}