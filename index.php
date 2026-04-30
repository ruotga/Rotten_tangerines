<?php

require_once "autoload.php";
session_start();

$ContentGestor = new ContentGestor();
$ContentController = new ContentController($ContentGestor);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'crear':
        $ContentController->newMovie();
        break;
    case 'guardar':
        $ContentController->SaveMovie();
        break;
    default:
        $ContentController->index();
    
}
