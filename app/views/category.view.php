<?php

class CategoryView {
    public function showCategory($category) {
        $count = count($category);
        require 'templates/categoryList.phtml';
    }
}