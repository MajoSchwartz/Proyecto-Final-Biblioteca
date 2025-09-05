<!-- Esta página es una lista de todos los préstamos realizados -->
<?=$cabecera?>
<div class="d-flex justify-content-center">
    <h2>Registro de Préstamos</h2>
</div>
<div class="d-flex justify-content-end mb-3" style="width: 90%; margin: auto;">
    <a href="<?=site_url('reportes/prestamos-pdf')?>" class="btn btn-primary">Exportar PDF</a>
    <a class="btn btn-danger" href="<?=base_url('prestamo')?>">Salir</a>
</div>
<br>
<br>
<table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
    <thead class="thead-dark">
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