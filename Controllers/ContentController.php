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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newMovie = new Movie($_POST);
        $success = $this->gestor->create($newMovie);

            if ($success) {
                header("Location: index.php?action=index");
                exit;
            } else {
                $error = "Error al guardar la película.";
                include "views/MovieForm.php";
            }
        } else {
            include "views/MovieForm.php";
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


    public function watchMovie() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php");
            exit;
        }
        $movie = $this->gestor->searchById($id);
        $average = $this->gestor->avgScore($id);
        $userId = $_SESSION['user_id'] ?? null;
        $userScore = $userId ? $this->gestor->getUrScore($userId, $id) : null;

        include "Views/MovieDetails.php";
    }

    public function rateMovie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $movieId = $_POST['movie_id'];
            $score = $_POST['score'];
            $userId = $_SESSION['user_id'];

            $success = $this->gestor->rate($userId, $movieId, $score);

            if ($success) {
                header("Location: index.php?action=watch&id=" . $movieId);
            } else {
                echo "Error al procesar la puntuación.";
            }
        } else {
            echo "Debes iniciar sesión para puntuar.";
        }
    }
}



?>