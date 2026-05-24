<?php

class AuthController {

    public function mostrarLogin() {
        require_once 'views/loginView.phtml';
    }

    public function autenticar() {
        session_start();
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if ($usuario == 'admin' && $password == '1234') {
            $_SESSION['USER_ID'] = 1;
            header('Location: ' . BASE_URL . 'clientes');
        } else {
            echo 'Usuario o contraseña incorrectos';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }
}