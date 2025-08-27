<?php echo $cabecera; ?>
<h1>Formulario de Creación</h1>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del usuario</h5>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('usuarios/guardar') ?>">
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
                    <option value="Primaria Baja" <?= set_select('rol', 'alumno') ?>>Alumno</option>
                    <option value="Primaria Alta" <?= set_select('rol', 'bibliotecario') ?>>Bibliotecario</option>
                    <option value="Primaria Alta" <?= set_select('rol', 'admin') ?>>Administrador</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input id="password" class="form-control" type="text" name="passwrod">
            </div>

            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="<?=base_url('libro');?>" class="btn btn-info" >Cancelar</a>
        </form>
    </div>
</div>
<?php echo $pie; ?>