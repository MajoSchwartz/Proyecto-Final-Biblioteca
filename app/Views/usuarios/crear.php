<?=$cabecera?>

<div class="card shadow mt-4"> <!-- Aqui se pone todo el contenido del formulario -->
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del usuario</h5>
        <p class="card-text">

        <form method="post" action="<?=site_url('/usuarios/guardar')?>" enctype="multipart/form-data"> <!---Para poder enviar los datos a la ruta seleccionada-->
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input id="usuario" class="form-control" type="text" name="usuario">
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input id="nombre" class="form-control" type="text" name="nombre">
        </div>

        <div class="form-group">
            <label for="carnet">Carnet:</label>
            <input id="carnet" class="form-control" type="text" name="carnet">
        </div>

        <div class="form-group">
            <label for="correo">Correo:</label>
            <input id="correo" class="form-control" type="text" name="correo">
        </div>

        <div class="form-group">
                <label for="rol">Rol:</label>
                <select id="rol" class="form-control" name="rol">
                    <option value="alumno" <?= set_select('rol', 'alumno', true) ?>>Alumno</option>
                    <option value="bibliotecario" <?= set_select('rol', 'bibliotecario') ?>>Bibliotecario</option>
                    <option value="admin" <?= set_select('rol', 'admin') ?>>Administrador</option>
                </select>
            </div>

        <div class="form-group">
            <label for="PASSWORD">Contraseña:</label>
            <input id="PASSWORD" class="form-control" type="password" name="PASSWORD">
        </div>
        <button class="btn btn-success" type="submit">Guardar</button>
    </form>
        </p>
    </div>
</div>
    
<?=$pie?>