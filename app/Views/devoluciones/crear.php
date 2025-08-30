<?=$cabecera?>
    <div class="container mt-3">
        <div class="d-flex justify-content-center">
            <h2> MODULO DE DEVOLUCIONES </h2>
        </div>
        <form method="post" action="<?=site_url('devoluciones/guardar')?>" id="fcrearp">
            <div class = "form-group row">
                <input type="hidden" name="libro_id" value="<?=$libro['id']?>">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input id="titulo" value="<?=$libro['titulo']?>" class="form-control" type="text" name="titulo" disabled>
                </div>
                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <input id="autor" value="<?=$libro['autor']?>" class="form-control" type="text" name="autor" disabled>
                </div>
                <div class="form-group">
                    <label for="género">Género:</label>
                    <input id="género" value="<?=$libro['género']?>" class="form-control" type="text" name="género" disabled >
                </div>
                <div class="form-group">
                    <label for="páginas">Páginas:</label>
                    <input id="páginas" value="<?=$libro['páginas']?>" class="form-control" type="number" name="páginas" disabled >
                </div>
                <div class="form-group">
                    <label for="Ejemplar">No. Ejemplar:</label>
                    <input id="Ejemplar" value="<?=$libro['Ejemplar']?>" class="form-control" type="number" name="Ejemplar" disabled>
                </div>
                <select class="form-select" name="usuario_id" id="usuario_id" tabindex="1" required>
                        <option selected disabled value = "">Selecciona un estudiante</option>
                        <?php foreach ($usuarios as $key => $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['carnet'].' - '.$value['nombre'];?></option>
                        <?php endforeach ?>
                </select>
                <!--
                <div class="col-xs-2">
                    <label for = "carnet" class ="form-label">Carnet..:  </label><br>
                    <input id="carnet" class="form-control-sm" type="text" name="carnet">
                </div>
                -->
                <div class="col-xs-2">
                    <label for = "fecha_devolucion" class ="form-label">Fecha de Devolución..:  </label><br>
                    <input id="fecha_prestamo" class="form-control" type="date" name="fecha_devolucion">
                </div>
            </div>
            <br><br>
            <div class="d-flex justify-content-around"></div>
                <button class="btn btn-success" type="submit">Grabar</button> 
                <a href="<?=base_url('devolucion')?>" class="btn btn-info">Regresar </a>
            </div>
            
        </form>
    </div>
<?=$pie?>