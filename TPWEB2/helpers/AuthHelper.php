<?php

class AuthHelper {
    public static function verificarLogin() {
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }
}