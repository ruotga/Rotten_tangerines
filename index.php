<?php

require_once "autoload.php";
session_start();

$ContentGestor=new ContentGestor();
$userGestor=new userGestor();
$ContentController = new ContentController($ContentGestor);
$userController = new userController($userGestor);

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {
    case 'crear':
    case 'editar':
    case 'eliminar':
    if (!isset($_SESSION['user_id'])){
        header('Location: index.php?accion=login');
        exit;
        }

        if($accion === 'crear') $ContentController->crear();
        if($accion === 'editar') $ContentController->editar();
        if($accion === 'eliminar') $ContentController->eliminar();
        break;

    case 'registro':
        $userController->registro();
        break;  
    case 'login':
        $userController->login();
        break;
    case 'logout':
        $userController->logout();
        break;
    default:
        $ContentController->index();
}
