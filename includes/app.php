<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use Model\ActiveRecord;

// Conexión a la DB

$db = connectBD();

ActiveRecord::setDB($db);