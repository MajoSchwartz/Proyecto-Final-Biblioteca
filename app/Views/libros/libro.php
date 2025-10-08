<?=$cabecera?>
<?php $rol = session()->get('rol'); ?>
<div class="d-flex justify-content-center">
    <h2>LISTADO DE LIBROS</h2>
</div>
<br>
<br>

    <div class="container mb-4">
    <div class="row align-items-center">

        <!-- Columna izquierda: barra de búsqueda -->
        <div class="col-lg-6 col-md-12 mb-3 mb-lg-0">
            <form method="get" action="<?= base_url('libros/buscar') ?>" class="d-flex">
                <input type="text" name="q" class="form-control mr-2" placeholder="Buscar libro por título o autor">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </form>
        </div>

        <!-- Columna derecha: botones de acción -->
        <div class="col-lg-6 col-md-12 d-flex flex-column flex-lg-row justify-content-lg-end align-items-lg-center gap-3">
            <?php if ($rol === 'admin' || $rol === 'bibliotecario'): ?>
                <a class="btn btn-success mb-3 mb-lg-0 mr-lg-3" href="<?= base_url('crearl') ?>">Crear un libro</a>
            <?php endif; ?>

            <?php if ($rol === 'bibliotecario'): ?>
                <div class="dropdown mb-3 mb-lg-0 mr-lg-3">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Generar reporte
                    </button>
                    <div class="dropdown-menu">
                        <a href="<?= base_url('reportes/libros-todos-pdf') ?>" class="dropdown-item" target="_blank">Todos</a>
                        <a href="<?= base_url('reportes/libros/estado/disponible') ?>" class="dropdown-item" target="_blank">Disponibles</a>
                        <a href="<?= base_url('reportes/libros/estado/prestado') ?>" class="dropdown-item" target="_blank">Prestados</a>
                        <a href="<?= base_url('reportes/libros/estado/danado') ?>" class="dropdown-item" target="_blank">Dañado</a>
                    </div>
                </div>
            <?php endif; ?>


            <a class="btn btn-danger" href="<?= base_url('panel') ?>">Regresar</a>
        </div>

    </div>
</div>




            <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
                <thead class="encabezado-tabla">
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
                        <?php if (in_array($rol, ['admin', 'bibliotecario'])): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
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

                        <?php if ($rol === 'admin'): ?>
                        <td>
                            <a href="<?=base_url('editarl/'.$libro['id']);?>" class="btn btn-info" type="button"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?=base_url('borrarl/'.$libro['id']);?>" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <?php elseif ($rol === 'bibliotecario'): ?>
                        <td>
                            <a href="<?=base_url('editarl/'.$libro['id']);?>" class="btn btn-info" type="button"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
<?=$pie?>
