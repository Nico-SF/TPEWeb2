<?php
require_once './app/models/category.model.php';
require_once './app/views/category.view.php';


class CategoryController
{
    private $model;
    private $view;

    public function __construct()
    {

        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function showCategory()
    {
        // obtengo tareas del controlador
        $categories = $this->model->getCategory();

        // muestro las tareas desde la vista
        $this->view->showCategory($categories);
    }

}
