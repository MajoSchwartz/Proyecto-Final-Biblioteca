<!DOCTYPE html>
<html>
<head>
    <title>Panel</title> 
    <!-- Agregar css o bootrsapp? --> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Biblioteca Escolar</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> 
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Bienvenido, <?= session('usuario') ?></h1>
        <?php if (session()->get('rol') === 'admin'): ?>
            <p>Acceso completo al sistema.</p>
        <?php elseif (session()->get('rol') === 'bibliotecario'): ?>
            <p>Gestión de libros y préstamos.</p>
        <?php else: ?>
            <p>Explora los libros disponibles para lectura.</p>
        <?php endif; ?>

        <!-- Enlaces a los módulos en una fila responsive -->
        <div class="row mb-4">
            <div class="col-md-3">
                <a href="<?= base_url('usuario') ?>" class="btn btn-info w-100">Gestionar Usuarios</a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('libro') ?>" class="btn btn-info w-100">Libros</a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('prestamos/registro') ?>" class="btn btn-info w-100">Préstamos</a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('devoluciones/registro') ?>" class="btn btn-info w-100">Devoluciones</a>
            </div>
        </div>

        <!-- Botón de cerrar sesión -->
        <a href="<?= base_url('login/salir') ?>" class="btn btn-danger mt-3">Cerrar Sesión</a>
    </div>

    </body>
</html>