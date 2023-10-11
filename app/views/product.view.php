<?php

class ProductView {
    public function showProducts($products) {
        $count = count($products);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        if ($count === 1) {
            $product = $products[0];   //Obtiene el unico elemento del arreglo para que el template pueda usarlo
            // Mostrar el template de detalle de producto
            require 'templates/productDetail.phtml';
        } else {
            // Mostrar el template de lista de productos
            require 'templates/productList.phtml';
        }
    }
    
    public function showError($error) {
        require 'templates/error.phtml';
    }

}