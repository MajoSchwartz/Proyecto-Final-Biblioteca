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

            <!-- Datos del libro (solo lectura) -->
            <div class="form-group mb-3">
                <label for="titulo">Título:</label>
                <input id="titulo" value="<?=$libro['titulo']?>" class="form-control" type="text" disabled>
            </div>

            <div class="form-group mb-3">
                <label for="autor">Autor:</label>
                <input id="autor" value="<?=$libro['autor']?>" class="form-control" type="text" disabled>
            </div>

            <div class="form-group mb-3">
                <label for="género">Género:</label>
                <input id="género" value="<?=$libro['género']?>" class="form-control" type="text" disabled>
            </div>

            <div class="form-group mb-3">
                <label for="páginas">Páginas:</label>
                <input id="páginas" value="<?=$libro['páginas']?>" class="form-control" type="number" disabled>
            </div>

            <div class="form-group mb-3">
                <label for="Ejemplar">No. Ejemplar:</label>
                <input id="Ejemplar" value="<?=$libro['Ejemplar']?>" class="form-control" type="number" disabled>
            </div>

            <!-- Selección del estudiante -->
            <div class="form-group mb-3">
                <label for="usuario_id">Estudiante:</label>
                <select class="form-select" name="usuario_id" id="usuario_id" required>
                    <option selected disabled value="">Selecciona un estudiante</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario['id'] ?>">
                            <?= $usuario['carnet'].' - '.$usuario['nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- Fecha de devolución -->
            <div class="form-group mb-3">
                <label for="fecha_devolucion">Fecha de Devolución:</label>
                <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion" required>
            </div>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success me-2" type="submit">Grabar</button>
                <a href="<?=base_url('devolucion')?>" class="btn btn-info">Regresar</a>
            </div>

        </form>
        </p>
    </div>
</div>
<?=$pie?>