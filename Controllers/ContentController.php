<?php

class ContentController {
    private $gestor;

    public function __construct($gestor) {
        $this->gestor = $gestor;
    }

    public function index() {
        $movies = $this->gestor->listar();
        include "views/Catalog.php";
    }

    public function newMovie() {
        include "views/MovieForm.php";
    }

    public function SaveMovie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newMovie = new Movie($_POST);
            
            $success = $this->gestor->crear($newMovie);
            
            if ($success) {
                header("Location: index.php?action=listar");
            } else {
                echo "Error al guardar la película.";
            }
        }
    }

}


?>