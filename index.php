<?php
require_once "autoload.php";
session_start();

$userGestor = new UserGestor(); 
$contentGestor = new ContentGestor();

$userController = new UserController($userGestor);
$contentController = new ContentController($contentGestor);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    //public
    case 'login':
        $userController->login();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'register':
        $userController->register();
        break;
    //admin
    case 'createMovie':
    case 'editMovie':
    case 'updateMovie':
    case 'deleteMovie':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        if ($_SESSION['rol'] != 1) {
            header('Location: index.php?action=index&error=no_admin');
            exit;
        }
        if ($action === 'createMovie') $contentController->newMovie();
        if ($action === 'editMovie') $contentController->editMovie();
        if ($action === 'updateMovie') $contentController->updateMovie();
        if ($action === 'deleteMovie') $contentController->deleteMovie();
        break;
    //logged-user
    case 'watch':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $contentController->watchMovie(); 
        break;
    case 'index':
    default:
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $contentController->index();
        break;
}