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

    /**
     * Inserta la categoria en la base de datos
     */
    /* function insertCategory($title, $description, $priority)
    {
        $query = $this->db->prepare('INSERT INTO tareas (titulo, descripcion, prioridad) VALUES(?,?,?)');
        $query->execute([$title, $description, $priority]);

        return $this->db->lastInsertId();
    }


    function deleteCategory($id)
    {
        $query = $this->db->prepare('DELETE FROM tareas WHERE id = ?');
        $query->execute([$id]);
    }

    function updateCategory($id)
    {
        $query = $this->db->prepare('UPDATE tareas SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    } */
}
