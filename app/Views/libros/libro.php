<?=$cabecera?>
<div class="d-flex justify-content-center">
    <h2>LISTADO DE LIBROS</h2>
</div>
<br>
<br>

    <div class="container mb-4">
        <div class="row align-items-center g-2">

            <!-- Columna izquierda: barra de búsqueda -->
            <div class="col-lg-6 col-md-12">
                <form method="get" action="<?=base_url('libros/buscar')?>" class="d-flex">
                    <input type="text" name="q" class="form-control me-2" placeholder="Buscar libro por título o autor">
                    <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                </form>
            </div>

            <!-- Columna derecha: botones de acción -->
            <div class="col-lg-6 col-md-12 d-flex justify-content-lg-end justify-content-md-start flex-wrap gap-2 mt-md-2 mt-lg-0">
                <a class="btn btn-success" href="<?=base_url('crearl')?>">Crear un libro</a>

                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Generar reporte
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=base_url('libros/todos')?>">Todos</a>
                        <a class="dropdown-item" href="<?=base_url('libros/disponible')?>">Disponibles</a>
                        <a class="dropdown-item" href="<?=base_url('libros/prestado')?>">Prestados</a>
                        <a class="dropdown-item" href="<?=base_url('libros/danado')?>">Dañados</a>
                    </div>
                </div>


                <a class="btn btn-danger" href="<?=base_url('panel')?>">Regresar</a>
            </div>

        </div>
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
