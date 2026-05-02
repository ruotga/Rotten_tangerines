<?php

class UserController {
    private $gestor;

    public function __construct($gestor) {
        $this->gestor = $gestor;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->gestor->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user->getId();;
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['rol'] = $user->getRol();

                header("Location: index.php?action=index");
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos.";
                include "Views/Login.php";
            }
        } else {
            include "Views/Login.php";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $success = $this->gestor->register($username, $email, $password, 0);

            if ($success) {
                header("Location: index.php?action=login&mensaje=registrado");
                exit;
            } else {
                $error = "No se pudo completar el registro. El usuario o email podrían ya existir.";
                include "Views/Registro.php";
            }
        } else {
            include "Views/Register.php";
        }
    }
}