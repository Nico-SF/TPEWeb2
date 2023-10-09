<?php

class ProductModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getProducts() {
        $query = $this->db->prepare('SELECT * FROM tareas');
        $query->execute();

        // $product es un arreglo de tareas
        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }

    /**
     * Inserta la tarea en la base de datos
     */
    function insertProduct($title, $description, $priority) {
        $query = $this->db->prepare('INSERT INTO tareas (titulo, descripcion, prioridad) VALUES(?,?,?)');
        $query->execute([$title, $description, $priority]);

        return $this->db->lastInsertId();
    }

    
function deleteProduct($id) {
    $query = $this->db->prepare('DELETE FROM tareas WHERE id = ?');
    $query->execute([$id]);
}

function updateProduct($id) {    
    $query = $this->db->prepare('UPDATE tareas SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);
}
}