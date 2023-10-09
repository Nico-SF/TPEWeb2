<?php

class ProductModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=ecommerce_db;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas los productos
     */
    function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        // $product es un arreglo de tareas
        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }
}
