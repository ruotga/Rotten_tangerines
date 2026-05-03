<?php
require_once "autoload.php";
session_start();

$userGestor = new UserGestor(); 
$contentGestor = new ContentGestor();

$userController = new UserController($userGestor);
$contentController = new ContentController($contentGestor);

if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_login'])) {
    $cookedEmail = base64_decode($_COOKIE['user_login']);
    $user = $userGestor->searchByEmail($cookedEmail);
    if ($user) {
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['can_edit'] = $user->canEditContent();
    } else { 
        setcookie('user_login', '', time() - 3600, '/');
    }
}

if(isset($_SESSION['user_id'])){
    $cookie_name = "theme_user_" . $_SESSION['username'];
    if (isset($_GET['theme'])) {
        $theme = $_GET['theme'];

        setcookie($cookie_name, $theme, time() + (60 * 60 * 24 * 365 * 10), "/");
        
        $action = $_GET['action'] ?? 'index';
        $idParam = isset($_GET['id']) ? "&id=" . $_GET['id'] : "";
        $cleanUrl = "index.php?action=" . $action . $idParam;
        header("Location: " . $cleanUrl);
        exit;
    }
    $user_theme = $_COOKIE[$cookie_name] ?? 'dark';
}else{
    $user_theme = 'dark';
}

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'login':
        $userController->login();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'register':
        $userController->register();
        break;
    case 'createMovie':
    case 'editMovie':
    case 'updateMovie':
    case 'deleteMovie':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        if (!$_SESSION['can_edit']) {
            header('Location: index.php?action=index&error=no_admin');
            exit;
        }
        if ($action === 'createMovie') $contentController->newMovie();
        if ($action === 'editMovie') $contentController->editMovie();
        if ($action === 'updateMovie') $contentController->updateMovie();
        if ($action === 'deleteMovie') $contentController->deleteMovie();
        break;
    case 'watch':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $contentController->watchMovie();
        break;
    case 'rateMovie':
    if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $contentController->rateMovie();
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