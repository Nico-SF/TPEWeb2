<?php

require_once './config.php';

class ProductModel {
    private $db;

    function __construct() {
        $this->db = $this->db = new PDO(Config::$CONNECTION['string'],
                                        Config::$CONNECTION['user'],
                                        Config::$CONNECTION['password']);
    }

    /**
     * Obtiene y devuelve de la base de datos todas los productos
     */
    function getProducts() //podria ser getAllProducts
    {
        $query = $this->db->prepare('SELECT productos.*, categorias.categoria_nombre
                                    FROM productos
                                    JOIN categorias ON productos.categoria_id = categorias.categoria_id');
        $query->execute();

        // $product es un arreglo de productos
        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }

    function getProductsByCategory($category_id)
    {

        $query = $this->db->prepare('SELECT productos.*, categorias.categoria_nombre
                                    FROM productos
                                    JOIN categorias ON productos.categoria_id = categorias.categoria_id
                                    WHERE productos.categoria_id = :category_id');
        $query->bindParam(':category_id', $category_id, PDO::PARAM_INT); //MEDIDA DE SEGURIDAD PARA EVITAR INJECCION SQL
        $query->execute();

        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }

    public function getProductById($product_id)
    {

            $query = $this->db->prepare('SELECT productos.*, categorias.categoria_nombre
                                         FROM productos
                                         JOIN categorias ON productos.categoria_id = categorias.categoria_id
                                         WHERE productos.producto_id = :product_id');
            $query->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $query->execute();

            // Obtener los detalles del producto
            $product = $query->fetch(PDO::FETCH_OBJ);

           return $product;    
    }
}
