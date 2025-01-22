<?php

namespace Model;

class Admin extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar() {
        if(!$this->email) {
            self::$errores[] = 'El email es incorrecto o no es válido';
        }
        if(!$this->password) {
            self::$errores[] = 'La contraseña es incorrecta o no es válido';
        }

        return self::$errores;
    }

    public function existeUsuario() {
        // Revisar si existe un usuario o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if(!$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe';
        }

        return $resultado;
    }

    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado) {
            self::$errores[] = 'La contraseña es incorrecta';
        }

        return $autenticado;
    }

    public function autenticar() {
        session_start();

        // Llenar el arreglo de sesión

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = 'true';

        header('Location: /admin');
    }
}