<?=$cabecera?>

<div class="d-flex justify-content-center">
    <h2>MÓDULO DE DEVOLUCIONES </h2>
</div>
    <a class="btn btn-danger" style="margin-left:70px;" href="<?=base_url('panel')?>">Salir</a>
<br/>
    <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
            <thead class="thead-light">
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