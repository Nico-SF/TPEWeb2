<?php
    require_once './app/models/admin.model.php';
    require_once './app/views/admin.view.php';
    require_once './app/helpers/auth.helper.php';

    class AdminController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new AdminModel();
            $this->view = new AdminView();
        }

        public function debugConsole($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        }
        public function showAdmin() {
        AuthHelper::init();
        $this->debugConsole(isset($_SESSION['USER_ID']) ? $_SESSION["USER_ID"] : "NO ESTÄ");
            if (isset($_SESSION['USER_ID'])) {
                $products = $this->model->getProducts();
                $categories = $this->model->getCategories();
                $this->view->showAdmin($products, $categories);
            } else {
                $this->showLogin();
            }
        }

        public function showLogin() {
            $this->view->showLogin();
        }

        public function login() {
            $user = $this->model->getByUsername($_POST["username"]);

            if ($user && password_verify($_POST["password"], $user->usuario_pass)) {
                AuthHelper::login($user);
                header('Location: ' . BASE_URL .'admin');
            } else {
                $this->view->showError("Error en la autenticación!");
            }
        }

        public function logout() {
            AuthHelper::logout();
        }

        public function password_verify() {}

        // CRUD

        // Product
        public function createProduct() {
            AuthHelper::verify();
            $category_id = $_POST['product_category'];
            $product_name = $_POST['product_name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $this->model->createProduct($category_id, $product_name, $description, $price);
            header('Location: ' . BASE_URL .'admin');
        }

        public function editProduct($product_id) {
            AuthHelper::verify();
            $category_id = $_POST['product_category'];
            $product_name = $_POST['product_name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $this->model->updateProduct($product_id, $category_id, $product_name, $description, $price);
            header('Location: ' . BASE_URL .'admin');
        }

        public function deleteProduct($product_id) {
            AuthHelper::verify();
            $this->model->deleteProduct($product_id);
            header('Location: ' . BASE_URL .'admin');
        }

        // Category
        public function createCategory() {
            AuthHelper::verify();
            $category_name = $_POST['category_name'];
            $this->model->createCategory($category_name);
            header('Location: ' . BASE_URL .'admin');
        }

        public function editCategory($category_id) {
            AuthHelper::verify();
            $category_name = $_POST['category_name'];
            $this->model->updateCategory($category_id, $category_name);
            header('Location: ' . BASE_URL .'admin');
        }

        public function deleteCategory($categoryId) {
            AuthHelper::verify();
            $this->model->deleteCategory($categoryId);
            header('Location: ' . BASE_URL .'admin');
        }
    }
?>