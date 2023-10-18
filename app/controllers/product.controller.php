<?php
require_once './app/models/product.model.php';
require_once './app/views/product.view.php';

class ProductController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function showAllProducts()
    {
        $products = $this->model->getProducts();
        $this->view->showProducts($products);
    }

    public function showProductByCategory($category_id)
    {
        $products = $this->model->getProductsByCategory($category_id);
        $this->view->showProducts($products);
    }

    public function showProductDetail($product_id)
    {
        $product = $this->model->getProductById($product_id);

        if ($product) {
            $this->view->showProductDetail($product);
        } else {
            echo "Product not found";
        }
    }
}
