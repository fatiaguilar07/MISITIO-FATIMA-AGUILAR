<?php
/*
    Archivo: conexionf2.php

    Ejemplo 1 del libro:
    Clase que permite crear una conexión a la base de datos sistema_fares.
    Se utiliza PDO y constructor.
*/

class Conexion extends PDO
{
    private $tipo_de_base = 'mysql';
    private $host = 'localhost';
    private $nombre_de_base = 'sistema_fares';
    private $usuario = 'root';
    private $contrasena = '';

    public function __construct()
    {
        try {
            // Se sobrescribe el método constructor de la clase PDO
            parent::__construct(
                "{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8",
                $this->usuario,
                $this->contrasena
            );

            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error al conectar con la base de datos. Detalle: " . $e->getMessage();
            exit;
        }
    }
}
?>
