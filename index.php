<?php

require_once "autoload.php";
session_start();

$ContentGestor = new ContentGestor();
$ContentController = new ContentController($ContentGestor);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'createMovie':
        $ContentController->newMovie();
        break;
    case 'saveMovie':
        $ContentController->saveMovie();
        break;
    case 'editMovie':
        $ContentController->editMovie();
        break;
    case 'updateMovie':
        $ContentController->updateMovie();
        break;
    case 'deleteMovie':
        $ContentController->deleteMovie();
    default:
        $ContentController->index();
}
