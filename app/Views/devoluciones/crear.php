<?=$cabecera?>
<!-- Tarjeta visual para el formulario -->
<div class="card shadow mt-3">
    <div class="card-body">
        <h5 class="card-title text-center">Registrar Devolución</h5>
        <p class="card-text">

        <!-- Formulario que envía los datos al controlador -->
        <form method="post" action="<?=site_url('devoluciones/guardar')?>" id="fcrearp">

            <!-- ID oculto del libro -->
            <input type="hidden" name="libro_id" value="<?=$libro['id']?>">
            <input type="hidden" name="usuario_id" value="<?=$usuario['id']?>">

            <!-- Datos del libro (solo lectura) -->

            <!-- Título de libro-->
            <div class="form-group mb-3">
                <label for="titulo">Título:</label>
                <input id="titulo" value="<?=$libro['titulo']?>" class="form-control" type="text" disabled>
            </div>

            <!-- Nombre del autor-->
            <div class="form-group mb-3">
                <label for="autor">Autor:</label>
                <input id="autor" value="<?=$libro['autor']?>" class="form-control" type="text" disabled>
            </div>

            <!-- Género -->
            <div class="form-group mb-3">
                <label for="género">Género:</label>
                <input id="género" value="<?=$libro['género']?>" class="form-control" type="text" disabled>
            </div>

            <!-- Páginas -->
            <div class="form-group mb-3">
                <label for="páginas">Páginas:</label>
                <input id="páginas" value="<?=$libro['páginas']?>" class="form-control" type="number" disabled>
            </div>

            <!-- ejemplar -->
            <div class="form-group mb-3">
                <label for="Ejemplar">No. Ejemplar:</label>
                <input id="Ejemplar" value="<?=$libro['Ejemplar']?>" class="form-control" type="number" disabled>
            </div>


            <!-- Carnet de estudiante -->
            <div class="form-group mb-3">
                <label for="Estudiante">Estudiante</label>
                <input id="Estudiante" value="<?=$usuario['carnet'].' '.$usuario['nombre']?>" class="form-control" type="text" disabled>
            </div>

            <!-- Fecha de préstamo -->
            <div class="form-group mb-3">
                <label for="fecha_prestamo">Fecha de Préstamo</label>
                <input id="fecha_prestamo" value="<?php echo $prestamo["fecha_prestamo"];?>" class="form-control" type="datetime-local" disabled>
            </div>

            <!-- Fecha de devolución -->
            <div class="form-group mb-3">
                <label for="fecha_devolucion">Fecha de Devolución:</label>
                <input id="fecha_devolucion" value="<?php echo $prestamo['fecha_devolucion'];?>" class="form-control" type="datetime-local" name="fecha_devolucion" required>
            </div>

            <!-- Botones de acción -->
            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="<?=base_url('devolucion');?>" class="btn btn-info" >Cancelar</a>

        </form>
        </p>
    </div>
</div>
<?=$pie?>