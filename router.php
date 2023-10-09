<?php
require_once './app/controllers/Category.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// home      ->         categoryController->showCategory();




// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new CategoryController();
        $controller->showCategory();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}