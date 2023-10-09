<?php
require_once './app/models/product.model.php';
require_once './app/views/product.view.php';
/* require_once './app/helpers/auth.helper.php'; */

class ProductController
{
    private $model;
    private $view;

    public function __construct()
    {
        // Verificar la acción actual y decidir si se requiere autenticación para 'admin'
        /* if ($_GET['action'] == 'admin') { */
        // Verificar la autenticación para la acción 'admin'
        /*    AuthHelper::verify();
        } */
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function showAllProducts()
    {

        //obtengo los productos del controlador
        $products = $this->model->getProducts();

        //muestro los productos desde la vista
        $this->view->showProducts($products);
    }

    public function showProductsByCategory($category_id)
    {

        $products = $this->model->getProductsByCategory($category_id);

        $this->view->showProducts($products);
    }

    function showProductDetailPage($product_id){
        
        // Obtener los detalles del producto por su ID
        $product = $this->model->getProductById($product_id);

        // Mostrar la vista de detalle de producto individual
        $this->view->showProducts($product);

    }

    public function showProductDetail($product_id)
    {
        // Obtener los detalles del producto por su ID
        $product = $this->model->getProductById($product_id);

        // Mostrar la vista de detalle de producto
        $this->view->showProducts($product);
    }
}
