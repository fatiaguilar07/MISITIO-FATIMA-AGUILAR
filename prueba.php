<?php
/*
    Archivo: prueba.php

    Ejemplo básico del libro:
    Se llama a fclases.php, se crea el objeto $persona y se imprime el método minombre().
*/

require_once 'fclases.php';

$persona = new datospersona('100', 'Fares');
echo $persona->minombre();
?>
