<?php
session_start();

class Auth {
    private $user = "Tecno3f";
    private $pass = "Tecno3f";

    public function login($username, $password) {
        // Chequea si el usuario y contraseña son correctos
        if ($username === $this->user && $password === $this->pass) {
            $_SESSION['user'] = $username; // Guarda el usuario en la sesión
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }

    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }
}
?>