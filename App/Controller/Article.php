<?php


namespace App\Controller;


class Article
{
    public function index(int $category) {
        echo 'CategoryId: # '. $category;
    }
}