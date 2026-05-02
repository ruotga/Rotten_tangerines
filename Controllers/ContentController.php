<?php

class ContentController {
    private $gestor;

    public function __construct($gestor) {
        $this->gestor = $gestor;
    }

    public function index() {
        $movies = $this->gestor->read();
        include "views/Catalog.php";
    }

    public function newMovie() {
        include "views/MovieForm.php";
    }

    public function saveMovie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newMovie = new Movie($_POST);
            
            $success = $this->gestor->create($newMovie);
            
            if ($success) {
                header("Location: index.php?action=listar");
            } else {
                echo "Error al guardar la película.";
            }
        }
    }

    public function editMovie() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $movie = $this->gestor->searchById($id);
            if ($movie) {
                include "Views/MovieForm.php";
            } else {
                header("Location: index.php?action=index");
            }
        } else {
            header("Location: index.php?action=index");
        }
    }

    public function updateMovie() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $movieUpdated = new Movie($_POST);
        
        $success = $this->gestor->update($movieUpdated);
        
        if ($success) {
            header("Location: index.php?action=index");
        } else {
            echo "Error al intentar actualizar la película.";
        }
    }
}

    public function deleteMovie() {
        $movieId = $_GET['id'] ?? null;
        $this->gestor->delete($movieId);
        header("Location: index.php");
    }
}


?>