<?=$cabecera?>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Título</th>
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
                    <td><?=$libro['titulo'];?></td>
                    <td><?=$libro['autor'];?></td>
                    <td><?=$libro['género'];?></td>
                    <td><?=$libro['páginas'];?></td>
                    <td><?=$libro['Ejemplar'];?></td>
                    <td><?=$libro['cantidad'];?></td>
                    <td><?=$libro['nivel'];?></td>
                    <td><?=$libro['estado'];?></td>
                    <td>Editar/Borrar</td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
<?=$pie?>
