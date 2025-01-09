<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController
{
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

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crea una nueva instancia al mandar el formulario

            $propiedad = new Propiedad($_POST['propiedad']);

            // SUBIDA DE ARCHIVOS

            // Crear una carpeta

            $carpetaImagenes = CARPETA_IMAGENES;

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes); // Para crear un directorio
            }

            // Generar un nombre único para no sobre escribir las imagenes

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear la imagen 

            // Realiza un resize a la imagen con la libreria "intervention/image"

            if ($_FILES['imagen']['tmp_name']) {
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['imagen']['tmp_name'])->resize(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // Validar

            $errores = $propiedad->validar();

            // Revisar si el array de errores esta vacio

            if (empty($errores)) {
                // Guarda en la DB
                $resultado = $propiedad->guardar();

                // Subir la imagen al servidor
                $image->save($carpetaImagenes . $nombreImagen);

                if ($resultado) {
                    // Redireccionar al usuario para que no vuelvan a enviar el mismo formulario, o duplicar entradas en la base de datos
                    header('Location: /admin?resultado=1');
                }
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();

        // Ejecutar el codigo despues de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos

            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            // Validacion

            $errores = $propiedad->validar();

            // Genera un nombre unico

            $carpetaImagenes = CARPETA_IMAGENES;

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['imagen']['tmp_name']) {
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['imagen']['tmp_name'])->resize(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // Revisar si el array de errores esta vacio

            if (empty($errores)) {
                // Almacenar la imagen

                if (isset($image)) {
                    $image->save($carpetaImagenes . $nombreImagen);
                }

                $resultado = $propiedad->guardar();

                if ($resultado) {
                    // Redireccionar al usuario para que no vuelvan a enviar el mismo formulario, o duplicar entradas en la base de datos
                    header('Location: /admin?resultado=2');
                }
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores,
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $propiedad = Propiedad::find($id);

                $resultado = $propiedad->eliminar();

                if ($resultado) {
                    header('Location: /admin?resultado=3');
                }
            }
        }
    }
}