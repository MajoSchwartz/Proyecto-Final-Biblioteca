<?=$cabecera?>

    <div class="card"> <!-- Aqui se pone todo el contenido del formulario -->
        <div class="card-body">
            <h5 class="card-title">Ingresar datos del usuario</h5>
            <p class="card-text">

            <form method="post" action="<?=site_url('/usuarios/actualizar')?>" enctype="multipart/form-data"> <!---Para poder enviar los datos a la ruta seleccionada-->

        <input type="hidden" name="id" value="<?=$usuario['id']?>">

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input id="usuario" value="<?=$usuario['usuario']?>" class="form-control" type="text" name="usuario" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input id="nombre" value="<?=$usuario['nombre']?>" class="form-control" type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="carnet">Carnet:</label>
                <input id="carnet" value="<?=$usuario['carnet']?>" class="form-control" type="text" name="carnet" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input id="correo" value="<?=$usuario['correo']?>" class="form-control" type="email" name="correo" required
                    oninvalid="this.setCustomValidity('Por favor ingresa un correo válido')"
                    oninput="this.setCustomValidity('')">
            </div>

            <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select id="rol" class="form-control" name="rol" required>
                        <option value="alumno" <?= set_select('rol', 'alumno', $usuario['rol'] === 'alumno') ?>>Alumno</option>
                        <option value="bibliotecario" <?= set_select('rol', 'bibliotecario', $usuario['rol'] === 'bibliotecario') ?>>Bibliotecario</option>
                        <option value="admin" <?= set_select('rol', 'admin', $usuario['rol'] === 'admin') ?>>Administrador</option>
                    </select>
                </div>

            <div class="form-group">
                <label for="PASSWORD">Contraseña:</label>
                <input id="PASSWORD" value="<?=$usuario['usuario']?>" class="form-control" type="password" name="PASSWORD" required>
            </div>
            <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
            </p>
        </div>
    </div>

<?=$pie?>
