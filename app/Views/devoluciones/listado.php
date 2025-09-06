<?=$cabecera?>
<div class="d-flex justify-content-center">
    <h2>Registro de Devoluciones</h2>
</div>
<div class="d-flex justify-content-center">
    <a <button class="btn btn-danger" href="<?=base_url('devolucion')?>">Regresar</a>
</div>
<br>
<br>
<div class="alert alert-info text-center" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
    Total de devoluciones registradas: <?= count($registros_devoluciones) ?>
</div>

<div class="table-responsive">
    <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
        <thead class="table-dark text-center">
            <tr>
                <th>Devolución #</th>
                <th>Código de Libro</th>
                <th>Ejemplar</th>
                <th>Título Libro</th>
                <th>Carnet</th>
                <th>Nombre Estudiante</th>
                <th>Fecha Prestamo</th>
                <th>Fecha Dovolución</th>
                <th>Días de Atraso</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($registros_devoluciones as $libro): ?>
            <tr>
                <td><?=$libro['id'];?></td>
                <td><?=$libro['libro_id'];?></td>
                <td><?=$libro['ejemplar'];?></td>
                <td ><?=$libro['titulo']?></td>
                <td><?=$libro['carnet'];?></td>
                <td><?=substr($libro['nombre'], 0, 20);?></td>
                <td><?=date("d/m/Y",strtotime($libro['fecha_prestamo']));?></td>
                <td><?=date('d/m/Y', strtotime($libro['fecha_real']));?></td>
                <td><?=$libro['dias_atraso'];?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?=$pie?>    