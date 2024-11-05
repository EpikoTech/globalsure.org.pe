<?php
include_once(__DIR__ . '/../utils/Database.php');

class Router {
    protected $routes = [];

    public function addRoute($path, $view) {
        $this->routes[$path] = $view;
    }

    public function route($page) {
        if (array_key_exists($page, $this->routes)) {
            include($this->routes[$page]);
        } else {
            include('views/404.php'); // Página 404 por defecto
        }
    }
}
?>
