<?php
/*
    Archivo: manipularcli.php

    Clase modificarcliente.
    Hereda de datospersona y manipula la tabla clientes.
*/

require_once 'conexionf2.php';
require_once 'fclases.php';

class modificarcliente extends datospersona
{
    const TABLA = 'clientes';

    public function guardar()
    {
        $conexion = new Conexion();

        // Preparar la consulta
        $consulta = $conexion->prepare(
            'INSERT INTO ' . self::TABLA . '
            (nomcli, direccion, telres_cli, telcel_cli, email_cli)
            VALUES (:nombre, :direccion, :telresidencial, :telcelular, :email)'
        );

        // Asignar los valores
        $consulta->bindParam(':nombre', $this->dnombre);
        $consulta->bindParam(':direccion', $this->ddireccion);
        $consulta->bindParam(':telresidencial', $this->dtelresi);
        $consulta->bindParam(':telcelular', $this->dtelcel);
        $consulta->bindParam(':email', $this->demail);

        $consulta->execute(); // Ejecutar la consulta
        $conexion = null;    // Cerrar conexión
    }

    public static function listar()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY idcli DESC');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
