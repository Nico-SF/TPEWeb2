<?php

require_once './config.php';

class CategoryModel {
    private $db;

    function __construct() {
        $this->db = $this->db = new PDO(Config::$CONNECTION['string'],
                                        Config::$CONNECTION['user'],
                                        Config::$CONNECTION['password']);
    }

    
    function getCategory()
    {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        // $category es un arreglo de categorias
        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }
}
