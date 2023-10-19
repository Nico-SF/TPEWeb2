<?php
    class AuthHelper {

        public static function init() {
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }
        }

        public static function login($user) {
            AuthHelper::init();
            $_SESSION['USER_ID'] = $user->usuario_id;
            $_SESSION['USERNAME'] = $user->usuario_nombre;
        }

        public static function logout() {
            AuthHelper::init();
            session_destroy();
            header('Location: '. BASE_URL .'admin');
        }

        public static function verify() {
            AuthHelper::init();
            if (!isset($_SESSION['USER_ID'])) { // Será true para una sesión activa
                header('Location: ' . BASE_URL . 'admin');
                die();
            }
        }
}
