<?php echo $cabecera; ?>

<!-- Tarjeta para ingresar los datos del libro -->
<div class="card shadow mt-4">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del libro</h5>

        <!-- Muestra errores si hay problemas al guardar los datos -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para crear libro -->
        <form method="post" action="<?= site_url('libro/guardarl') ?>">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input id="titulo" class="form-control" type="text" name="titulo" value="<?= set_value('titulo') ?>" required>
            </div>

            <!-- Autor -->
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input id="autor" class="form-control" type="text" name="autor" value="<?= set_value('autor') ?>" required>
            </div>

            <!-- Género -->
            <div class="form-group">
                <label for="género">Género:</label>
                <input id="género" class="form-control" type="text" name="género" value="<?= set_value('género') ?>" required>
            </div>

            <!-- Páginas -->
            <div class="form-group">
                <label for="páginas">Páginas:</label>
                <input id="páginas" class="form-control" type="number" name="páginas" value="<?= set_value('páginas') ?>">
            </div>

            <!-- No. Ejemplar -->
            <div class="form-group">
                <label for="Ejemplar">No. Ejemplar:</label>
                <input id="Ejemplar" class="form-control" type="number" name="Ejemplar" value="<?= set_value('Ejemplar', 1) ?>">
            </div>

            <!-- Cantidad -->
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input id="cantidad" class="form-control" type="number" name="cantidad" value="<?= set_value('cantidad', 1) ?>">
            </div>

            <!-- Nivel -->
            <div class="form-group">
                <label for="nivel">Nivel:</label>
                <select id="nivel" class="form-control" name="nivel">
                    <option value="Primaria Baja" <?= set_select('nivel', 'Primaria Baja', true) ?>>Primaria Baja</option>
                    <option value="Primaria Alta" <?= set_select('nivel', 'Primaria Alta') ?>>Primaria Alta</option>
                </select>
            </div>

            <!-- Estado -->
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" class="form-control" name="estado">
                    <option value="disponible" <?= set_select('estado', 'disponible', true) ?>>Disponible</option>
                    <option value="prestado" <?= set_select('estado', 'prestado') ?>>Prestado</option>
                    <option value="dañado" <?= set_select('estado', 'dañado') ?>>Dañado</option>
                </select>
            </div>

            <!-- Botones de acción -->
            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="<?=base_url('libro');?>" class="btn btn-info" >Cancelar</a>
        </form>
    </div>
</div>
<?php echo $pie; ?>