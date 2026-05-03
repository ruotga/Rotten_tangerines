<?php

class Movie {
    public $id;
    public $title;
    public $genre;
    public $synopsis;
    public $releaseDate;
    public $posterUrl;
    public $runtimeMinutes;

    public function __construct($data) {
        $this->id = $data['id'] ?? 0;
        $this->title = $data['title'];
        $this->genre = $data['genre'];
        $this->synopsis = $data['synopsis'];
        $this->releaseDate = $data['release_date'];
        $this->posterUrl = $data['poster_url'];
        $this->runtimeMinutes = $data['runtime_minutes'];
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getGenre() { return $this->genre; }
    public function getSynopsis() { return $this->synopsis; }
    public function getReleaseDate() { return $this->releaseDate; }
    public function getPosterUrl() { return $this->posterUrl; }
    public function getRuntime() { return $this->runtimeMinutes; }

    public function getFormattedRuntime(): string {
        if (!$this->runtimeMinutes) return " ";
        $hours = floor($this->runtimeMinutes / 60);
        $minutes = $this->runtimeMinutes % 60;
        return $hours . "h " . $minutes . "m";
    }
}