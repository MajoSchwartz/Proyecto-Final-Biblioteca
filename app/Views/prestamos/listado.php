<!-- Esta página es una lista de todos los préstamos realizados -->
<?=$cabecera?>
<?php $rol = session()->get('rol'); ?>
<div class="d-flex justify-content-center">
    <h2>Registro de Préstamos</h2>
</div>

<div class="d-flex justify-content-between mb-3" style="width: 90%; margin: auto;">
        <a class="btn btn-primary" href="<?= base_url('reportes/prestamos-pdf') ?>" target="_blank" class>Generar reporte</a>
    <a class="btn btn-danger" href="<?=base_url('panel')?>">Regresar</a>
</div>


<br>
<table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
    <thead class="encabezado-tabla">
        <tr>
            <th>#</th>
            <th>ID Libro</th>
            <th>Ejemplar</th>
            <th>Título Libro</th>
            <th>Nombre Estudiante</th>
            <th>Carnet</th>
            <th>Fecha Préstamo</th>
            <th>Fecha Devolución</th>
        </tr>
    </thead>    

    <tbody>
        <?php foreach($registros_prestamos as $libro): ?>
            <tr>
                <td><?=$libro['id'];?></td>
                <td><?=$libro['libro_id'];?></td>
                <td><?=$libro['ejemplar'];?></td>
                <td><?=$libro['titulo'];?></td>
                <td><?=substr($libro['nombre'], 0, 20);?></td>
                <td><?=$libro['carnet'];?></td>
                <td><?=date("d/m/Y",strtotime($libro['fecha_prestamo']));?></td>
                <td><?=date('d/m/Y', strtotime($libro['fecha_devolucion']));?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?=$pie?>