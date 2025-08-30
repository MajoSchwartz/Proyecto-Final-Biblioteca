<?=$cabecera?>

<div class="d-flex justify-content-center mb-3">
    <h2 class="card-title">MÓDULO DE PRÉSTAMOS</h2>
</div>

<!-- Botón para salir al panel principal -->
<div class="d-flex justify-content-end mb-3" style="width: 90%; margin: auto;">
    <a class="btn btn-danger" href="<?=base_url('panel')?>">Regresar</a>
</div>

    <div class="table-responsive">
        <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th style="word-wrap: break-word; white-space: normal; max-width: 200px;">Título</th>
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
                <?php foreach($libros as $libro): ?>
                <tr>
                    <td><?=$libro['id'];?></td>
                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;"><?=$libro['titulo']?></td>
                    <td><?=substr($libro['autor'], 0, 15);?></td>
                    <td><?=substr($libro['género'], 0, 10);?></td>
                    <td><?=$libro['páginas'];?></td>
                    <td><?=$libro['Ejemplar'];?></td>
                    <td><?=$libro['cantidad'];?></td>
                    <td><?=$libro['nivel'];?></td>
                    <td><?=$libro['estado'];?></td>
                    <td>
                        <a href="<?=base_url('devoluciones/crear/'.$libro['id']);?>" class="btn btn-info" type="button">Devolver</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?=$pie?>