<?php
require_once './app/controllers/Category.controller.php';
require_once './app/controllers/Product.controller.php';
require_once './app/controllers/admin.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'categorias'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'categorias':
        if (isset($params[1])) {
            switch($params[1]) {
                case 'crear':
                    $controller = new AdminController();
                    $controller->crearCategoria();
                    break;
                case 'editar':
                    if (isset($params[2])) {
                        $controller = new AdminController();
                        $controller->editarCategoria($params[2]);
                    }
                    break;
                case 'borrar';
                    if (isset($params[2])) {
                        $controller = new AdminController();
                        $controller->borrarCategoria($params[2]);
                    }
                    break;
            }
            break;
        } else {
            $controller = new CategoryController();
            $controller->showCategory();
            break;
        }
    case 'productos':
        if (isset($params[1])) {
            switch($params[1]) {
                case 'ver':
                    if (isset($params[2])) {
                        $controller = new ProductController();
                        $controller->showProductDetail(isset($params[2]));
                    }
                    break;
                case 'crear':
                    $controller = new AdminController();
                    $controller->crearProducto();
                    break;
                case 'editar':
                    if (isset($params[2])) {
                        $controller = new AdminController();
                        $controller->editarProducto($params[2]);
                    }
                    break;
                case 'borrar':
                    if (isset($params[2])) {
                        $controller = new AdminController();
                        $controller->borrarProducto($params[2]);
                    }
                    break;
                default:
                    $controller = new ProductController();
                    $controller->showProductByCategory($params[1]);
                    break;
            }
        } else {
            $controller = new ProductController();
            $controller->showAllProducts();
            break;
        }
    case 'admin':
        $controller = new AdminController();
        $controller->showAdmin();
        break;
    case 'login':
        $controller = new AdminController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AdminController();
        $controller->logout();
        break;
    default:
        echo "404 Page Not Found";
        break;
}
