<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    public static function crear(Router $router)
    {
        // Instanciamos el objeto de "vendedor" vacío 

        $vendedor = new Vendedor;

        // Arreglo con mensajes de errores

        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crea una nueva instancia al mandar el formulario

            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar

            $errores = $vendedor->validar();

            // Revisar si el array de errores esta vacio

            if (empty($errores)) {
                // Subir la imagen al servidor

                $resultado = $vendedor->guardar();

                if ($resultado) {
                    // Redireccionar al usuario para que no vuelvan a enviar el mismo formulario, o duplicar entradas en la base de datos
                    header('Location: /admin?resultado=5');
                }
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        // Traemos el registro de vendedor por su id 

        $vendedor = Vendedor::find($id);

        // Arreglo con mensajes de errores

        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['vendedor'];

            // Sincronizar el objeto en memoria con lo que el usuario escribe en el formulario
            $vendedor->sincronizar($args);

            $errores = $vendedor->validar();

            if (empty($errores)) {
                $resultado = $vendedor->guardar();

                if ($resultado) {
                    header('Location: /admin?resultado=6');
                }
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                // Validar por tipo
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);

                    $resultado = $vendedor->eliminar();

                    if ($resultado) {
                        header('Location: /admin?resultado=4');
                    }
                }
            }
        }
    }
}