<?php
session_start();

/**
 * Función para cargar las clases automáticamente
 * @param string $class Nombre de la clase a cargar
 */
function autoloadClasses($class)
{
    $fileClass = __DIR__ . '/../classes/' . $class . '.php';

    if (file_exists($fileClass)) {
        require_once $fileClass;
    } else {
        die("El archivo de la clase $fileClass no existe");
    }
}

spl_autoload_register('autoloadClasses');