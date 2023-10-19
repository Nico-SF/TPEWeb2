<?php
    class AdminView {
        public function showAdmin($products, $categories) {
            require './templates/admin.phtml';
        }
        public function showLogin() {
            require './templates/login.phtml';
        }
        public function showError() {
            require './templates/error.phtml';
        }
    }
?>