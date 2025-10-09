<?=$cabecera?>

<!-- Tarjeta para ingresar los datos -->
<div class="card shadow mt-4">
    <div class="card-body">
        <h5 class="card-title">Ingresa los datos del préstamo</h5>
        <form action="<?=site_url('prestamos/guardar')?>" method="post" id="fcrearp">

        <input type="hidden" name="libro_id" value="<?=$libro['id']?>">

        <!-- Campos del formulario -->

            <!-- Título -->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input id="titulo" value="<?=$libro['titulo']?>" class="form-control" type="text" name="titulo" disabled>
            </div>

            <!-- Autor -->
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input id="autor" value="<?=$libro['autor']?>" class="form-control" type="text" name="autor" disabled>
            </div>

            <!-- Género -->
            <div class="form-group">
                <label for="género">Género:</label>
                <input id="género" value="<?=$libro['género']?>" class="form-control" type="text" name="género" disabled>
            </div>

            <!-- Páginas -->
            <div class="form-group">
                <label for="páginas">Páginas:</label>
                <input id="páginas" value="<?=$libro['páginas']?>" class="form-control" type="text" name="páginas" disabled>
            </div>

            <!-- No. Ejemplar -->
            <div class="form-group">
                <label for="Ejemplar">No. Ejemplar: </label>
                <input id="Ejemplar" value="<?=$libro['Ejemplar']?>" class="form-control" type="text" name="Ejemplar" disabled>
            </div>
            
            <!-- Estudiante -->
            <select class ="form-select" name="usuario_id" id="usuario_id" tabindex="1" required>
                <option selected disabled value="">Selecciona un estudiante</option>
                <?php foreach ($usuarios as $key => $value): ?> <!-- Se crea una variable para la tabla ususario -->
                    <option value="<?php echo $value['id'];?>"><?php echo $value['carnet']. ' - '.$value['nombre'];?></option>
                    <?php endforeach ?>
            </select>
            <br>

            <!-- Fecha del préstamo -->
            <div class="col-xs-2"> <!-- Se hace el tamaño del campo más pequeño -->
                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo:</label><br>
                <input id="fecha_prestamo" class="form-control" type="date" name="fecha_prestamo">
            </div>

            <!-- Fecha de devolución -->
            <div class="col-xs-2"> <!-- Se hace el tamaño del campo más pequeño -->
                <label for="fecha_devolucion" class="form-label">Fecha de Devolución:</label><br>
                <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion">
            </div>
            <br><br>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('prestamo')?>" class="btn btn-info">Regresar</a>
            </div>
        </form>
    </div>
</div>
