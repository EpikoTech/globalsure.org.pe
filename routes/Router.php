<?php
class Router {
    protected $routes = []; // Arreglo para almacenar las rutas

    // Método para agregar rutas al enrutador
    public function addRoute($path, $view) {
        $this->routes[$path] = $view;
    }

    // Método para enrutamiento
    public function route($page) {
        if (array_key_exists($page, $this->routes)) {
            include($this->routes[$page]); // Incluir la vista correspondiente
        } else {
            include('views/404.php'); // Página 404 por defecto si no se encuentra la ruta
        }
    }
}
?>
