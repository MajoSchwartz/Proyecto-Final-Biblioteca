<?=$cabecera?>

<div class="d-flex justify-content-center mt-3">
    <h2>Resultados de búsqueda</h2>
</div>

<!-- Muestra lo que el usuario buscó y un botón para volver al listado -->
<div class="text-center mb-3">
    <p>Buscaste: <strong><?= esc($query) ?></strong></p>
    <a href="<?=base_url('libro')?>" class="btn btn-outline-dark">Volver al listado completo</a>
</div>

<!-- Si no se encontraron libros, se muestra un mensaje -->
<?php if (empty($libros)): ?>
    <div class="alert alert-warning text-center" style="width: 90%; margin: auto;">
        No se encontraron libros que coincidan con tu búsqueda.
    </div>
<?php else: ?>
    <!-- Su hay resultados, se muestran en una tabla -->
    <table class="table table-bordered table-hover" style="width: 90%; margin: auto;">
        <thead class="encabezado-tabla">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Páginas</th>
                <th>Ejemplar</th>
                <th>Cantidad</th>
                <th>Nivel</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($libros as $index => $libro): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $libro['titulo'] ?></td>
                <td><?= $libro['autor'] ?></td>
                <td><?= $libro['género'] ?></td>
                <td><?= $libro['páginas'] ?></td>
                <td><?= $libro['Ejemplar'] ?></td>
                <td><?= $libro['cantidad'] ?></td>
                <td><?= $libro['nivel'] ?></td>
                <td><?= ucfirst($libro['estado']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?=$pie?>
