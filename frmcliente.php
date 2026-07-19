<?php
require_once 'manipularcli.php';

$clientes = [];
try {
    $clientes = modificarcliente::listar();
} catch (Exception $e) {
    $clientes = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ediciones Fares</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- CSS separado -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="contenedor-principal">

    <header class="encabezado">
        <h1>Ediciones Fares</h1>
    </header>

    <nav class="menu">
        <a href="frmcliente.php">Principal</a>
        <a href="#">Libros</a>
        <a href="#">Inventario</a>
        <a href="#">Contacto</a>
    </nav>

    <main class="contenido">

        <?php if (isset($_GET["msg"]) && $_GET["msg"] == "guardado") { ?>
            <div class="alert alert-success mensaje">
                Cliente guardado correctamente.
            </div>
        <?php } ?>

        <form class="formulario-cliente" action="guardarcli.php" method="post">

            <div class="titulo-formulario">
                Ingresar datos del cliente
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label>Código</label>
                    <input type="text" name="ccodigo" class="form-control" placeholder="1000">
                </div>

                <div class="form-group col-md-8">
                    <label>Nombre</label>
                    <input type="text" name="cnomcliente" class="form-control" placeholder="Nombre del cliente" required>
                </div>

            </div>

            <div class="form-group">
                <label>Dirección</label>
                <textarea name="cdireccion" class="form-control" rows="3" placeholder="Dirección"></textarea>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label>Teléfono residencial</label>
                    <input type="text" name="ctelcasa" class="form-control" placeholder="Teléfono residencial">
                </div>

                <div class="form-group col-md-6">
                    <label>Celular</label>
                    <input type="text" name="ccelular" class="form-control" placeholder="Celular">
                </div>

            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="cemail" class="form-control" placeholder="Correo electrónico">
            </div>

            <button type="submit" name="guardar" class="btn btn-fares">
                Guardar
            </button>

        </form>

        <hr>

        <h5>Clientes registrados</h5>

        <div class="table-responsive">
            <table class="table table-bordered table-sm tabla-clientes">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Tel. residencial</th>
                        <th>Celular</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($clientes) > 0) { ?>
                        <?php foreach ($clientes as $cliente) { ?>
                            <tr>
                                <td><?php echo $cliente["idcli"]; ?></td>
                                <td><?php echo $cliente["nomcli"]; ?></td>
                                <td><?php echo $cliente["direccion"]; ?></td>
                                <td><?php echo $cliente["telres_cli"]; ?></td>
                                <td><?php echo $cliente["telcel_cli"]; ?></td>
                                <td><?php echo $cliente["email_cli"]; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay clientes registrados.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </main>

    <footer class="pie">
        Todos los derechos reservados Ediciones Fares 2024.
    </footer>

</div>

</body>
</html>
