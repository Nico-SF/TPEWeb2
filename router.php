<?php
require_once './app/controllers/Category.controller.php';
require_once './app/controllers/Product.controller.php';



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
        $controller = new CategoryController();
        $controller->showCategory();
        break;
    case 'productos':
        if (isset($params[1]) && $params[1] === 'ver' && isset($params[2])) {
            // Ruta: /productos/ver/{producto_id} -> Mostrar detalles de un producto
            $product_id = $params[2];
            $controller = new ProductController();
            $controller->showProductDetail($product_id);
        } elseif (isset($params[1])) {
            // Ruta: /productos/{categoria_id} -> Mostrar productos por categoría
            $category_id = $params[1];
            $controller = new ProductController();
            $controller->showProductsByCategory($category_id);
        } else {
            // Ruta: /productos -> Mostrar todos los productos
            $controller = new ProductController();
            $controller->showAllProducts();
        }
    default:
        echo "404 Page Not Found";
        break;
}
