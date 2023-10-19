<?php
    require_once './config.php';

    class AdminModel {
        private $db;

        function __construct() {
            $this->db = new PDO(Config::$CONNECTION['string'],
                                Config::$CONNECTION['user'],
                                Config::$CONNECTION['password']);
        }

        public function getByUsername($username) {
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario_nombre = ?');
            $query->execute([$username]);

            return $query->fetch(PDO::FETCH_OBJ);
        }

        // PRODUCTOS
        public function getProducts() {
            $query = $this->db->prepare('SELECT * FROM productos');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function createProduct($category_id, $product_name, $description, $price) {
            $query = $this->db->prepare('INSERT INTO productos (categoria_id, producto_nombre, descripcion, precio) VALUES (?, ?, ?, ?)');
            $query->execute([$category_id, $product_name, $description, $price]);
            $rowCount = $query->rowCount();
            return $rowCount;
        }
        public function updateProduct($product_id, $category_id, $product_name, $description, $price) {
            $query = $this->db->prepare('UPDATE productos SET categoria_id = ?, producto_nombre = ?, descripcion = ?, precio = ? WHERE producto_id = ?');
            $query->execute([$category_id, $product_name, $description, $price, $product_id]);
            $rowCount = $query->rowCount();
            return $rowCount;
        }
        public function deleteProduct($product_id) {
            $query = $this->db->prepare('DELETE FROM productos WHERE producto_id = ?');
            $query->execute([$product_id]);
            $rowCount = $query->rowCount();
            return $rowCount;
        }
        // CATEGORIAS
        public function getCategories() {
            $query = $this->db->prepare('SELECT * FROM categorias');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function createCategory($category_name) {
            $query = $this->db->prepare('INSERT INTO categorias (categoria_nombre) VALUES (?)');
            $query->execute([$category_name]);
            $rowCount = $query->rowCount();
            return $rowCount;
        }
        public function updateCategory($category_id, $category_name) {
            $query = $this->db->prepare('UPDATE categorias SET categoria_nombre = ? WHERE categoria_id = ?');
            $query->execute([$category_name, $category_id]);
            $rowCount = $query->rowCount();
            return $rowCount;
        }
        public function deleteCategory($category_id) {
            $query = $this->db->prepare('DELETE FROM categorias WHERE categoria_id = ?');
            $query->execute([$category_id]);
            $rowCount = $query->rowCount();
            return $rowCount;
        }
    }
?>
