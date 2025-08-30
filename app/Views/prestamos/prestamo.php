<?=$cabecera?> <!-- Inserta la cabecera común del sitio -->

<!-- Título del módulo -->
<div class="d-flex justify-content-center mb-3">
    <h2 class="card-title">MÓDULO DE PRÉSTAMOS</h2>
</div>

<!-- Botón para salir al panel principal -->
<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-danger" href="<?=base_url('panel')?>">Regresar</a>
</div>

<!-- Tabla de libros disponibles para préstamo -->
<div class="table-responsive">
    <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
        <thead class="table-dark text-center">
            <tr>
                <th>#</th>
                <th style="max-width: 200px;">Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Páginas</th>
                <th>No. Ejemplar</th>
                <th>Cantidad</th>
                <th>Nivel</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        <!-- Iteración de libros -->
        <?php foreach($libros as $libro): ?>
            <tr>
                <td class="text-center"><?=$libro['id'];?></td>
                <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                    <?=$libro['titulo']?>
                </td>
                <td><?=substr($libro['autor'], 0, 15);?></td>
                <td><?=substr($libro['género'], 0, 10);?></td>
                <td class="text-center"><?=$libro['páginas'];?></td>
                <td class="text-center"><?=$libro['Ejemplar'];?></td>
                <td class="text-center"><?=$libro['cantidad'];?></td>
                <td class="text-center"><?=$libro['nivel'];?></td>
                <td class="text-center"><?=$libro['estado'];?></td>
                <td class="text-center">
                    <!-- Botón para iniciar préstamo -->
                    <a href="<?=base_url('prestamos/crear/'.$libro['id']);?>" class="btn btn-info btn-sm">
                        Prestar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>

<footer>
    <?=$pie?>
</footer>
