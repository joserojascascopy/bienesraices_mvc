<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router) {
        $errores = Admin::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = New Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)) {
                // Verificar si el usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado) {
                    // Verificar si el usuario existe o no (Mensaje de error)
                    $errores = Admin::getErrores();
                }else {
                    // Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);
                    
                    if($autenticado) {
                        // Autentica el usario
                        $auth->autenticar();
                    }else {
                        // Contraseña incorrecta (Mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout(Router $router) {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}