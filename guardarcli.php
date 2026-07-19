<?php
/*
    Archivo: guardarcli.php

    Recibe los datos del formulario frmcliente.php
    y hace uso de la clase modificarcliente para guardar.
*/

require_once 'manipularcli.php';

// Declarar variables
$vcodigo = "";
$vnombre = "";
$vdireccion = "";
$vtelresi = "";
$vtelcel = "";
$vemail = "";

// Función para escapar los datos
function filtrofares($dat_fares)
{
    $datos = trim($dat_fares);              // Elimina espacios antes y después
    $datos = stripslashes($datos);          // Elimina backslashes
    $datos = htmlspecialchars($datos);       // Traduce caracteres especiales HTML
    return $datos;
}

// Comprobar si los datos se pasaron a través del método POST
if (isset($_POST["guardar"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["ccodigo"])) {
        $vcodigo = filtrofares($_POST["ccodigo"]);
    }

    if (!empty($_POST["cnomcliente"])) {
        $vnombre = filtrofares($_POST["cnomcliente"]);
    }

    if (!empty($_POST["cdireccion"])) {
        $vdireccion = filtrofares($_POST["cdireccion"]);
    }

    if (!empty($_POST["ctelcasa"])) {
        $vtelresi = filtrofares($_POST["ctelcasa"]);
    }

    if (!empty($_POST["ccelular"])) {
        $vtelcel = filtrofares($_POST["ccelular"]);
    }

    if (!empty($_POST["cemail"])) {
        $vemail = filtrofares($_POST["cemail"]);
    }

    // Crear objeto y pasar los datos por parámetros
    $guardarcliente = new modificarcliente(
        null,
        $vnombre,
        $vdireccion,
        $vtelresi,
        $vtelcel,
        $vemail
    );

    // Llamar al método guardar
    $guardarcliente->guardar();

    header('Location: frmcliente.php?msg=guardado');
    die();
}

header('Location: frmcliente.php');
die();
?>
