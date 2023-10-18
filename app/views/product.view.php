<?php

class ProductView {
    public function showProducts($products) {
        $count = count($products);
        if ($count === 1) {
            $product = $products[0];
            require 'templates/productDetail.phtml';
        } else {
            require 'templates/productList.phtml';
        }
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function showProductDetail($product) {
        require 'templates/productDetail.phtml';
    }
}
