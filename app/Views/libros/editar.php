<?=$cabecera?>
<?php
print_r($libro);
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Actualizar datos del libro</h5>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('libro/guardar') ?>">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input id="titulo" value="<?=$libro['titulo']?>" class="form-control" type="text" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input id="autor" value="<?=$libro['autor']?>" class="form-control" type="text" name="autor" required>
            </div>
            <div class="form-group">
                <label for="género">Género:</label>
                <input id="género" value="<?=$libro['género']?>" class="form-control" type="text" name="género"  required>
            </div>
            <div class="form-group">
                <label for="páginas">Páginas:</label>
                <input id="páginas" value="<?=$libro['páginas']?>" class="form-control" type="number" name="páginas" >
            </div>
            <div class="form-group">
                <label for="Ejemplar">No. Ejemplar:</label>
                <input id="Ejemplar" value="<?=$libro['Ejemplar']?>" class="form-control" type="number" name="Ejemplar">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input id="cantidad" value="<?=$libro['Ejemplar']?>" class="form-control" type="number" name="cantidad">
            </div>
            <div class="form-group">
                <label for="nivel">Nivel:</label>
                <select id="nivel" class="form-control" name="nivel">
                    <option value="Primaria Baja" <?= set_select('nivel', 'Primaria Baja', $libro['estado'] === 'Primaria Baja') ?>>Primaria Baja</option>
                    <option value="Primaria Alta" <?= set_select('nivel', 'Primaria Alta', $libro['estado'] === 'Primaria Alta') ?>>Primaria Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" class="form-control" name="estado">
                    <option value="disponible" <?= set_select('estado', 'disponible', $libro['estado'] === 'disponible') ?>>Disponible</option>
                    <option value="prestado" <?= set_select('estado', 'prestado', $libro['estado'] === 'prestado') ?>>Prestado</option>
                    <option value="dañado" <?= set_select('estado', 'dañado', $libro['estado'] === 'dañado') ?>>Dañado</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Guardar</button>
        </form>
    </div>
</div>

<?=$pie?>