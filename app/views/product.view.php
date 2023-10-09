<?php

class ProductView {
    public function showProducts($products) {
        $count = count($products);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        if ($count === 1) {
            // Mostrar el template de detalle de producto si hay solo un producto
            require 'templates/productDetail.phtml';
        } else {
            // Mostrar el template de lista de productos si hay más de uno
            require 'templates/productList.phtml';
        }
    }
    
    public function showError($error) {
        require 'templates/error.phtml';
    }

}