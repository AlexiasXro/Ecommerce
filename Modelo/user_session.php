<?php
session_start();

class UserSession {

    // Constructor
    public function __construct() {
        // Inicia la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function setCurrentUser($user) {
        $_SESSION['user'] = $user;
    }
    
    public function setIsAdmin($admin) {
        $_SESSION['admin'] = $admin;
    }

    public function getCurrentUser() {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public function isAdmin() {
        return isset($_SESSION['admin']) ? $_SESSION['admin'] : false;
    }

    public function closeSession() {
        session_unset();
        session_destroy();
    }
}
?>
