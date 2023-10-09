<?php
require_once './app/controllers/Category.controller.php';
require_once './app/controllers/Product.controller.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// home                     ->       CategoryController->showCategory();
// productos                ->       ProductController->showProduct();
// productos/categoria_id   ->       ProductController->showProductsByCategory($category_id);


// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new CategoryController();
        $controller->showCategory();
        break;
    case 'productos':
        if (isset($params[1])) {
            $category_id = $params[1];
            $controller = new ProductController();
            $controller->showProductsByCategory($category_id);
            break;
        } else {
            // Si no se proporciona un ID de categoría, muestra todos los productos
            $controller = new ProductController();
            $controller->showAllProducts();
            break;
        }
    default: 
        echo "404 Page Not Found";
        break;
}