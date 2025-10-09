<?=$cabecera?>

<div class="d-flex justify-content-center mb-3">
    <h2 class="card-title">MÓDULO DE DEVOLUCIONES</h2>
</div>

<!-- Botones para ir al registro de devoluciones o regresar al panel -->
<div class="d-flex flex-column flex-md-row justify-content-end align-items-center mb-4" style="width: 90%; margin: auto; gap: 15px;">
    <a class="btn btn-info mb-2 mb-md-0" href="<?= base_url('devoluciones/registro') ?>">Registro</a>
    <a class="btn btn-danger mb-2 mb-md-0" href="<?= base_url('panel') ?>">Regresar</a>
</div>


    <div class="table-responsive">
        
        <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
            <!-- Encabezado de tabla-->
            <thead class="encabezado-tabla">
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
                    <th>No. Préstamo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <!-- Datos de la tabla -->
            <tbody>
                <?php foreach($libros as $libro): ?> <!-- Cada libro como uno solo -->
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
                    <td><?=$libro['prestamo_id'];?></td>
                    <td>
                        <a href="<?=base_url('devoluciones/crear/'.$libro['id']);?>" class="btn btn-info" type="button">Devolver</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?=$pie?>