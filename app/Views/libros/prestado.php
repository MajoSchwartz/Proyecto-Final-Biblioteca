<?=$cabecera?>

<div class="d-flex justify-content-center mt-3">
    <h2>Libros Prestados</h2>
</div>

<!-- Botones de navegación por estado -->
<div class="d-flex justify-content-end mb-3" style="width: 90%; margin: auto;">
    <a href="<?=base_url('libros/todos')?>" class="btn btn-primary me-2">Todos</a>
    <a href="<?=base_url('libros/disponible')?>" class="btn btn-success me-2">Disponibles</a>
    <a href="<?=base_url('libros/danado')?>" class="btn btn-danger">Dañados</a>
</div>

<!-- Tabla -->
<table class="table table-bordered table-hover" style="width: 90%; margin: auto;">
    <thead class="thead-dark">
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

<?=$pie?>
