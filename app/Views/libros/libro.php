<?=$cabecera?>
<div class="d-flex justify-content-center">
    <h2>LISTADO DE LIBROS</h2>
</div>
<div class="d-flex justify-content-between mb-3" style="width: 90%; margin: auto;">
    <a class="btn btn-success" href="<?=base_url('crearl')?>">Crear un libro</a>
     <a class="btn btn-primary" href="<?=base_url('reporte/libros')?>" target="_blank">Generar reporte</a>
    <a class="btn btn-danger" href="<?=base_url('panel')?>">Regresar</a>
</div>
        <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th style="word-wrap: break-word; white-space: normal; max-width: 200px;">Título</th>
                    <th style="word-wrap: break-word; white-space: normal; max-width: 200px;">Autor</th>
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
                        <a href="<?=base_url('editarl/'.$libro['id']);?>" class="btn btn-info" type="button"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?=base_url('borrarl/'.$libro['id']);?>" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
<?=$pie?>
