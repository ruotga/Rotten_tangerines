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
            $remember = isset($_POST['remember-me']);

            $user = $this->gestor->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['can_edit'] = $user->canEditContent();

                if ($remember) {
                    $token = base64_encode($user->getEmail());

                    setcookie(
                        "user_login",
                        $token,
                        [
                            'expires' => time() + (86400 * 30),
                            'path' => '/',
                            'httponly' => true,
                            'samesite' => 'Strict'
                        ]
                    );
                }
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
        $_SESSION = [];
        session_destroy();
        if (isset($_COOKIE['user_login'])) {
            setcookie('user_login', '', time() -3600000, '/');
        }
        header("Location: index.php?action=login");
        exit;
    }

public function register() {
    $error = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        try {
            $success = $this->gestor->register($username, $email, $password, 0);

            if ($success) {
                header("Location: index.php?action=login&mensaje=registrado");
                exit;
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        
        include "Views/Register.php"; 
        
    } else {
        
        include "Views/Register.php";
    }
}

}