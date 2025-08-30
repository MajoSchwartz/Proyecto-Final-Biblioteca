<?=$cabecera?>
<div class="d-flex justify-content-center">
    <h2>LISTADO DE LIBROS</h2>
</div>
<br/>
<a class="btn btn-success" style="margin-left:70px;" href="<?=base_url('crearl')?>">Crear un libro</a>
<br/>
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
                        <a href="<?=base_url('editarl/'.$libro['id']);?>" class="btn btn-info" type="button">Editar</a>
                        <a href="<?=base_url('borrarl/'.$libro['id']);?>" class="btn btn-danger" type="button">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
<?=$pie?>
