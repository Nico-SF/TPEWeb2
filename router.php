<?php
require_once './app/controllers/category.controller.php';
require_once './app/controllers/product.controller.php';
require_once './app/controllers/admin.controller.php';



define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// /home                       ->       CategoryController->showCategory();
// /productos                  ->       ProductController->showProduct();
// /productos/categoria_id     ->       ProductController->showProductsByCategory($category_id);
// /productos/ver/producto_id  ->       ProductController->showProductById($product_id);


// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        if (isset($params[1])) {
            switch ($params[1]) {
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
                case 'borrar':
                    if (isset($params[2])) {
                        $controller = new AdminController();
                        $controller->borrarCategoria($params[2]);
                    }
                    break;
            }
        } else {
            $controller = new CategoryController();
            $controller->showCategory();
        }
        break;
    case 'productos':
        if (isset($params[1])) {
            switch ($params[1]) {
                case 'ver':
                    if (isset($params[2])) {
                        $product_id = $params[2];
                        $controller = new ProductController();
                        $controller->showProductDetail($product_id);
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
                    $controller->showProductsByCategory($params[1]);
                    break;
            }
        } else {
            $controller = new ProductController();
            $controller->showAllProducts();
            break;
        }
        break;
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
