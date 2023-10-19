<?php

class CategoryView {
    public function showCategory($category) {
        $count = count($category);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates/categoryList.phtml';
    }

/*     public function showError($error) {
        require 'templates/error.phtml';
    } */
}