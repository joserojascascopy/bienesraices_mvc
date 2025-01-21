<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Test\DebugLogTestListener;

class PaginasController {
    public static function index(Router $router)
    {
        $propiedades = Propiedad::getLimit(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router) {
        $resultado = $_GET['resultado'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];

            // Crear una instancia de PHPMailer

            $mail = new PHPMailer();

            // Configurar SMTP

            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '0a19cff230f799';
            $mail->Password = '5f8f98bbd8300c';
            $mail->SMTPSecure = 'tls';

            // Configurar el contenido del email

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');

            // Habilitar HTML

            $mail->isHTML(true); 
            $mail->Subject = 'Tienes un nuevo mensaje';
            $mail->CharSet = 'UTF-8';

            // Definir el contenido

            $contenido = '<html>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Compra o venta: ' . $respuestas['opciones'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: $' . $respuestas['presupuesto'] . '</p>';
            $contenido .= '<p>Modo de contacto: ' . $respuestas['contacto'] . '</p>';

            // Enviar de forma condiconal algunos campos (email o telefono)

            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            }else {
                // Es email
                $contenido .= '<p>Eligió ser contactado por email';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send()) {
                header('Location: /contacto?resultado=7');
            }else {
                header('Location: /contacto?resultado=8');
            }
        }

        $router->render('paginas/contacto', [
            'resultado' => $resultado
        ]);
    }
}