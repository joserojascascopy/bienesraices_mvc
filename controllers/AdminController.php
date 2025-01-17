<?php

namespace Controllers;
use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;

class AdminController {
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        // Mostrar mensaje segun query string
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
}